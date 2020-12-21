<?php

if (!isset($_SESSION['FERRAM_URL_APP'])){
  session_start();
}
  // Chamo todas as dependências relacionadas a página
  require_once ($_SESSION['REGISTRO_URL_APP'].'/session.php');  
  require_once ($_SESSION['REGISTRO_URL_APP'].'/scripts.php');
  require_once ($_SESSION['REGISTRO_URL_CONTROLLERS'].'Casa_Controller.php');
  require_once ($_SESSION['REGISTRO_URL_CONTROLLERS'].'Pessoa_Controller.php');
  require_once ($_SESSION['REGISTRO_URL_CONTROLLERS'].'Registro_Controller.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <?php
      getMeta();
      getIcon();
      // Chamo as dependências de CSS da página
      getCSSCommonFiles();
      getCSSDataTables();
      getCSSSelectpiker();
      getPWA();
    ?>
    <title><?php getAppName(); echo " | Usuários"; ?></title>
    <style>
      <?php 
        if(isset($_REQUEST['filter'])){
          echo '
            #escondido{
              display:block;
            }
          ';
        } else {
          echo '
            #escondido{
              display:none;
            }
          ';
        } 
      ?>
  </style>
  </head>
  <body>
    <!-- Chamo a navbar -->
    <?php 
      require_once ($_SESSION['REGISTRO_URL_INCLUDES'].'/navbar/navbar.php');
    ?>

    <div class="container" style="margin-top: 60px;">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">
            Usuários
          </h3>
        </div><!-- /panel heading -->
        <div class="panel-body">
          <div class="col-md-12 table-responsive" style="margin-top: 10px;">
            <table id="tableRegistros" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
              <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Data</th>
                    <th>Temperatura</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  
                ?>
              </tbody>   
            </table>
          </div>
        </div><!-- /panel body -->
      </div><!-- /panel -->
    </div><!-- /container -->

    <?php
      // Chamo as dependências de JavaScript da página
      getJsCommonFiles();
      getJsDataTables();
      getJsSelectpiker();
      //Chamo os modais responsáveis por cadastrar e editar os registros
      require_once ($_SESSION['REGISTRO_URL_MODALS'].'cadRegistro.php');
      require_once ($_SESSION['REGISTRO_URL_MODALS'].'editRegistro.php');
    ?>

  </body>
</html>