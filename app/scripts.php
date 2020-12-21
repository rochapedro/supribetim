
<?php

if (!isset($_SESSION)) {
    session_start();
}

//DEFINIÇÕES DE VARIÁVEIS GLOBAIS
define('DS', DIRECTORY_SEPARATOR);

unset($_SESSION['REGISTRO_URL_PROTOCOL']);

if (!isset($_SESSION['REGISTRO_URL_PROTOCOL'])) {

    /* URL BASE DO SISTEMA */
    $root = $_SERVER['DOCUMENT_ROOT'];
    $root = str_replace(trim(' \ '), DS, $root);
    $root = str_replace(trim(' / '), DS, $root);
    $_SESSION['REGISTRO_URL_HTTP_BASE'] = 'http://'.$_SERVER['HTTP_HOST'].'/supribetim/';
    $_SESSION['REGISTRO_URL_BASE'] = $root.'/supribetim/';
    $_SESSION['REGISTRO_URL_APP']  = $_SESSION['REGISTRO_URL_BASE'] . 'app' . DS;
    $_SESSION['REGISTRO_URL_MODELS'] = $_SESSION['REGISTRO_URL_APP'] .'models'. DS;
    $_SESSION['REGISTRO_URL_CONTROLLERS'] = $_SESSION['REGISTRO_URL_APP'] . 'controllers' . DS;
	$_SESSION['REGISTRO_URL_CSS']  = $_SESSION['REGISTRO_URL_BASE'] . 'css' . DS;
	$_SESSION['REGISTRO_URL_JS']  = $_SESSION['REGISTRO_URL_BASE'] . 'js' . DS;
	$_SESSION['REGISTRO_URL_INCLUDES']  = $_SESSION['REGISTRO_URL_BASE'] . 'includes' . DS;
	$_SESSION['REGISTRO_URL_JQUERY']  = $_SESSION['REGISTRO_URL_BASE'] . 'jquery' . DS;
	$_SESSION['REGISTRO_URL_MODALS']  = $_SESSION['REGISTRO_URL_BASE'] . 'modals' . DS;
	$_SESSION['REGISTRO_URL_MENUS']  = $_SESSION['REGISTRO_URL_BASE'] . 'menus' . DS;
	$_SESSION['REGISTRO_URL_ICONS']  = $_SESSION['REGISTRO_URL_BASE'] . 'icons' . DS;
	$_SESSION['REGISTRO_URL_INCLUDES']  = $_SESSION['REGISTRO_URL_BASE'] . 'includes' . DS;

    /* INCLUDE */
	$_SESSION['REGISTRO_URL_INCLUDES'] = $_SESSION['REGISTRO_URL_BASE'] . 'includes' . DS;
	
	/* QR Code */
	$_SESSION['REGISTRO_URL_QR_CODE'] = $_SESSION['REGISTRO_URL_BASE'] . 'code_qr' . DS;

    /* LOCATION DOS DIRETORIOS */
    $_SESSION['REGISTRO_URL_LOCATION_WEB'] = $_SESSION['REGISTRO_URL_HTTP_BASE'] . 'web';
    $_SESSION['REGISTRO_URL_LOCATION_DIST'] = $_SESSION['REGISTRO_URL_HTTP_BASE'] . 'dist';
    $_SESSION['REGISTRO_URL_LOCATION_APP'] = $_SESSION['REGISTRO_URL_HTTP_BASE'] . 'app';
    $_SESSION['REGISTRO_URL_LOCATION_MODELS'] =$_SESSION['REGISTRO_URL_LOCATION_APP'] . 'models';
    $_SESSION['REGISTRO_URL_LOCATION_CONTROLLERS'] = $_SESSION['REGISTRO_URL_LOCATION_APP'] .'/'. 'controllers';
	$_SESSION['REGISTRO_URL_LOCATION_CSS'] = $_SESSION['REGISTRO_URL_HTTP_BASE'] . 'css';
	$_SESSION['REGISTRO_URL_LOCATION_JS'] = $_SESSION['REGISTRO_URL_HTTP_BASE'] . 'js';
	$_SESSION['REGISTRO_URL_LOCATION_ASSETS'] = $_SESSION['REGISTRO_URL_HTTP_BASE'] . 'assets';
	$_SESSION['REGISTRO_URL_LOCATION_JQUERY'] = $_SESSION['REGISTRO_URL_HTTP_BASE'] . 'jquery';
	$_SESSION['REGISTRO_URL_LOCATION_MODALS'] = $_SESSION['REGISTRO_URL_HTTP_BASE'] . 'modals';
	$_SESSION['REGISTRO_URL_LOCATION_ICONS'] = $_SESSION['REGISTRO_URL_HTTP_BASE'] . 'icons';
	$_SESSION['REGISTRO_URL_LOCATION_PWA'] = $_SESSION['REGISTRO_URL_HTTP_BASE'] . 'pwa';
}

function getAppName(){
	echo 'SupriBetim';
}

function getIcon(){
	echo '<link rel="icon" type="image/x-icon" href="'.$_SESSION['REGISTRO_URL_LOCATION_ICONS'].'/icon.png" />';
}


function getMeta(){
	echo '
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, iniall-scale=1.0, minimal-ui, user-scalable=no"/>
	';
}


function getCSSCommonFiles(){
	echo '
	 
	  <link href="'.$_SESSION['REGISTRO_URL_LOCATION_CSS'].'/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
	  <link href="'.$_SESSION['REGISTRO_URL_LOCATION_CSS'].'/fontawesome-free/css/all.min.css" rel="stylesheet" />
	  <link href="'.$_SESSION['REGISTRO_URL_LOCATION_CSS'].'/fontawesome-free/css/fontawesome.min.css" rel="stylesheet" /> 
	  <link href="'.$_SESSION['REGISTRO_URL_LOCATION_CSS'].'/style/style.css" rel="stylesheet" /> 
	';
}

function getCSSSelectpiker(){
	echo '
	  <link href="'.$_SESSION['REGISTRO_URL_LOCATION_CSS'].'/select/bootstrap-select.css" rel="stylesheet" type="text/css" />  
	';
}


function getCSSDataTables(){
	echo '
	<link href="'.$_SESSION['REGISTRO_URL_LOCATION_CSS'].'/datatable/dataTables.bootstrap4.css" rel="stylesheet"/>

	<link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css" rel="stylesheet"/>

	<link href="'.$_SESSION['REGISTRO_URL_LOCATION_CSS'].'/datatable/buttons.bootstrap4.css" rel="stylesheet"/>

	';
}

function getCSSSidebar(){
	echo '
	<link href="'.$_SESSION['REGISTRO_URL_LOCATION_CSS'].'/sidebar/sidebar.css" rel="stylesheet"/>
	';
}


function getJsCommonFiles(){
	echo '
	<script src="'.$_SESSION['REGISTRO_URL_LOCATION_JS'].'/datatable/jquery-3.5.1.js"></script>
	<script src="'.$_SESSION['REGISTRO_URL_LOCATION_JS'].'/validator/validador.min.js"></script>
	<script src="'.$_SESSION['REGISTRO_URL_LOCATION_JS'].'/bootstrap/bootstrap.min.js"></script>
	
	';
}  

function getJsDataTables(){
	echo '
	<script src="'.$_SESSION['REGISTRO_URL_LOCATION_JS'].'/datatable/jquery.dataTables.min.js"></script>
	<script src="'.$_SESSION['REGISTRO_URL_LOCATION_JS'].'/datatable/dataTables.bootstrap4.min.js"></script>

	<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
	
	<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
	<script src="'.$_SESSION['REGISTRO_URL_LOCATION_JS'].'/datatable/buttons.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
	
	<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>

	';
}

function getJsSelectpiker(){
	echo '
	<script src="'.$_SESSION['REGISTRO_URL_LOCATION_JS'].'/select/bootstrap-select.min.js"></script>
	';
}

function getJqueryMask(){
	echo '
	<script src="'.$_SESSION['REGISTRO_URL_LOCATION_JS'].'/jquery/jquery.mask.min.js"></script>
	';
}

function getPWA(){
	echo '
		<link rel="manifest" href="'.$_SESSION['REGISTRO_URL_HTTP_BASE'].'manifest.json" />
		<script src="'.$_SESSION['REGISTRO_URL_HTTP_BASE'].'pwa.dev.min.js"></script>
		<script> if (navigator.serviceWorker) { navigator.serviceWorker.register ('.$_SESSION['REGISTRO_URL_HTTP_BASE'].'sw.js'; echo ') } </script>
	';
}