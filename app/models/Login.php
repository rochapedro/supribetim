<?php 
 session_start();
 require_once('Database.php');
     $pdo = Database::conexao();


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


$consulta = $pdo->query("SELECT p.*, u.*, c.casa_oracao FROM pessoa as p JOIN usuario as u ON u.id_pessoa = p.id_pessoa JOIN casas_oracao as c ON p.id_casa = c.id_casa WHERE u.usuario = '$usuario' AND u.senha = $senha;");

 $count = $consulta->rowCount();

 $usuario = $consulta->fetch(PDO::FETCH_OBJ);

 $_SESSION['id_pessoa'] = $usuario->id_pessoa;
 $_SESSION['id_usuario'] = $usuario->id_usuario;
 $_SESSION['casa_oracao'] = $usuario->casa_oracao;
 $_SESSION['id_casa'] = $usuario->id_casa;
 $_SESSION['is_admin'] = $usuario->is_admin;
 
   if($count>0){
   				header('Location: ../../index.php');
    }else{
    	header('Location: ../../login.php');
    }








