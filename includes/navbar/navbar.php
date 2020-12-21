<nav class="navbar navbar-default" style="border-radius: 0px;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <img alt="Brand" class="icone" style="width: 35px; right:35px; float:left; margin-top:12px; margin-right:2px;" src=" <?php echo $_SESSION['REGISTRO_URL_LOCATION_ICONS'].'/icon.png'; ?>" style="float:left;"><a class="navbar-brand" title="Ir para página inicial" href="<?php echo $_SESSION['REGISTRO_URL_HTTP_BASE'].'principal.php'; ?>" >SupriBetim</a>';
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php 
          if(basename($_SERVER['PHP_SELF'],'.php') == 'principal' || dirname($_SERVER['PHP_SELF']) == '/supribetim/view/usuario'){
            echo '<li><a href="'; echo $_SESSION['REGISTRO_URL_LOCATION_APP']. '/destroy.php'; echo '">Sair</a></li>
                  <li><a href="view/usuario/index.php" title="Administrar usuários cadastrados">Administrar Usuários</a></li>
            ';
          } else {
            echo '
            <li><a href="index.php" title="Visualizar os registros de temperatura">Registros de Temperatura</a></li>
            <li><a href="cadastro.php" title="Realizar um novo cadastro de pessoas">Cadastrar Pessoas</a></li>
            <li><a href="pessoas.php" title="Visualizar as pessoas cadastradas">Visualizar Pessoas</a></li>
            <li><a href="../usuario/index.php" title="Administrar usuários cadastrados">Administrar Usuários</a></li>
            <li><a href="../../app/destroy.php">Sair</a></li>
            ';
          }
        ?>
      </ul>
    </div>
  </div>
</nav>

