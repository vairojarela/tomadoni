<?php
	session_start();
	header("Pragma: no-cache");
	ini_set('display_errors', 0);
	ini_set('error_log','');
	include('data/funciones/seguridad.php');
	$usuario_adm=saneaVar($_POST['usuario']);
	$clave_adm=saneaVar($_POST['clave']);
	include("conexion.php");
	$us=mysql_query("select * from usuarios where usuario='".@mysql_real_escape_string($usuario_adm)."'",$conecta);
	$usuario=mysql_fetch_array($us);
	$_SESSION['valida'] = true;
	if (isset($_POST['Ingresar']) && $_POST['Ingresar'] == "Ingresar") {
		if (strlen($usuario_adm)==0 && strlen($clave_adm)==0) {
			header('refresh:0; url=loginerror.php');
			exit();
		}
		if (isset($usuario_adm) && isset($clave_adm)) {
			$xusuario = $usuario_adm;
			$xclave = $clave_adm;
			if (isset($_POST['recordarme']) && $_POST['recordarme'] == 'si') {
				setcookie("recordarme","checked");
				setcookie("usuario",$xusuario);
				setcookie("clave",$xclave);
			} else {
				setcookie("recordarme");
				setcookie("usuario");
				setcookie("clave");
			}

			if ($xusuario == $usuario['usuario'] && $xclave == $usuario['psw']) {
				$_SESSION['activo'] = true;
				$_SESSION['usuario_x'] = $usuario;
				$_SESSION['minutos'] = time();
				header('refresh:0; url=menu.php');
				exit();
			}
		}
		header('refresh:0; url=loginerror.php');
		exit();
	 }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="Robots" content="noindex">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Pcsignos - Panel Administrador</title>
<link rel="stylesheet" href="css/estilos.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/modernizr.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</head>


<body class="loginpage">

<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="images/logo2.png" alt="" /></div>
        
        <form method="post" action="index.php" name="login" id="login">
            
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="usuario" id="usuario" placeholder="Usuario"  value="<?php if (isset($_COOKIE['usuario'])){echo $_COOKIE['usuario']; }?>"/>
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="clave" id="clave" placeholder="Contrase&ntilde;a" value="<?php if (isset($_COOKIE['clave'])) { echo $_COOKIE['clave']; } ?>"/>
            </div>
            <div class="inputwrapper animate3 bounceIn">
               <input name="Ingresar" type="submit" value="Ingresar" class="bt">
            </div>
            <div class="inputwrapper animate4 bounceIn">
                <label><input type="checkbox" class="remember" name="recordarme" id="recordarme" value="si" <?php if (isset ($_COOKIE['recordarme'])){ echo $_COOKIE['recordarme'];} ?> /> Recordame</label>
            </div>
            
        </form>
    </div>
</div>

<div class="loginfooter">
<p>&copy; 2013 Panel Administrador. Todos los derechos reservados. By Pcsignos</p>
</div>

</body>
</html>