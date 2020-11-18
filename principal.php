<?php

if (!isset($_SESSION['FERRAM_URL_APP'])){
  session_start();
}

  require_once ('app/session.php');
  require_once ('app/scripts.php');
  require_once ($_SESSION['REGISTRO_URL_CONTROLLERS'].'Menu_Controller.php');
?>

<!doctype html>
<html lang="en">
  <head>
    
    <?php
      getMeta();
      getCSSCommonFiles();
      getPWA();
    ?>
    <link rel="icon" type="image/x-icon" href="icons/icon.png" />
    <title><?php getAppName(); ?></title>
  </head>
  <body>
    
    <?php 
      require_once ('includes/navbar/navbar.php');
    ?>

    <div class="container" style="margin-top: 60px;">
      <div class="row">
        <?php
          echo MenusController::showMenus();
        ?>
      </div>
    </div>

  
    <?php
      getJsCommonFiles();
    ?>

    <!-- Importando o js do bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
  </body>
</html>