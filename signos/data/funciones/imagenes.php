<? 

include("data/funciones/nimagenB.php");

$donde_lo_guarda=$carpeta1;	


//----IMG_PRIN----//
$imgp=$HTTP_POST_FILES['img_p']['tmp_name'];
if(($C_imgp)=='ok'){ $archivo_a_subir=$imgp;$datos = @getimagesize($imgp);
if($pesop>500000){ $ancho = 0; } else {if($datos[0]>1000){$ancho =1000;}else{$ancho=$datos[0];} $alto=($ancho / $datos[0]) * $datos[1];}
if($datos[2]>=1 AND $datos[2]<=3){$nombre2="prin_".time('m:s');} if($ancho>0){$x=subir_imagen($archivo_a_subir,$carpeta1.'/',$nombre2,$ancho,$alto,'productos');}}

//----IMG_01----//
$img1=$HTTP_POST_FILES['img1']['tmp_name'];
if(($C_img1)=='ok'){$archivo_a_subir=$img1; $datos = getimagesize($img1);
if($peso1>500000){$ancho =0;}else{if($datos[0]>1000){$ancho =1000;}else{$ancho=$datos[0];} $alto=($ancho / $datos[0]) * $datos[1];}
if($datos[2]>=1 AND $datos[2]<=3){$nombre2="01_".time('m:s');} if($ancho>0){$x=subir_imagen($archivo_a_subir,$carpeta1.'/',$nombre2,$ancho,$alto,'productos');}}

//----IMG_02----//
$img2=$HTTP_POST_FILES['img2']['tmp_name'];
if(($C_img2)=='ok'){$archivo_a_subir=$img2; $datos = getimagesize($img2); 
if($peso2>500000){ $ancho =0; }else{ if($datos[0]>1000){$ancho =1000;}else{$ancho=$datos[0];} $alto=($ancho / $datos[0]) * $datos[1];}
if($datos[2]>=1 AND $datos[2]<=3){$nombre2="02_".time('m:s');} if($ancho>0){ $x=subir_imagen($archivo_a_subir,$carpeta1.'/',$nombre2,$ancho,$alto,'productos');}}

//----IMG_03----//
$img3=$HTTP_POST_FILES['img3']['tmp_name'];
if(($C_img3)=='ok'){ $archivo_a_subir=$img3; $datos = getimagesize($img3); 
if($peso3>500000){ $ancho =0; }else{ if($datos[0]>1000){$ancho =1000;}else{$ancho=$datos[0];} $alto=($ancho / $datos[0]) * $datos[1];}
if($datos[2]>=1 AND $datos[2]<=3){$nombre2="03_".time('m:s');} if($ancho>0){ $x=subir_imagen($archivo_a_subir,$carpeta1.'/',$nombre2,$ancho,$alto,'productos');}}

//----IMG_04----//
$img4=$HTTP_POST_FILES['img4']['tmp_name'];
if(($C_img4)=='ok'){ $archivo_a_subir=$img4; $datos = getimagesize($img4); 
if($peso4>500000){ $ancho =0; }else{ if($datos[0]>1000){$ancho =1000;}else{$ancho=$datos[0];} $alto=($ancho / $datos[0]) * $datos[1];}
if($datos[2]>=1 AND $datos[2]<=3){$nombre2="04_".time('m:s');} if($ancho>0){ $x=subir_imagen($archivo_a_subir,$carpeta1.'/',$nombre2,$ancho,$alto,'productos');}}

//----IMG_05----//
$img5=$HTTP_POST_FILES['img5']['tmp_name'];
if(($C_img5)=='ok'){ $archivo_a_subir=$img5; $datos = getimagesize($img5); 
if($peso5>500000){ $ancho =0; }else{ if($datos[0]>1000){$ancho =1000;}else{$ancho=$datos[0];} $alto=($ancho / $datos[0]) * $datos[1];}
if($datos[2]>=1 AND $datos[2]<=3){$nombre2="05_".time('m:s');} if($ancho>0){ $x=subir_imagen($archivo_a_subir,$carpeta1.'/',$nombre2,$ancho,$alto,'productos');}}

//----IMG_06----//
$img6=$HTTP_POST_FILES['img6']['tmp_name'];
if(($C_img6)=='ok'){ $archivo_a_subir=$img6; $datos = getimagesize($img6); 
if($peso6>500000){ $ancho =0; }else{ if($datos[0]>1000){$ancho =1000;}else{$ancho=$datos[0];} $alto=($ancho / $datos[0]) * $datos[1];}
if($datos[2]>=1 AND $datos[2]<=3){$nombre2="06_".time('m:s');} if($ancho>0){ $x=subir_imagen($archivo_a_subir,$carpeta1.'/',$nombre2,$ancho,$alto,'productos');}}

?>
