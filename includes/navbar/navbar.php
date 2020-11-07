<nav class="navbar navbar-default" style="border-radius: 0px;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php
        if(basename($_SERVER['PHP_SELF'],'.php') == 'principal'){
          echo '<img alt="Brand" class="icone" style="width: 35px; right:35px; float:left; margin-top:12px; margin-right:2px;" src="icons/icon.png" style="float:left;"><a class="navbar-brand" href="principal.php" >SupriBetim</a>';
        } else {
          echo '<img alt="Brand" class="icone" style="width: 35px; right:35px; float:left; margin-top:12px; margin-right:2px;" src="../icons/icon.png" style="float:left;"><a class="navbar-brand" href="../principal.php">SupriBetim</a>';
        }
      ?>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php 
          if(basename($_SERVER['PHP_SELF'],'.php') == 'principal'){
            echo '<li><a href="app/destroy.php">Sair</a></li>';
          } else {
            echo '
            <li><a href="index.php">Registros</a></li>
            <li><a href="cadastro.php">Cadastros</a></li>
            <li><a href="pessoas.php">Pessoas</a></li>
            <li><a href="../app/destroy.php">Sair</a></li>
            ';
          }
        ?>
      </ul>
    </div>
  </div>
</nav>

