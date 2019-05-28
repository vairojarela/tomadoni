<? session_start(); ini_set('display_errors', 0); ini_set('error_log','');
include('data/funciones/seguridad.php');
if ($_GET['lang']=='en'){$lang='en';} else {$lang='es';} 
$accion=saneaVar($_GET['accion']);
include ('data/info.php');
include ('data/estructura/head.php');
include ('data/estructura/cabecera.php');
?>

<? 
$match_code="/^(?:\+|-)?\d+[A-Z]{1,1}$/";
$match_code2="/^(?:\+|-)?\d+$/";
if (strlen($accion)>0 AND (preg_match($match_code,$accion) OR preg_match($match_code2,$accion)) ) { 

switch ($accion){
	
	case '1':
	include('data/contenido/contenido.php');
	break;	
	
	case '3':
	include('data/contenido/contacto.php');
	break;

}} else include('data/contenido/home.php');

?>

<? include('data/estructura/footer.php');?>
