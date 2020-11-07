<?php

if (!isset($_SESSION['REGISTRO_URL_APP'])){
  session_start();
}

if (isset($_REQUEST['funcao'])){
    require_once( $_SESSION['REGISTRO_URL_MODELS'].'Casa.php');
    $funcao = $_REQUEST['funcao'];
    
}else{
    require_once( $_SESSION['REGISTRO_URL_MODELS'].'Casa.php');
}

class CasasController {
    
  public static function getOptionsCasas(){
    $casa = new Casas();
    $casa = $casa->getCasas();

    $retorno = '';
    foreach ($casa as $casa){
        $retorno .= '<option value="'.$casa->id_casa.'">'.$casa->casa_oracao.'</option>';
    }

    return $retorno;
}
    

}






