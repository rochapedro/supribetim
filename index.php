<?php
require_once ('app/session.php');

if($id_pessoa){

header('Location: principal.php');
}else{

header('Location: login.php');
}

?>