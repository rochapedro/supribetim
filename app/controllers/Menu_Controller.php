<?php

if (!isset($_SESSION['REGISTRO_URL_APP'])){
    session_start();
}

if (isset($_REQUEST['funcao'])){
    require_once( $_SESSION['REGISTRO_URL_MODELS'].'Menu.php');
    $funcao = $_REQUEST['funcao'];
    switch ($funcao) {
        
    }
}else{
    require_once( $_SESSION['REGISTRO_URL_MODELS'].'Menu.php');
}

class MenusController {
    
    public static function showMenus(){
        $data = new Menus();
        $data = $data->getMenus();
        

        $return = '';
        foreach ($data as $row){
            $return .= '
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><img alt="Brand" src="'.$row->icon.'" style="width: 30px; right:30px; float:left; margin-top:-6px; margin-right:5px;">'.$row->nome.'</h3>
                            </div>
                            <div class="panel-body">
                                <p class="panel-text">'.$row->descricao.'</p>
                                <a href="'.$row->link.'" class="btn btn-primary" title="Acessar aferidor de temperatura">'.$row->botao.'</a>
                            </div>
                        </div>
                    </div>
            ';
        }
        return $return;
    }

    

}






