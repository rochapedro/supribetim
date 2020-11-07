<?php

if (!isset($_SESSION['REGISTRO_URL_APP'])){
    session_start();
}

if (isset($_REQUEST['funcao'])){
    require_once( $_SESSION['REGISTRO_URL_MODELS'].'Pessoa.php');
    $funcao = $_REQUEST['funcao'];
    switch ($funcao) {
        case 'cadastrarPessoa':
            PessoasController::cadastrarPessoa();
            break;

        case 'editarPessoas':
            PessoasController::editarPessoas();
            break;

        case 'delPessoa':
            PessoasController::deletarPessoa($_REQUEST['id_pessoa']);
            break;   

    }
}else{
    require_once( $_SESSION['REGISTRO_URL_MODELS'].'Pessoa.php');
}

class PessoasController {
    
    public static function showTablePessoas(){
        $data = new Pessoa();
        $data = $data->getPessoas();
        

        $return = '';
        foreach ($data as $row){
            $return .= '
                <tr linha-pessoa="'.$row->id_pessoa.'">
                    <td>'.$row->nome.'</td>
                    <td>'.$row->rua.' - n°'.$row->numero.' - '.$row->bairro.' - '.$row->cidade.'</td>
                    <td>'.$row->telefone.'</td>
                    <td>'.$row->casa_oracao.'</td>
                    <td width="5%">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="false" data-target="#editPessoas"
                    data-whatever="'.$row->id_pessoa.'" 
                    data-whatevernome="'.$row->nome.'"
                    data-whatevertelefone="'.$row->telefone.'"
                    data-whateverrua="'.$row->rua.'"
                    data-whatevernumero="'.$row->numero.'"
                    data-whateverbairro="'.$row->bairro.'"
                    data-whatevercidade="'.$row->cidade.'"
                    data-whateverid_casa="'.$row->id_casa.'"
                    data-whateverid_usuario="'.$row->usuario.'"
                    ><i class="fa fa-edit"></i></button>
                    <a href="javascript:delPessoa('.$row->id_pessoa.');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                    
            </tr>
            ';
        }
        return $return;
    }

    public static function cadastrarPessoa(){

        // Defino as caracteres a serem excluidos da máscara de telefone do jquery
        $search  = array('(', ')', '-', ' ');
    
        $classe = new Pessoa();
        $classe->nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $telefone = str_replace($search, '',$telefone); // removo da variável telefone os caracteres de search
        $classe->telefone = $telefone;
        $classe->rua = $_POST['rua'];
        $classe->numero = $_POST['numero'];
        $classe->bairro = $_POST['bairro'];
        $classe->cidade = $_POST['cidade'];
        $classe->id_casa = $_POST['id_casa'];
        $classe->id_usuario = $_POST['id_usuario'];

        if($classe->cadastrarPessoa()){
            header('Location: ../../view/cadastro.php');
            exit;
        }else{
            echo "Erro ao inserir os dados, tente novamente mais tarde.";
        }
        
    }

    public static function editarPessoas(){

        // Defino as caracteres a serem excluidos da máscara de telefone do jquery
        $search  = array('(', ')', '-', ' ');
    
        $editar = new Pessoa();
        $id_pessoa = $_POST['id_pessoa_edit'];
        $editar->id_pessoa = $id_pessoa;
        $editar->nome = $_POST['nome_edit'];
        $telefone = $_POST['telefone_edit'];
        $telefone = str_replace($search, '',$telefone); // removo da variável telefone os caracteres de search
        $editar->telefone = $telefone;
        $editar->rua = $_POST['rua_edit'];
        $editar->numero = $_POST['numero_edit'];
        $editar->bairro = $_POST['bairro_edit'];
        $editar->cidade = $_POST['cidade_edit'];
        $editar->id_casa = $_POST['id_casa_edit'];
        $editar->id_usuario = $_POST['id_usuario_edit'];
 

    if($editar->editarPessoas()){
            header('Location: ../../view/pessoas.php');
            exit;
        }else{
            echo "Erro ao inserir os dados, tente novamente mais tarde.";
        }
}

    public static function getOptionsPessoas(){
        $pessoa = new Pessoa();
        $pessoa = $pessoa->getPessoas();
    
        $retorno = '';
        foreach ($pessoa as $pessoa){
            $retorno .= '<option value="'.$pessoa->id_pessoa.'">'.$pessoa->nome.'</option>';
        }
    
        return $retorno;
    }


    public static function deletarpessoa($id_pessoa){
        $pessoa = new Pessoa();
        $pessoa->id_pessoa = $id_pessoa;
    
        if ($pessoa->deletarpessoa($pessoa)){
            $retorno = array('sucesso' => true);
            echo json_encode($retorno);
            return true;        
        }
    }
    

}






