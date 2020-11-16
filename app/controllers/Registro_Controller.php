<?php

if (!isset($_SESSION['REGISTRO_URL_APP'])){
    session_start();
}

require_once($_SESSION['REGISTRO_URL_APP'].'session.php');

if (isset($_REQUEST['funcao'])){
    require_once( $_SESSION['REGISTRO_URL_MODELS'].'Registro.php');
    $funcao = $_REQUEST['funcao'];
    switch ($funcao) {
        case 'cadastrarRegistro':
            RegistrosController::cadastrarRegistro();
            break;

        case 'editarRegistros':
            RegistrosController::editarRegistros();
            break;

        case 'delRegistro':
            RegistrosController::deletarRegistro($_REQUEST['id_movimento']);
            break;  
}
}else{
    require_once( $_SESSION['REGISTRO_URL_MODELS'].'Registro.php');
}

class RegistrosController {

    public static function showTableRegistros($id_casa, $data_inicial, $data_final){
        $data = new Registro();
      
        $data = $data->getRegistros($id_casa, $data_inicial, $data_final);

        $return = '';
        foreach ($data as $row){
            $return .= '
                <tr linha-movimento="'.$row->id_movimento.'">
                    <td>'.$row->nome.'</td>
                    <td>'.$row->rua.' - n°'.$row->numero.' - '.$row->bairro.' - '.$row->cidade.'</td>
                    <td>'.$row->telefone.'</td>
                    <td>'.date('d/m/Y', strtotime($row->data)).'</td>
                    <td>'.$row->temperatura.'</td>
                    <td width="9%">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editRegistro" 
                    data-whatever="'.$row->nome.'" 
                    data-whatevertemperatura="'.$row->temperatura.'"
                    data-whateverid_movimento="'.$row->id_movimento.'"
                    ><i class="fa fa-edit"></i></button>
                    <a href="javascript:delRegistro('.$row->id_movimento.');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            ';
        }
        return $return;
    }


    public static function cadastrarRegistro(){
        $classe = new Registro();
        $classe->id_pessoa = $_POST['id_pessoa'];
        $classe->temperatura = $_POST['temperatura'];
        $classe->id_casa = $_POST['id_casa'];
        $classe->id_usuario = $_POST['id_usuario'];

        if($classe->cadastrarRegistro()){
            header('Location: ../../view/afericao/index.php');
            exit;
        }else{
            echo "Erro ao inserir os dados, tente novamente mais tarde.";
        }
        
    }

    public static function editarRegistros(){

        $editar = new Registro();
        $id_movimento = $_POST['id_movimento_edit'];
        $editar->id_movimento = $id_movimento;
        $editar->id_pessoa = $_POST['id_pessoa_edit'];
        $editar->temperatura = $_POST['temperatura_edit'];

    if($editar->editarRegistros()){
            header('Location: ../../view/afericao/index.php');
            exit;
        }else{
            echo "Erro ao inserir os dados, tente novamente mais tarde.";
        }
}
    
public static function deletarRegistro($id_movimento){
    $movimento = new Registro();
    $movimento->id_movimento = $id_movimento;

    if ($movimento->deletarRegistro($movimento)){
        $retorno = array('sucesso' => true);
        echo json_encode($retorno);
        return true;        
    }
}

}







