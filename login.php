<?php

if (!isset($_SESSION['FERRAM_URL_APP'])){
  session_start();
}
  require_once('app/scripts.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <?php
      getMeta();
      getCSSCommonFiles();
    ?>
  <title><?php getAppName(); echo " | Login"; ?></title>
  <link rel="icon" type="image/x-icon" href="icons/icon.png" />
  <link rel="stylesheet" href="login.css">

</head>
<body>



<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Login Form -->
    <form action="app/models/Login.php" id="login" method="post">
      <input style="margin-top: 40px;" type="text" id="usuario" class="fadeIn second" name="usuario" placeholder="Usuário">
      <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="Senha">
      <input type="submit" class="fadeIn fourth" onclick="return validar()" value="Log In">
    </form>

    <!-- Remind Passowrd 
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>-->

  </div>
</div>

<?php
  getJsCommonFiles();
?>
<script>
  // Funçao para validar os formulários
  function validar(){
				var usuario = login.usuario.value;
				var senha = login.senha.value;
				
				if(usuario == ""){
					alert('Preencha o campo usuario.');
					login.usuario.focus();
					return false;
				}
				
				if(senha == ""){
					alert('Preencha o campo senha.');
					login.senha.focus();
					return false;
				}
			}
</script>
</body>
</html>


