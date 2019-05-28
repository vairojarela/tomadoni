<?
function saneaVar($dato){ 
	$testSql=quitarSQL($dato);
	$testTags=removerTags($testSql);
	$textVar=limpiarVariables($testTags); 
	$limpio=$textVar;
	return $limpio;
}

//-------------------- funciones de limpieza de variables---------------------------------//

function quitarSQL($entrada)
{
	if(preg_match('/UNION/',$entrada)){
		$entrada=explode('UNION',$entrada);
		$salida=rtrim(($entrada[0]));
	}elseif(preg_match('/union/',$entrada)){
		$entrada=explode('union',$entrada);
		$salida=rtrim(($entrada[0]));
	}else{
		$entrada = str_ireplace("WHERE","",$entrada);
		$entrada = str_ireplace("INSERT","",$entrada);
		$entrada = str_ireplace("UPDATE","",$entrada);
		$entrada = str_ireplace("SELECT","",$entrada);
		$entrada = str_ireplace("COPY","",$entrada);
		$entrada = str_ireplace("DELETE","",$entrada);
		$entrada = str_ireplace("DROP","",$entrada);
		$entrada = str_ireplace("DUMP","",$entrada);
		$entrada = str_ireplace("FROM","",$entrada);
		$entrada = str_ireplace(" OR ","",$entrada);
		$entrada = str_ireplace(" AND ","",$entrada);
		$entrada = str_ireplace("%","",$entrada);
		$entrada = str_ireplace("LIKE","",$entrada);
		$entrada = str_ireplace("--","",$entrada);
		$entrada = str_ireplace("^","",$entrada);
		$entrada = str_ireplace("[","",$entrada);
		$entrada = str_ireplace("]","",$entrada);
		$entrada = str_ireplace("\\","",$entrada);
		$entrada = str_ireplace("!","",$entrada);
		$entrada = str_ireplace("¡","",$entrada);
		$entrada = str_ireplace("?","",$entrada);
		$entrada = str_ireplace("=","",$entrada);
		$entrada = str_ireplace("&","",$entrada);
		$entrada = str_ireplace(">","",$entrada);
		$entrada = str_ireplace("<","",$entrada);
		$entrada = str_ireplace("*","",$entrada);
		$salida=($entrada);
	}
	return $salida;
}

function removerTags($entrada) {
//	echo 'removerTags recibe:'.$entrada.'<br>';
	$busqueda=@array(
	'@<script[^>]*?>.*?</script>@si', // javascript
	'@<[\/\!]*?[^<>]*?>@si', // HTML 
	'@<style[^>]*?>.*?</style>@siU', // Css
	'@<![\s\S]*?--[ \t\n\r]*>@' // Comentarios multiples
	);
	
	$salida=str_replace($busqueda, '', $entrada);
	
//	echo 'removerTags devulve:'.$salida.'<br>';
	return $salida;
}

function limpiarVariables($entrada) {
//	echo 'limpiarVariables recibe:'.$entrada.'<br>';
	 if (@is_array($entrada)) {
		 foreach($entrada as $var=>$val) {
			$output[$var] = limpiarVariables($val);
		 }
	 } else {
		 if (@get_magic_quotes_gpc()) {
			$entrada=@stripslashes($entrada);
		 }
		 $salida= removerTags($entrada);
	 }
//	echo 'limpiarVariables devulve:'.$salida.'<br>';
	 return $salida;
 }
 
?>
