<?php
header("Expires: Tue, 01 Jan 2000 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$filename = 'configuration.class.php';
if (file_exists('installation') === true) {
	if (file_exists($filename) === true) {
		$filesize = filesize($filename);
		if ($filesize > 0) {
			echo '<br>Elimine el directiorio "installation"';
		} else {
			goto installation;
		}
	} else {
		installation:
		echo '<meta http-equiv="refresh" content="0;url=installation/">';
	}
	exit();
} else {
	if (file_exists($filename) === true) {
		$filesize = filesize($filename);
		if ($filesize === 0 || $filesize === false ) {
			echo 'No existe el archivo de configuracion.';
			exit();
		}
	}
}

require('sibas-db.class.php');
require('session.class.php');
$link = new SibasDB();
$session = new Session();
$token = $session->check_session();

$user_id = NULL;
$user = 'Iniciar Sesión';
$user_name = NULL;
$user_type = NULL;
$user_depto = NULL;
$ef_id = NULL;

if($token === true){
	if (($rowUs = $link->verify_type_user($_SESSION['idUser'], $_SESSION['idEF'])) !== FALSE) {
		$user_id = $rowUs['u_id'];
		$user = $rowUs['u_usuario'];
		$user_name = $rowUs['u_nombre'];
		$user_type = $rowUs['u_tipo_codigo'];
		$user_depto = $rowUs['u_depto'];
	}
	
	switch($user_type){
		case 'ROOT':
			break;
		case 'ADM':
			echo '<meta http-equiv="refresh" content="0;url=admin/" >';
			break;
		case 'OPR':
			echo '<meta http-equiv="refresh" content="0;url=admin/" >';
			break;
		case 'FAC':
			break;
		case 'LOG':
			break;
		case 'CRU':
			echo '<meta http-equiv="refresh" content="0;url=admin/" >';
			break;
		case 'REP':
			break;
		case 'IMP':
			break;
	}
	
	$HOST_CLIENT = $link->get_financial_institution($user_id, $token);
	//$link->close();
}else{
	/*$_SELF = strtolower($_SERVER['HTTP_HOST']);
	
	$_HOST_NAME = '';
	
	if (strpos($_SELF, 'localhost') !== FALSE) {
		$_HOST_NAME = 'BNB';
	} elseif (strpos($_SELF, 'miguel-mgm') !== FALSE) {
		$_HOST_NAME = 'BNB';
	} elseif (strpos($_SELF, 'abrenet.com') !== FALSE) {
		$_HOST_NAME = 'BNB';
	} elseif (strpos($_SELF, 'bnb') !== FALSE) {
		$_HOST_NAME = 'BNB';
	}
	
	if(($HOST_CLIENT = $link->get_financial_institution_offline($_HOST_NAME)) !== FALSE){
		$_SESSION['idEF'] = base64_encode($HOST_CLIENT['idef']);
	} else {
		exit();
	}*/
	
	if (($HOST_CLIENT = $link->get_financial_institution_ins()) !== false) {
		$_SESSION['idEF'] = base64_encode($HOST_CLIENT['idef']);
	} else {
		exit();
	}
	
	
}

//$HOST_CLIENT = $link->get_financial_institution($user_id, $token);
$ms = NULL;
$page = NULL;

if(isset($_GET['ms']) && isset($_GET['page'])){
	$ms = $_GET['ms'];
	$page = $_GET['page'];
}
?>
<!doctype html>
<html><head>
<meta charset="utf-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<meta content="IE=edge" http-equiv="X-UA-Compatible" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<title>SIBAS</title>

<link href="img/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link type="text/css" href="css/style.css" rel="stylesheet" />
<link type="text/css" href="jQueryAssets/smoothness/jquery.ui.all.css" rel="stylesheet" >
<link type="text/css" href="fancybox/jquery.fancybox.css" rel="stylesheet" media="screen" />
<link type="text/css" href="css/tooltip-ui.css" rel="stylesheet" />
<link type="text/css" href="css/flat/_all.css" rel="stylesheet" />
<link type="text/css" href="css/square/_all.css" rel="stylesheet" />
<link type="text/css" href="css/line/_all.css" rel="stylesheet" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="jQueryAssets/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="jQueryAssets/ui/jquery.ui.widget.js"></script>

<script type="text/javascript" src="jQueryAssets/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="jQueryAssets/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script type="text/javascript" src="jQueryAssets/ui/jquery.ui.accordion.js"></script>
<script type="text/javascript" src="jQueryAssets/ui/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="jQueryAssets/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="jQueryAssets/ui/jquery.ui.tooltip.js"></script>

<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>

<script type="text/javascript" src="js/icheck.js"></script>
<script type="text/javascript" src="js/custom.min.js"></script>

<!--[if lte IE 8]>
<script type="text/javascript" src="js/modernizr.custom.17465.js"></script>
<![endif]-->

<script type="text/javascript" src="js/jquery.mgm_validate-form.js"></script>
<script type="text/javascript" src="js/jquery.mgm_report-cxt.js"></script>
<script type="text/javascript" src="js/jquery.mgm_autocomplete.js"></script>
<script type="text/javascript" src="js/ajaxupload.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<script type="text/javascript">
$(document).ready(function(e) {
	var browser = checkBrowser();
	browser = browser.split('|');
	sidebarMenu();
	go_to_home();
	/*if(browser[0] != 5)
		sidebarMenu();
	else if(browser[2] >= 10)
		sidebarMenu();*/
});
</script>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<!--[if lte IE 9]>
	<style type="text/css">
		#main-menu li ul.mega > a.link-pr:hover, #main-menu li ul.mega li ul li:hover > a.link-pr {
			color: #0093D9;
		}
	</style>
<![endif]-->
</head>

<body>
<header>
	<div id="container-logo">
		<div id="logo-client" class="logo-01">
        	<img src="images/<?=$HOST_CLIENT['cliente_logo'];?>" align="left">
        </div>
		<!--<nav id="c-header-menu"></nav>-->
		<div id="logo-sibas" class="logo-01">
<?php
	if (($rsEfCia = $link->getFinancialInstitutionCompany($_SESSION['idEF'])) !== false) {
		while ($rowEfCia = $rsEfCia->fetch_array(MYSQLI_ASSOC)) {
			echo '<img src="images/' . $rowEfCia['c_logo'] . '" align="right">';
		}
	}
?>
        </div>
	</div>
</header>
<?php
if (!isset($_GET['c-p'])) {
?>
<nav id="c-main-menu">
	<div id="menu-container">
<?php
	$tokenM = $token;
	get_menu($user_type, $tokenM, $link);
?>
		<!--
		--><ul id="user-menu">
			<li><a href="#"><span class="login-icon"></span><span class="login-txt"><?=$user;?><br><span><?=$user_name;?></span></span></a>
				<ul>
<?php
	if($tokenM === FALSE){
		include('USR-form-login.php');
	}else{
?>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="index.php">Opciones de Usuario</a></li>
					<li><a href="index.php">Telefono de Agencia</a></li>
					<li><a href="logout.php">Salir</a></li>
<?php
	}
?>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<?php
}

if($token === FALSE){
	if($ms === NULL)
		include('slider.inc.php');
	elseif($page === md5('P_fac')){
		include('slider.inc.php');
	}
}

function get_menu($user_type, $tokenM, $link){
?>
<ul id="main-menu">
    <li><a href="#">Entidad Financiera</a>
        <ul>
			<li><a href="index.php">Inicio</a></li>
			<li><a href="http://ecofuturo.abrenet.com/aulavirtual/" target="_blank">E-learning</a></li>
            <li><a href="index.php?ms=<?=md5('MS_COMP');?>&page=<?=md5('P_aboutus');?>">Nosotros</a></li>
            <li><a href="index.php?ms=<?=md5('MS_COMP');?>&page=<?=md5('P_forms');?>">Formularios</a></li>
            <li><a href="index.php?ms=<?=md5('MS_COMP');?>&page=<?=md5('P_fAQs');?>">Preguntas Frecuentes</a></li>
            <li><a href="index.php?ms=<?=md5('MS_COMP');?>&page=<?=md5('P_contacts');?>">Contacte con nosotros</a></li>
        </ul>
    </li>
    <li>
    	<a href="#">Productos</a>
    	<ul class="mega">
<?php
if (($rsMenu = $link->get_product_menu($_SESSION['idEF'])) !== FALSE) {
	while ($rowMenu = $rsMenu->fetch_array(MYSQLI_ASSOC)) {
?>
			<li><a href="#"><?=$rowMenu['producto_nombre'];?></a>
				<ul>
<?php
		if ($tokenM === TRUE) {
			if ($user_type === 'LOG' || $user_type === 'ROOT') {
				$titleMenuCot = 'Cotizar Póliza';

				if ($rowMenu['producto'] === 'TH') {
					$titleMenuCot = 'Cotizar y Emitir Póliza';
				}
?>
					<li><a href="index.php?ms=<?=md5('MS_'.$rowMenu['producto']);?>&page=<?=md5('P_quote');?>" class="link-pr">
						<?=$titleMenuCot;?>
					</a></li>
<?php
				if ($rowMenu['producto'] !== 'TH') {
?>
					<li><a href="index.php?ms=<?=md5('MS_'.$rowMenu['producto']);?>&page=<?=md5('P_issue');?>" class="link-pr">
						Emitir Cotización
					</a></li>
<?php
				}
			
				if ($link->verify_implant($_SESSION['idEF'], $rowMenu['producto']) === false) {
					if ($rowMenu['producto'] !== 'TH') {
?>
					<li><a href="index.php?ms=<?=md5('MS_'.$rowMenu['producto']);?>&page=<?=md5('P_app_ok');?>" class="link-pr">
						Solicitudes Preaprobadas
					</a></li>
<?php
					}
				} else {
					if ($rowMenu['producto'] !== 'TH') {
?>
                    <li><a href="index.php?ms=<?=md5('MS_'.$rowMenu['producto']);?>&page=<?=md5('P_app_pe');?>" class="link-pr">
						Solicitudes Pendientes
					</a></li>
<?php
					}
	            }
				
				if ($rowMenu['producto'] !== 'TH') {
?>
					<li><a href="index.php?ms=<?=md5('MS_'.$rowMenu['producto']);?>&page=<?=md5('P_cancel');?>" class="link-pr">
						Anular Póliza
					</a></li>
<?php
				}
				
	            if (($rowMenu['producto'] === 'AU' || $rowMenu['producto'] === 'TRD') && true === (boolean)$rowMenu['cp']) {
?>
					<li><a href="index.php?ms=<?=md5('MS_'.$rowMenu['producto']);?>&page=<?=md5('P_provisional');?>" class="link-pr">
						Certificados Provisionales
					</a></li>
<?php
				}
			}
			
			if ($user_type === 'FAC' || $user_type === 'ROOT') {
				if ($rowMenu['producto'] !== 'TRD' && $rowMenu['producto'] !== 'TH') {
?>
					<li><a href="index.php?ms=<?=md5('MS_'.$rowMenu['producto']);?>&page=<?=md5('P_fac');?>" class="link-pr">
						Registros Facultativos
					</a></li>
<?php
				}
			} elseif ($user_type === 'IMP' && $link->verify_implant($_SESSION['idEF'], $rowMenu['producto']) === true) {
?>
					<li><a href="index.php?ms=<?=md5('MS_'.$rowMenu['producto']);?>&page=<?=md5('P_app_imp');?>" class="link-pr">
						Solicitudes de Aprobación
					</a></li>
<?php
			}
		} else {
?>
					<li><a href="index.php?ms=<?=md5('MS_'.$rowMenu['producto']);?>&page=<?=md5('P_quote');?>" class="link-pr">
						Cotizar Póliza
					</a></li>
<?php
		}
?>
				</ul>
			</li>
<?php
	}
}
?>
    	</ul>
    </li>
<?php
if($tokenM === TRUE){
	if($user_type === 'LOG' || $user_type === 'ROOT'){
?>
	<li><a href="#">Siniestros</a>
        <ul>
            <li><a href="rc-report.php?ms=<?=md5('MS_RC');?>&page=<?=md5('P_report');?>">Reportar Siniestros</a></li>
            <li><a href="http://200.105.205.142/reprec2/" target="_blank">Ver Estado</a></li>
            <li><a href="rc-report.php?ms=<?=md5('MS_RC');?>&page=<?=md5('P_records');?>">Reportes</a></li>
		</ul>
    </li>
<?php
	}
}

if($tokenM === TRUE){
	if($user_type === 'ROOT' || $user_type === 'LOG' || $user_type === 'REP'){
?>
    <li><a href="#">Reportes</a>
        <ul>
			<li><a href="index.php?ms=<?=md5('MS_REP');?>&page=<?=md5('P_general');?>">Generales</a></li>
			<li><a href="index.php?ms=<?=md5('MS_REP');?>&page=<?=md5('P_policy');?>">Pólizas Emitidas</a></li>
			<li><a href="index.php?ms=<?=md5('MS_REP');?>&page=<?=md5('P_quote');?>">Cotizaciones</a></li>
        </ul>
    </li>
<?php
	}
}
?>
</ul>
<?php
}
?>