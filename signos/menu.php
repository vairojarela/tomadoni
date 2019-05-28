<? session_start();
ini_set('display_errors', 0);
ini_set('error_log','');
if (!isset($_SESSION['activo'])) { session_destroy(); header('refresh:0; url=index.php'); exit();}?>
<? include ('data/funciones/seguridad.php');?>
<? include ('data/estructura/head.php');?>
<? $accion=$_GET['accion'];?>

<? include ('data/estructura/cabecera.php');?>

<div class="mainwrapper">
<? include ('data/estructura/menu.php');?> 

<div class="rightpanel">

<?
 
$match_code="/^(?:\+|-)?\d+[A-Z]{1,1}$/";
$match_code2="/^(?:\+|-)?\d+$/";
if (strlen($accion)>0 AND (preg_match($match_code,$accion) OR preg_match($match_code2,$accion)) ) { 

switch ($accion){


	case '2A':
	include('data/contenido/alta_banner.php');
	break;

	case '3A':
	include('data/contenido/alta_seo.php');
	break;

	case '4A':
	include('data/contenido/alta_info.php');
	break;
	
	case '5A':
	include('data/contenido/alta_contenido.php');
	break;

	case '7A':
	include('data/contenido/alta_publicidad.php');
	break;
		
									
}} else {
	
	echo '<meta http-equiv=refresh content=0;URL=menu.php?accion=2A&tipo=Principal';
	
	}

?>

</div>
</div>

</body>
</html>