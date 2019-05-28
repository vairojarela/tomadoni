<? session_start();	if (!isset($_SESSION['activo'])) { session_destroy(); header('refresh:0; url=index.php'); exit(); }

include('conexion.php');


$tipo=$_GET['tipo'];

if ($tipo=='Principal'){
$ancho_banner=1140;
$alto_banner=450;
}

if ($tipo=='Clientes'){
$ancho_banner=150;
$alto_banner=46;
}

if ($tipo=='Trabajos'){
$ancho_banner=640;
$alto_banner=480;
}


if ($_POST["Limpiar"]=="Limpiar" ){
	$mensaje='';
	$_GET['eli_news']='';
	$_GET['nro']='';
}

foreach($_POST as $btn){
	if ($btn=="Modificar" ){
	//echo 'Boton: '.$btn.'<br>';
		$nro_img=mysql_real_escape_string(saneaVar($_POST['nro_foto']));
		$orden=mysql_real_escape_string(saneaVar($_POST['orden_'.$nro_img]));
		$url=$_POST['url_'.$nro_img];
		$contenido .=$_POST['titulo_'.$nro_img].'~';
		$contenido .=$_POST['contenido_'.$nro_img].'~';
		
		$sql_up='update banner set orden="'.$orden.'",url="'.$url.'",tipo="'.$tipo.'",contenido="'.$contenido.'" where idx='.$nro_img;	
		//echo $sql_up.'<br>';			
		$img_up=@mysql_query($sql_up,$conecta);
		if (!@mysql_errno()){
		$mensaje= '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha realizado el cambio con exito!</p></div>';				
		}
		
		$_GET['eli_news']='';
		$_GET['dest_img']='';
		$_GET['nro']='';
	}
}
if ($_POST["Enviar"]=="Guardar" ){
	$_GET['eli_news']='';$mensaje=''; $_GET['nro']='';$ancho=0;$alto=0;
	$pesop=$HTTP_POST_FILES['img_p']['size'];
	if($pesop<2048000 AND strlen($HTTP_POST_FILES['img_p']['tmp_name'])>0){
		$imgp=$HTTP_POST_FILES['img_p']['tmp_name'];
		$datos = @getimagesize($imgp);
		if($datos[0]==$ancho_banner){$ancho=$ancho_banner;$error_ancho='';}else{$ancho=0;$error_ancho='La Imagen no tiene el ancho indicado';}
		if($datos[1]==$alto_banner){$alto=$alto_banner;$error_alto='';} else{$alto=0;$error_alto='La Imagen no tiene el alto indicado';}
		if($ancho>0 AND $alto>0){
			include("data/funciones/nimagenB.php");
			$carpeta='../imagenes/banner';
			$donde_lo_guarda=$carpeta; 
			$archivo_a_subir=$imgp; 
			if($datos[2]>=1 AND $datos[2]<=3){
				switch($datos[2]){
					case 1:
						$arch_ext='.gif';
						break;
					case 2:
						$arch_ext='.jpg';
						break;
					case 3:
						$arch_ext='.png';
						break;
				}
				$dir=@opendir(strtolower('../imagenes/banner')); 
				while ($file=@readdir($dir)){ 
					if($file!='.' AND $file!='..') {
						$nro_news+=1;
					}
				}
				$nombre2=($nro_news +1).'-'.time('m:s');
			} 
			$x=subir_imagen($archivo_a_subir,$carpeta.'/',$nombre2,$ancho,$alto,'producto');			
			$imagen_banner=$carpeta.'/'.$nombre2.$arch_ext;
			$sql_banner='select * from banner';
			$img_up=@mysql_query($sql_banner,$conecta);
			$nro_banner=@mysql_num_rows($img_up);
			
			$datos_banner="('".$imagen_banner."','".($nro_banner + 1)."','".$tipo."','si')";
			$campos="(imagen,orden,tipo,estado)";
			$sql_up="insert into banner ". $campos ." values ".$datos_banner;
//			echo $sql_up.'<br>';
			$img_up=@mysql_query($sql_up,$conecta);
			if (!@mysql_errno()){
			$mensaje= '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4>
			<p style="margin: 8px 0">Se ha ingresado el registro con exito!</p></div>';				
			}else{
				$mensaje='<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4>
				<p style="margin: 8px 0">No se ha realizado el registro</p></div>';
			}
		}else{
		$mensaje='<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4>
				<p style="margin: 8px 0">'.$error_ancho.'.'.$error_alto.'</p></div>';
		}
	}else{
		$mensaje='<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4>
				<p style="margin: 8px 0">El tamaño de la imagen supera el valor permitido (2MB)</p></div>';
	}
}

	if($_GET['eli_news']=='si'){
		@unlink($_GET['news']);
		$nro_img=@mysql_real_escape_string(saneaVar($_GET['nro']));
		$sql_up='delete from banner where idx='.$nro_img;				
		$img_up=mysql_query($sql_up,$conecta);
		if (!mysql_errno()){
			$mensaje= '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha eliminado el registro con exito!</p></div>';				
		}
	}

	if($_GET['act_banner']=='si'){
		$nro_img=@mysql_real_escape_string(saneaVar($_GET['nro']));
		$estado=@mysql_real_escape_string(saneaVar($_GET['estado']));
		$sql_up='update banner set estado ="'.$estado.'" where idx='.$nro_img;				
		$img_up=mysql_query($sql_up,$conecta);
		if (!mysql_errno()){
			$mensaje= '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha modificado el registro con exito!</p></div>';				
		}
	}

?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("a.imagen").colorbox();
    });
</script>
        <ul class="breadcrumbs">
            <li><a href="menu.php?accion=2A&tipo=<? echo $tipo;?>"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="menu.php?accion=2A&tipo=<? echo $tipo;?>">Banner</a> <span class="separator"></span></li>
            <li>Home</li>
        </ul>
        
        <div class="pageheader">
	        <div class="pageicon"><span class="iconfa-picture"></span></div>
            <div class="pagetitle">
                <h5>Banner</h5>
                <h1>Home</h1>
            </div>
        </div>
        
        <div class="maincontent">
            <div class="maincontentinner">
            
            <div class="alert alert"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Atenci&oacute;n</h4><p style="margin: 8px 0">Tama&ntilde;o recomendado <? echo $ancho_banner;?>px por <? echo $alto_banner;?>px</p></div>
            
            <?php echo $mensaje; ?>
            <form action="<? $PHP_SELF ?>"  method="post" enctype="multipart/form-data">
            <input type="hidden" name="nro_foto" id="nro_foto" />
            <div class="mediamgr">
            	<div class="mediamgr_left">
                	<div class="mediamgr_head">
                    	<ul class="mediamgr_menu">
                        
                        <div id="banner_home">
                        <li>
                        <div class="par">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="input-append">
                        <div class="uneditable-input span3">
                        <i class="iconfa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                        </div>
                        <span class="btn btn-file"><span class="fileupload-new">Ingresar</span>
                        <span class="fileupload-exists">Cambiar</span>
                        <input type="file" name="img_p"  id="img_p" />
                        </span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Eliminar</a>
                        </div>
                        </div>
                        </div>
                        </li>
                        </div>
                       
                        
                        <div id="orden_banner" style="display:none;">
                        <li>
                        <input name="orden" type="text" id="orden" value="" onclick="this.value='';this.style.color='#000';" style="width:20px;" title="Posición en el Banner" />
                        <input name="url" type="text" id="url" value="" onclick="this.value='';this.style.color='#000';" style="width:400px;"title="URL de destino. Ej: http://www.midominio.com.ar/...."/>
                        </li>                        
                        </div>

                         <li class="left newfilebtn">
                         <input class="btn btn-primary" type="submit" id="Enviar"  name="Enviar" value="Guardar" style="border:0; margin:0 0 10px 10px; height:32px;" />
                         <a id="Limpiar" href="menu.php?accion=2A&tipo=<? echo $tipo;?>" class="btn" style="margin:0 0 10px 10px;">Limpiar</a>
						 </li>
                         
                         
                        </ul>
                        
                        <!-- Lsiado de imagenes del banner-->
                        <? 
						$pagina=mysql_real_escape_string(saneaVar($_GET['pagina']));
                        $paginar=30;
                        $sql_sp='select * from banner where tipo = "'.$tipo.'" order by orden ASC LIMIT '.$pagina * $paginar.','.$paginar.';';
						//echo 'cadena: '.$sql_sp.'<br>';
                        $reg_sponsor=@mysql_query($sql_sp,$conecta);
                        $reg_disp=@mysql_num_rows(mysql_query('select * from banner',$conecta));
					    ?>
                                                    
                				<h4 class="widgettitle">Listado de im&aacute;genes del banner</h4>
								<? if ($reg_disp>0){?>
                                <table class="table table-bordered responsive" style="background:#fff;">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Datos</th>
                                            <th width="60">Estado</th>
                                            <th width="60">Eliminar</th>
                                            <th width="60">Modificar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <? 
									$cant_banner ='';
                                    while ($dat_banner=@mysql_fetch_assoc($reg_sponsor)){                         
										
										$orden=$dat_banner['orden'];
										$url=$dat_banner['url'];
										$imga=$dat_banner['imagen'];
										$nro_i=$dat_banner['idx'];
										$estado=$dat_banner['estado'];
										$c=explode('~',$dat_banner['contenido']);
										
										$cant_banner .=$nro_i.'~';
										
										if($estado=='si'){
											$img_estado='<a href="menu.php?accion=2A&act_banner=si&estado=no&nro='.$nro_i.'&tipo='.$tipo.'"><span class="icon-ok" onclick="editar_foto('.$nro_i.');" title="Desactivar"></span></a>';
										}else{
											$img_estado='<a href="menu.php?accion=2A&act_banner=si&estado=si&nro='.$nro_i.'&tipo='.$tipo.'"><span class="icon-remove" onclick="editar_foto('.$nro_i.');" title="Activar"></span></a>';
										}
										
										echo '<tr>';
										
										echo '<td align="center" width="150">';
											echo '<a href="'.$imga.'" class="imagen" title="Ver Imagen">';
											echo '<img src="'.$imga.'" id="img_'.$nro_i.'" height="46" name="img_'.$nro_i.'" style="cursor:pointer"/>';
											echo '</a>';
										echo '</td>';
										

										
										echo '<td>';
										
										if ($tipo=='Trabajos'){

										echo '<div style=visibility:hidden;>';
										echo '<span style="width:60px; height:30px; float:left; line-height:30px;">Enlace:</span> <input type="text" name="url_'.$nro_i.'" id="url_'.$nro_i.'"  value="'.$url.'" style="width:400px;"  readonly="readonly" onmouseover="cursor('.$nro_i.');" onclick="editar_foto('.$nro_i.');" ><br>';
										echo '</div>';
										
										} else {

										echo '<span style="width:60px; height:30px; float:left; line-height:30px;">Enlace:</span> <input type="text" name="url_'.$nro_i.'" id="url_'.$nro_i.'"  value="'.$url.'" style="width:400px;"  readonly="readonly" onmouseover="cursor('.$nro_i.');" onclick="editar_foto('.$nro_i.');" ><br>';

										
										}

										echo '<span style="width:60px; height:30px; float:left; line-height:30px;">Orden:</span> <input type="text" name="orden_'.$nro_i.'" id="orden_'.$nro_i.'" value="'.$orden.'" style="width:20px;" readonly="readonly" onmouseover="cursor('.$nro_i.');" onclick="editar_foto('.$nro_i.');" ><br>';
																				
										if ($tipo=='news' OR $tipo=='works'){$trae='<div>';} else {$trae='<div style=visibility:hidden;>';}
										
										echo $trae;
										
										echo '<span style="width:60px; height:30px; float:left; line-height:30px;">Titulo:</span> <input type="text" name="titulo_'.$nro_i.'" id="titulo_'.$nro_i.'"  value="'.$c[0].'" style="width:400px;"  readonly="readonly" onmouseover="cursor('.$nro_i.');" onclick="editar_foto('.$nro_i.');" ><br>';
										
										echo '<span style="width:60px; height:30px; float:left; line-height:30px;">Subtitulo:</span> <input type="text" name="contenido_'.$nro_i.'" id="contenido_'.$nro_i.'"  value="'.$c[1].'" style="width:400px;"  readonly="readonly" onmouseover="cursor('.$nro_i.');" onclick="editar_foto('.$nro_i.');" ><br>';
										
										echo '</div>';


																				
										echo '</td>';
										
										echo '<td>';
											echo '<div align="center">';
											echo '<span class="filename">';
											echo $img_estado;
											echo '</span>';
											echo '</div>';
										echo '</td>';

										echo '<td>';
											echo '<div align="center">';
											echo '<span class="filename">';
											echo '<a href="menu.php?accion=2A&eli_news=si&news='.$imga.'&nro='.$nro_i.'&tipo='.$tipo.'" title="Eliminar">';
											echo '<span class="icon-trash"></span></a></span>';
											echo '</div>';
										echo '</td>';
										
										echo '<td>';
											echo '<div id="edit_'.$nro_i.'" align="center">';
											echo '<span class="filename" title="Editar">';
											echo '<span class="icon-pencil" onclick="editar_foto('.$nro_i.');" style="cursor:pointer"></span>';
											echo '</span>';
											echo '</div>';
											
											echo '<div align="center">';
											echo '<input type="submit" id="Modificar_'.$nro_i.'"  name="Modificar_'.$nro_i.'" value="" style="background-image:url(images/icons/guardar.png) ; background-color:#fff; font-size:0px; border:0; margin:0px; padding:0px; display:none; width:14px; height:14px;" title="Guardar Cambios"/>';
											echo '</div>';

										echo '</td>';
										
										echo '</tr>';
									}
									?>
                                    
                        			</tbody>
                                 </table>
                                 <? } ?>
                                 <input name="tot_banner" id="tot_banner" type="hidden" value="<? echo $cant_banner;?>" />
                        <!-- Lsiado de imagenes del banner-->
                        
                        <span class="clearall"></span>
                    </div>
                </div>
                


            </div>
            </form>
            
          </div>     
     </div>


<script language="javascript" type="text/javascript">
function cursor(nro){
	document.getElementById('orden_'+nro).style.cursor='pointer';
	document.getElementById('url_'+nro).style.cursor='pointer';
	document.getElementById('titulo_'+nro).style.cursor='pointer';
	document.getElementById('contenido_'+nro).style.cursor='pointer';
}
function editar_foto(nro){
	//alert(nro)
	document.getElementById('nro_foto').value=nro;
	document.getElementById('Enviar').style.display='none';
	document.getElementById('Limpiar').style.display='none';

	document.getElementById('Limpiar').style.display='none';
	document.getElementById('Modificar_'+nro).style.display='';
	document.getElementById('Modificar_'+nro).value='Modificar';
	document.getElementById('edit_'+nro).style.display='none';
//	document.getElementById('orden_banner').style.display='';
	document.getElementById('banner_home').style.display='none';
	document.getElementById('orden_'+nro).readOnly='';
	document.getElementById('url_'+nro).readOnly='';
	document.getElementById('titulo_'+nro).readOnly='';
	document.getElementById('contenido_'+nro).readOnly='';
	//document.getElementById('orden_'+nro).focus();
	
	bnr_d=document.getElementById('tot_banner').value.split('~');
	//alert(nro + ' - ' + bnr_d[x]);
		for(x=0;x<bnr_d.length;x++){
		if(nro!=bnr_d[x]){
			document.getElementById('orden_'+bnr_d[x]).readOnly='readonly';
			document.getElementById('url_'+bnr_d[x]).readOnly='readonly';	
			document.getElementById('titulo_'+bnr_d[x]).readOnly='readonly';
			document.getElementById('contenido_'+bnr_d[x]).readOnly='readonly';		
			document.getElementById('Modificar_'+bnr_d[x]).style.display='none';
			document.getElementById('edit_'+bnr_d[x]).style.display='';
		}
	}
	
	document.getElementById('nro_foto').value=nro;
		

//	document.getElementById('f1').src=document.getElementById('img_'+nro).src;
	


}
</script>