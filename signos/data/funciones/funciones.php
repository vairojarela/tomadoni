<?php

//----------ALTA PRODUCTO----------//

function alta_producto($nombre,$datos){
include("conexion.php");
$campos="(categoria,nombre,descripcion,precio,estado,destacado,oferta,nuevo,talles,colores,carpeta)";
$sql_str="insert into productos ". $campos ." values ".$datos;
$resultado=@mysql_query($sql_str,$conecta);
if (!mysql_errno()){
$mensaje='<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha ingresado el registro con exito!</p></div>';
}else{
$mensaje='<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">No se ha realizado el registro</p></div>';				
}
@mysql_close($conecta);
return $mensaje;
}


//----------ELIMINAR PRODUCTO----------//

function borrar($codigo){
	if($codigo<>""){
		$formulario=1;
		include("conexion.php");
		$sql_str="delete from productos where nro_prod=".$codigo;
		$resultado=@mysql_query($sql_str,$conecta);
		if (!mysql_errno() ){
			$resp=0;
		}else{
			$resp=1;
		}
		@mysql_close($conecta);
	}
	return $mesaje;
}

//----------MODIFICAR PRODUCTO----------//


function modificar_producto($nro,$categoria,$nombre,$descripcion,$precio,$destacado,$oferta,$nuevo,$talles,$colores){
	include("conexion.php");
	$sql_str="update productos set categoria='".$categoria."',nombre='".$nombre."',descripcion='".$descripcion."',precio='".$precio."',destacado='".$destacado."',oferta='".$oferta."',nuevo='".$nuevo."',talles='".$talles."',colores='".$colores."' where nro_prod=".$nro; 
	$resultado=@mysql_query($sql_str,$conecta);
	if (@mysql_errno() ){
		$val=1;
	}else{
		$val=0;
	}
	@mysql_close($conecta);
	return $val;

}


//----------ACTIVAR PRODUCTO----------//

function activar_destacado($nro,$destacado){
	include("conexion.php");
	$sql_str="update productos set destacado='".$destacado."' where nro_prod=".$nro;
	$resultado=@mysql_query($sql_str,$conecta);
	if (@mysql_errno() ){
		$val=1;
	}else{
		$val=0;
	}
	@mysql_close($conecta);
	return $val;
}

function activar_oferta($nro,$oferta){
	include("conexion.php");
	$sql_str="update productos set oferta='".$oferta."' where nro_prod=".$nro;
	$resultado=@mysql_query($sql_str,$conecta);
	if (@mysql_errno() ){
		$val=1;
	}else{
		$val=0;
	}
	@mysql_close($conecta);
	return $val;
}

function activar_nuevo($nro,$nuevo){
	include("conexion.php");
	$sql_str="update productos set nuevo='".$nuevo."' where nro_prod=".$nro;
	$resultado=@mysql_query($sql_str,$conecta);
	if (@mysql_errno() ){
		$val=1;
	}else{
		$val=0;
	}
	@mysql_close($conecta);
	return $val;
}


function activar_estado($nro,$estado){
	include("conexion.php");
	$sql_str="update productos set estado='".$estado."' where nro_prod=".$nro;
	$resultado=@mysql_query($sql_str,$conecta);
	if (@mysql_errno() ){
		$val=1;
	}else{
		$val=0;
	}
	@mysql_close($conecta);
	return $val;
}

//----------MODIFICAR PRECIO----------//
function cambiar_precio($nro,$precio){
	if($nro<>""){
		include("conexion.php");
		$sql_str="update productos set precio='".$precio."' where nro_prod=".$nro;	
		$resultado=@mysql_query($sql_str,$conecta);
		if (@mysql_errno() ){
			$val=1;
		}else{
			$val=0;
		}
		@mysql_close($conecta);
		return $val;
	}
}

function cambiar_precio_2($nro,$precio2){
	if($nro<>""){
		include("conexion.php");
		$sql_str="update productos set precio2='".$precio2."' where nro_prod=".$nro;	
		$resultado=@mysql_query($sql_str,$conecta);
		if (@mysql_errno() ){
			$val=1;
		}else{
			$val=0;
		}
		@mysql_close($conecta);
		return $val;
	}
}

?>