<?
$nombre=@mysql_real_escape_string(saneaVar($_POST['nombre']));
$telefono=@mysql_real_escape_string(saneaVar($_POST['telefono']));
$email=@mysql_real_escape_string(saneaVar($_POST['email']));
$mensaje=@mysql_real_escape_string(saneaVar($_POST['mensaje']));

if (strlen($nombre)>0 AND strlen($telefono)>0 AND strlen($email)>6 AND strlen($mensaje)>0) {
	
	$sintaxis='{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}';

	if (preg_match($sintaxis,$email)){

	$num1=$_SESSION['numero1']; 
	$seg=$_POST['clave_paso'];
	
		if ($num1 == $seg) {
	
		$subject = $empresa_web." - Contacto";
		$message .= "<b>DATOS DEL CLIENTE</b><br>";
		$message .= "Nombre: ".$nombre."<br>";
		$message .= "Telefono: ".$telefono."<br>";
		$message .= "Email: ".$email."<br>";
		$message .= "Mensaje: ".$mensaje."<br>";
		$message .= "</div>";
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=windows-1252\r\n";
		$headers .= "To: <".$email_web.">\r\n";
	//	$headers .= "To: <desarrollo@pcsignos.com.ar>\r\n";
		$headers .= "From: ".$email." \r\n";
		@mail($to, $subject, $message, $headers);
		$respuesta='<a href="data/contenido/mensajes.php?lang='.$lang.'" id="alerta"></a>';
		
		?>
        
        <? echo $conversion;?>
        
        <? 
		
		}
	}
} 

?>

<? echo $respuesta;?>




<div id="m5">

<div class="m1"><iframe width="100%" height="450" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="http://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=<? echo $direccion_web;?>&amp;aq=&amp;vpsrc=0&amp;ie=UTF8&amp;hq=&amp;hnear=<? echo $direccion_web;?>&amp;t=m&amp;z=14&amp;iwloc=r1&amp;output=embed"></iframe></div>


<? if ($lang!='en'){?>

<div class="m2">

<h1>DATOS DE CONTACTO</h1>

<h2>TELÉFONO</h2>
<h3><? echo $telefono_web;?></h3>

<h2>EMAIL</h2>
<h3><? echo $email_web;?></h3>

<h2>DIRECCIÓN</h2>
<h3><? echo $direccion_web;?></h3>

<h2>HORARIOS</h2>
<h3><? echo $horario_web;?></h3>


<div class="clear"></div>
</div>

<div class="m3">

<h1>FORMULARIO</h1>

<? 
$DesdeLetra = "a";
$HastaLetra = "y";
$DesdeNumero = 1;

for ($n=0;$n<5;$n++){
$letraAleatoria .= chr(rand(ord($DesdeLetra), ord($HastaLetra)));
}
$HastaNumero = 1000;
$numeroAleatorio = $letraAleatoria .rand($DesdeNumero, $HastaNumero);

$_SESSION['numero1']=$numeroAleatorio;

?>

<form id="contactenos" name="contactenos" method="post">

<input name="control_paso" type="hidden" id="control_paso" value="<? echo $numeroAleatorio ?>" />


<h2>Nombre <span>*</span></h2>
<input type="text" id="nombre" name="nombre"/>
<div id="t1" class="b1">Campo requerido.</div>

<h2>Email <span>*</span></h2>
<input type="text" id="email" name="email"/>
<div id="t2" class="b1">Campo requerido.</div>

<h2>Teléfono <span>*</span></h2>
<input type="text" id="telefono" name="telefono"/>
<div id="t3" class="b1">Campo requerido.</div>

<h2>Mensaje <span>*</span></h2>
<textarea name="mensaje" id="mensaje"></textarea>
<div id="t4" class="b1">Campo requerido.</div>

<h2>Seguridad: <? echo $numeroAleatorio ;?> <span>*</span></h2>
<input name="clave_paso" id="clave_paso" type="text" />
<div id="t5" class="b1">Campo requerido.</div>

<h3>* Campos obligatorios</h3>
<input type="button" value="ENVIAR" onclick="valida_contactenos()"/>

</form>
<div class="clear"></div>
</div>

<? } else {?>


<div class="m2">

<h1>CONTACT</h1>

<h2>PHONE</h2>
<h3><? echo $telefono_web;?></h3>

<h2>EMAIL</h2>
<h3><? echo $email_web;?></h3>

<h2>ADDRESS</h2>
<h3><? echo $direccion_web;?></h3>

<h2>HOURS</h2>
<h3><? echo $horario_web;?></h3>


<div class="clear"></div>
</div>

<div class="m3">

<h1>FORM</h1>

<form id="contactenos" name="contactenos" method="post">

<h2>Name <span>*</span></h2>
<input type="text" id="nombre" name="nombre"/>
<div id="t1" class="b1">Required field.</div>

<h2>Email <span>*</span></h2>
<input type="text" id="email" name="email"/>
<div id="t2" class="b1">Required field.</div>

<h2>Phone <span>*</span></h2>
<input type="text" id="telefono" name="telefono"/>
<div id="t3" class="b1">Required field.</div>

<h2>Message <span>*</span></h2>
<textarea name="mensaje" id="mensaje"></textarea>

<div id="t4" class="b1">Required field.</div>

<h3>* Required fields</h3>
<input type="button" value="SEND" onclick="valida_contactenos()"/>

</form>
<div class="clear"></div>
</div>


<? } ?>



<div class="clear"></div>
</div>
