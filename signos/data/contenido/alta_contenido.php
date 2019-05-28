<?
	session_start();
	if (!isset($_SESSION['activo'])) {
		session_destroy();
		header('refresh:0; url=index.php');
		exit();
	}

$tipo=saneaVar($_GET['tipo']); 
$borrar=saneaVar($_GET['borrar']); 
$enviar=saneaVar($_POST["Enviar"]); 

if ($enviar=="Guardar" ){

include('conexion.php');

include("data/funciones/nimagenB.php");

$contenido.=$_POST['t0'].'~';
$contenido.=$_POST['t1'].'~';
$contenido.=$_POST['t2'].'~';
$contenido.=$_POST['t3'].'~';

$idx=saneaVar($_POST['idx']); 


if(strlen($HTTP_POST_FILES['img_1']['tmp_name'])>0){
	
	$img_1=$HTTP_POST_FILES['img_1']['tmp_name'];

		$datos =  getimagesize($img_1); 
		if($datos[2]==1){$n=1;} 
		if($datos[2]==2){$n=1;} 
		if($datos[2]==3){$n=1;} 

		if($n==1){
			$carpeta1="../imagenes/";
 			$nombre="1_".time('m:s');
			$ancho=$datos[0];
			$alto=$datos[1];
			$respuesta=subir_imagen($img_1,$carpeta1,$nombre,$ancho,$alto,'textos');
			$mensaje=$respuesta[0];
			$img_1="../imagenes/".$respuesta[1];

	}

	@unlink($_POST['img_1']);


} else {	
	$img_1=$_POST['img_1'];

}


if(strlen($HTTP_POST_FILES['img_2']['tmp_name'])>0){
	
	$img_2=$HTTP_POST_FILES['img_2']['tmp_name'];

		$datos =  getimagesize($img_2); 
		if($datos[2]==1){$n=1;} 
		if($datos[2]==2){$n=1;} 
		if($datos[2]==3){$n=1;} 

		if($n==1){
			$carpeta1="../imagenes/";
 			$nombre2="2_".time('m:s');
			$ancho=$datos[0];
			$alto=$datos[1];
			$respuesta=subir_imagen($img_2,$carpeta1,$nombre2,$ancho,$alto,'textos');
			$mensaje=$respuesta[0];
			$img_2="../imagenes/".$respuesta[1];

	}

	@unlink($_POST['img_2']);

	
} else {	
	$img_2=$_POST['img_2'];

}


$sql=@mysql_query("update contenido set contenido='".$contenido."',img_1='".$img_1."',img_2='".$img_2."',tipo='".$tipo."' where idx='".$idx."'",$conecta);


$mensaje= '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha realizado el cambio con exito!</p></div>';				 
			
}

if($borrar=='img_1'){ 
include('conexion.php');
@unlink($_GET['img_2']);
$idx=saneaVar($_GET['idx']); 
$sql=@mysql_query('update contenido set img_1="" where idx='.$idx,$conecta);	
$mensaje='<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha eliminado la foto con exito!</p></div>';
}

if($borrar=='img_2'){ 
include('conexion.php');
@unlink($_GET['img_2']);
$idx=saneaVar($_GET['idx']); 
$sql=@mysql_query('update contenido set img_2="" where idx='.$idx,$conecta);	
$mensaje='<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha eliminado la foto con exito!</p></div>';
}

?>


<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("a.imagen").colorbox();
        
    });
</script>

<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() }); </script>


        <ul class="breadcrumbs">
            <li><a href="menu.php?accion=5A&tipo=<? echo $tipo;?>"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="menu.php?accion=5A&tipo=<? echo $tipo;?>">Contenido <? echo $tipo;?></a> <span class="separator"></span></li>
            <li>Administrar</li>
        </ul>
        
        <div class="pageheader">
	        <div class="pageicon"><span class="iconfa-book"></span></div>
            <div class="pagetitle">
                <h5>Contenido</h5>
                <h1><? echo $tipo;?></h1>
            </div>
        </div>
        
        <div class="maincontent">
            <div class="maincontentinner">
            
            <? echo $mensaje; ?>
           
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Administrar <? echo $tipo;?></h4>
                <div class="widgetcontent nopadding">
                 <form action="<? $PHP_SELF ?>"  method="post" enctype="multipart/form-data" class="stdform stdform2" >
                 
				<?
                include('conexion.php');
                $sql=@mysql_query('select * from contenido where tipo="'.$tipo.'"',$conecta);
                $registro=@mysql_fetch_assoc($sql);
                $t=@explode('~',$registro['contenido']);
                $idx=$registro['idx'];
				$img_1=$registro['img_1'];
				$img_2=$registro['img_2'];
                ?>                 
                    
                 <input name="idx" id="idx" type="hidden"  value="<? echo $idx;?>"/>
                                                
                            <p>
                                <label style="font-weight:normal;">Titulo Espa&ntilde;ol </label>
                                <span class="field"><input name="t0" id="t0" type="text" class="input-xxlarge" value="<? echo $t[0];?>"/></span>
                            </p>

                            <p>
                                <label style="font-weight:normal;">Contenido Espa&ntilde;ol</label>
                                <span class="field"><textarea cols="80" rows="5" name="t1" id="t1" class="span6"><? echo $t[1];?></textarea></span>
                            </p>
                            

                            <p>
                                <label style="font-weight:normal;">Titulo Ingles</label>
                                <span class="field"><input name="t2" id="t2" type="text" class="input-xxlarge" value="<? echo $t[2];?>"/></span>
                            </p>
                            
                            <p>
                                <label style="font-weight:normal;">Contenido Ingles</label>
                                <span class="field"><textarea cols="80" rows="5" name="t3" id="t3" class="span6"><? echo $t[3];?></textarea></span>
                            </p>


			<div class="par">

	   		<input type="hidden" name="img_1" id="img_1" value="<? echo $img_1;?>" />

			    <label>Imagen 1</label>
				<small class="desc">Peso maximo: 500kb</small>
			    <div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
				<div class="uneditable-input span3">
				<i class="iconfa-file fileupload-exists"></i>
				<span class="fileupload-preview"></span>
				</div>
				<span class="btn btn-file"><span class="fileupload-new">Ingresar</span>
				<span class="fileupload-exists">Cambiar</span>
				<input type="file" name="img_1" id="img_1"/></span>
				<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Eliminar</a>
				</div>
                <? if(is_file($img_1)){?>
                 
                <a href="menu.php?accion=5A&borrar=img_1&idx=<? echo $idx;?>&img_1=<? echo $img_1;?>&tipo=<? echo $tipo;?>" title="Eliminar">
                <span class="iconsweets-trashcan" style="height:28px; margin:0 5px;"></span>
                </a>

                <a href="<? echo $img_1;?>" class="imagen" title="Ampliar">
                <span class="iconsweets-camera" style="height:28px; margin:0 5px;"></span>
                </a>

                 <? } ?>
			    </div>
			</div>


			<? if ($tipo!='Clientes' AND $tipo!='Ingenieria'){?>
			<div class="par">

	   		<input type="hidden" name="img_2" id="img_2" value="<? echo $img_2;?>" />

			    <label>Imagen 2</label>
				<small class="desc">Peso maximo: 500kb</small>
			    <div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
				<div class="uneditable-input span3">
				<i class="iconfa-file fileupload-exists"></i>
				<span class="fileupload-preview"></span>
				</div>
				<span class="btn btn-file"><span class="fileupload-new">Ingresar</span>
				<span class="fileupload-exists">Cambiar</span>
				<input type="file" name="img_2" id="img_2"/></span>
				<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Eliminar</a>
				</div>
                <? if(is_file($img_2)){?>
                 
                <a href="menu.php?accion=5A&borrar=img_2&idx=<? echo $idx;?>&img_2=<? echo $img_2;?>&tipo=<? echo $tipo;?>" title="Eliminar">
                <span class="iconsweets-trashcan" style="height:28px; margin:0 5px;"></span>
                </a>

                <a href="<? echo $img_2;?>" class="imagen" title="Ampliar">
                <span class="iconsweets-camera" style="height:28px; margin:0 5px;"></span>
                </a>

                 <? } ?>
			    </div>
			</div>
            <? } ?>
            
            
                    <p class="stdformbutton">
                    <input class="btn btn-primary" type="submit" id="Enviar" name="Enviar" value="Guardar" style="border:0; height:32px;"/>
                   </p>

                    </form>
                </div>
            </div>
            
            
            </div>
        </div>
