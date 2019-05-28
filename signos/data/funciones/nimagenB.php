<?
function subir_imagen($archivo,$carpeta,$nombre,$ancho,$alto,$uso){
//echo 'Recibe<br> Archivo: '.$archivo.'<br> Carpeta: '.$carpeta.'<br> Nombre: '.$nombre.'<br> Ancho: '.$ancho.'<br> Alto: '.$alto.'<br>Uso:'.$uso.'<br>';
//set_time_limit(10800); 
/*ini_set("post_max_size","512M"); 
ini_set("upload_max_filesize","120M"); 
ini_set("memory_limit","512M"); 
ini_set("max_execution_time","10800"); // tiene que ser grandito por que subir 50Mb suele tardar bastante 
ini_set("max_input_time","10800");*/

@chmod($carpeta,0777);
$nombre=str_replace(' ','',$nombre);
$width = $ancho;
$height = $alto;

$width2=50;
$height2=50;

if(strlen($archivo)>0){
	$archivo_img=$nombre;
	$acepta_swf=0;
	$ext = obtener_extension($archivo);
	$nombre_archivo_new = $archivo_img.$ext;
	$nombre_archivo_new2 = str_replace('imagen','thumbnail',$nombre.$ext);
	$ubicacion = strtolower($carpeta.$nombre_archivo_new);
	$archivo_temp = $archivo;
	if(!(upload($archivo_temp,$ubicacion,$width,$height,$ext,$acepta_swf))) {
					$pagina = $href."error.php?idError=1024";
					header("Refresh: 0;url=$pagina");
					$correcto=0;
	}
	$correcto=1;
 if($uso=='galeria'){
 	eliminar_archivos($archivo_img,$ext,$carpeta);
	
		$ubicacion = $carpeta."/".$nombre_archivo_new;
		$ubicacion1 = $carpeta."/".$nombre_archivo_new2;
	
		if($correcto ==1) {resize($ubicacion, $width2, $height2, $ubicacion1);}
	}
}
$resp[0]='Se ha incorporado la imagen correctamente';
$resp[1]=$nombre_archivo_new;
//echo 'devuelve:'.$resp[0].' - '.$resp[1].'<br>';
return $resp;
}
//---------------------------- upload del archivo ------------
function upload($nombre_archivo,$ubicacion,$width,$height,$ext) 
{ 	
//echo "funcion upload<br>datos de upload:".$nombre_archivo."<br> posicion:".$ubicacion."<br> ancho :".$width."<br> alto: ".$height."<br> ext: ".$ext."<br>";
	if(!(move_uploaded_file($nombre_archivo,$ubicacion))) 
		return 0;
	if ($ext != ".swf")
		//resize($ubicacion, $width, $height, $ubicacion);
	chmod($ubicacion,0777);
	return 1;
}
//----------------------------- redimension--------------------
function resize($img, $thumb_width, $thumb_height, $newfilename) { 
//echo "funcion resize:<br>datos de redimesion:".$img."<br> thumbnail:".$newfilename."<br> ancho :".$thumb_width."<br> alto: ".$thumb_height."<br>";
	$max_width=$thumb_width;
    list($width_orig, $height_orig, $image_type) = getimagesize($img);
    switch ($image_type) 
    {
        case 1: $im = @imagecreatefromgif($img); break;
        case 2: $im = @imagecreatefromjpeg($img);  break;
        case 3: $im = @imagecreatefrompng($img); break;
        default:  $im = ""; break;
    }
    $newImg = imagecreatetruecolor($thumb_width, $thumb_height);
    if(($image_type == 1) OR ($image_type==3))
    {
        imagealphablending($newImg, false);
        imagesavealpha($newImg,true);
        $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
        imagefilledrectangle($newImg, 0, 0, $thumb_width, $thumb_height, $transparent);
    }
    @imagecopyresampled($newImg, $im, 0, 0, 0, 0, $thumb_width, $thumb_height, $width_orig, $height_orig);
    switch ($image_type) 
    {
        case 1: imagegif($newImg,$newfilename); break;
        case 2: imagejpeg($newImg,$newfilename);  break;
        case 3: imagepng($newImg,$newfilename); break;
        default:  $newfilename = ""; break;
	}
    return $newfilename;
}
//------------------eliminar archivos----------------------------
function eliminar_archivos($archivo_new,$ext_new,$ubicacion) 
{ 
	$dir=opendir(strtolower($ubicacion).'/'); 
	while ($file=readdir($dir)){ 
		$auxiliar = explode(".", $file);
		$ext = ".".$auxiliar[1];
		if($auxiliar[0] == $archivo_new && $ext != $ext_new) {
			unlink($ubicacion."/".$archivo_new.$ext);
		}
	}
	return 1;
}
//-----------------extension del archivo------------------------
function obtener_extension($nombre_archivo) 
{	//echo 'funcion obtener_extension: <br>recibe:'.$nombre_archivo;
	$image_type = 2;
	switch ($image_type) 
	{
		case 1: $ext = ".gif"; break; 
		case 2: $ext = ".jpg";  break;
		case 3: $ext = ".png"; break;
		case 13: $ext = ".swf"; break;
		default:  $ext = "error"; break; //TIPO DE ARCHIVO NO ACEPTADO POR LA FUNCION
	}
	return $ext;
}

?>