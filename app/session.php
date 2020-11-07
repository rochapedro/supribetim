<?php
@session_start(); //Iniciando a sessão

if(!isset($_SESSION["id_pessoa"])){

 		header('Location: ../login.php');
}else{

	$id_pessoa = $_SESSION["id_pessoa"]; 
}

