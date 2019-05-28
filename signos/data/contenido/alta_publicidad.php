<?
	session_start();
	if (!isset($_SESSION['activo'])) {
		session_destroy();
		header('refresh:0; url=index.php');
		exit();
	}


include('conexion.php');

$tipo=saneaVar($_GET["tipo"]);
$modificar=saneaVar($_GET["modificar"]);
$enviar=saneaVar($_POST["Enviar"]);
$borrar=saneaVar($_GET["borrar"]);
$eliminar_anuncio=saneaVar($_GET["eliminar_anuncio"]);
$dato=saneaVar($_GET["dato"]);


if ($enviar=="Modificar" ){

include("data/funciones/nimagenB.php");

if(strlen($HTTP_POST_FILES['img_1']['tmp_name'])>0 AND (ereg('.pdf',$HTTP_POST_FILES['img_1']['name']) OR ereg('.jpg',$HTTP_POST_FILES['img_1']['name'])) AND $HTTP_POST_FILES['img_1']['size']<500000){
	$img_1 = '../imagenes/publicidad/'.time('m:s').'_'.$HTTP_POST_FILES['img_1']['name'];
	@move_uploaded_file($HTTP_POST_FILES['img_1']['tmp_name'], $img_1);
	@unlink($_POST['img_1']);

} else {
	
	$img_1=$_POST['img_1'];
	
}


if(strlen($HTTP_POST_FILES['img_2']['tmp_name'])>0 AND (ereg('.pdf',$HTTP_POST_FILES['img_2']['name']) OR  ereg('.jpg',$HTTP_POST_FILES['img_2']['name'])) AND $HTTP_POST_FILES['img_2']['size']<500000){
	$img_2 = '../imagenes/publicidad/'.time('m:s').'_'.$HTTP_POST_FILES['img_2']['name'];
	@move_uploaded_file($HTTP_POST_FILES['img_2']['tmp_name'], $img_2);
	@unlink($_POST['img_2']);

} else {
	
	$img_2=$_POST['img_2'];
	
}
		
$contenido.=$_POST['t0'].'~';
$contenido.=$_POST['t1'].'~';
$orden=$_POST['orden'];


$sql="update publicidad set contenido='".$contenido."',img_1='".$img_1."',img_2='".$img_2."',tipo='".$tipo."',orden='".$orden."' where idx='".$_POST['idx']."'"; 
			
$resultado=@mysql_query($sql,$conecta);
@mysql_close($conecta);

$mensaje= '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha realizado el cambio con exito!</p></div>';				

}

if ($enviar=="Guardar" ){
	
$contenido.=$_POST['t0'].'~';
$contenido.=$_POST['t1'].'~';
$orden=$_POST['orden'];

if (strlen($contenido)>0){

if(strlen($HTTP_POST_FILES['img_1']['tmp_name'])>0 AND (ereg('.pdf',$HTTP_POST_FILES['img_1']['name']) OR ereg('.jpg',$HTTP_POST_FILES['img_1']['name']))  AND $HTTP_POST_FILES['img_1']['size']<500000){
	$img_1 = '../imagenes/publicidad/'.time('m:s').'_'.$HTTP_POST_FILES['img_1']['name'];
	@move_uploaded_file($HTTP_POST_FILES['img_1']['tmp_name'], $img_1); 
}

if(strlen($HTTP_POST_FILES['img_2']['tmp_name'])>0 AND (ereg('.pdf',$HTTP_POST_FILES['img_2']['name']) OR ereg('.jpg',$HTTP_POST_FILES['img_2']['name'])) AND $HTTP_POST_FILES['img_2']['size']<500000){
	$img_2 = '../imagenes/publicidad/'.time('m:s').'_'.$HTTP_POST_FILES['img_2']['name'];
	@move_uploaded_file($HTTP_POST_FILES['img_2']['tmp_name'], $img_2);
	@unlink($_POST['img_2']);
}

include("data/funciones/nimagenB.php");
	

$campos="(contenido,img_1,img_2,tipo,orden)";
$datos="('".$contenido."','".$img_1."','".$img_2."','".$tipo."','".$orden."')";

$sql="insert into publicidad ".$campos." values ".$datos;

$resultado=@mysql_query($sql,$conecta);
@mysql_close($conecta);


$mensaje= '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha realizado el registro con exito!</p></div>';				

	} else {
		
		$mensaje= '<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Cambos requeridos: Titulo*</p></div>';				

		
		}
}

if($borrar=='img_1'){ 
@unlink($_GET['img_1']);
$dato=$_GET['dato'];
$sql='update publicidad set img_1="" where idx='.$dato;	
$resultado=mysql_query($sql,$conecta);
$mensaje='<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">se ha eliminado con exito!</p></div>';
}

if($borrar=='img_2'){ 
@unlink($_GET['img_2']);
$dato=$_GET['dato'];
$sql='update publicidad set img_2="" where idx='.$dato;	
$resultado=@mysql_query($sql,$conecta);
$mensaje='<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha eliminado con exito!</p></div>';
}


if($eliminar_anuncio=='ok'){
	@unlink($_GET['img_1']);
	@unlink($_GET['img_2']);
	$dato=$_GET['dato'];
	$str_cli="delete from publicidad where idx=".$dato;
	$l_cli=@mysql_query($str_cli,$conecta);
	$mensaje='<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">El registro se ha eliminado con exito!</p></div>';
	echo '<meta http-equiv=refresh content=1;URL=menu.php?accion=7A&tipo='.$tipo.'>';
}


?>
        <ul class="breadcrumbs">
            <li><a href="menu.php?accion=7A&tipo=<? echo $tipo;?>"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="menu.php?accion=7A&tipo=<? echo $tipo;?>">Productos</a> <span class="separator"></span></li>
            <li>Administrar</li>
        </ul>
        
        <div class="pageheader">
	        <div class="pageicon"><span class="iconfa-briefcase"></span></div>
            <div class="pagetitle">
                <h5>Productos  <? echo $tipo;?></h5>
                <h1>Administrar</h1>
            </div>
        </div>
        
        <div class="maincontent">
            <div class="maincontentinner">
		
        	<? echo $mensaje; ?>
            
			<?
            if ($modificar=='ok' AND $dato>0){
            include('conexion.php');
            $sql='select * from publicidad where idx ='.$dato;
            $equipo=@mysql_query($sql,$conecta);
            $registro=@mysql_fetch_assoc($equipo);
            $t=explode('~',$registro['contenido']);
            $img_1=$registro['img_1'];
            $img_2=$registro['img_2'];
            $orden=$registro['orden'];
            $dato=$registro['idx'];

            }
            
            ?>

                    
            <div id="dashboard-left" class="span8" style="margin:0;">
            
            <h4 class="widgettitle">Ficha Productos <? echo $tipo;?></h4>
            <div class="widgetcontent">
            	<form action=""  method="post" enctype="multipart/form-data" class="stdform" >
                
                  <input type="hidden" name="idx" id="idx" value="<? echo $dato;?>" /> 	


                        <p>
                            <label>Titulo Espa&ntilde;ol</label>
                            <span class="field"><input type="text" name="t0" id="t0" class="input-large" value="<? echo $t[0];?>"/></span>
                        </p>

                        <p>
                            <label>Titulo Ingles</label>
                            <span class="field"><input type="text" name="t1" id="t1" class="input-large" value="<? echo $t[1];?>"/></span>
                        </p>
                        
                       
                        
                        <p>
                            <label>Orden</label>
                            <span class="field"><input type="text" name="orden" id="orden" class="input-large" value="<? echo $orden;?>"/></span>
                        </p>
			

                        

			<input type="hidden" name="img_1" id="img_1" value="<? echo $img_1;?>" />
            
			<div class="par">
            
			<small class="desc">Peso maximo: 500kb</small>
                        	
			    <label>Documento Espa&ntilde;ol</label>
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
				 <? if(is_file($img_1) AND ($dato>0) ){?>
                 <a href="menu.php?accion=7A&borrar=img_1&dato=<? echo $dato;?>&img_1=<? echo $img_1;?>&modificar=<? echo $modificar;?>&tipo=<? echo $tipo;?>" title="Eliminar">
                 <span class="iconsweets-trashcan" style="height:28px; margin:0 5px;"></span>
                 </a>
                 <? } ?>
			    </div>
			</div>
           	
			<input type="hidden" name="img_2" id="img_2" value="<? echo $img_2;?>" />
            
			<div class="par">
            
			<small class="desc">Peso maximo: 500kb</small>
                        	
			    <label>Documento Ingles</label>
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
				 <? if(is_file($img_2) AND ($dato>0) ){?>
                 <a href="menu.php?accion=7A&borrar=img_2&dato=<? echo $dato;?>&img_2=<? echo $img_2;?>&modificar=<? echo $modificar;?>&tipo=<? echo $tipo;?>" title="Eliminar">
                 <span class="iconsweets-trashcan" style="height:28px; margin:0 5px;"></span>
                 </a>
                 <? } ?>
			    </div>
			</div>


            
            <p class="stdformbutton"> 
            
            
            
            <? if ($modificar=='ok'){?>
            
            <input class="btn btn-warning" type="submit" id="Enviar" name="Enviar" value="Modificar" style="border:0; height:32px;"/>
            
            <? } else {?> 
            
           
                        
            <? if ($_POST['Enviar']=='Guardar'){?>
            
            <a href="menu.php?accion=7A&tipo=<? echo $tipo;?>" class="btn">Limpiar</a>
            
            <? } else {?>
            
            <input class="btn btn-primary" type="submit" id="Enviar" name="Enviar" value="Guardar" style="border:0; height:32px;"/>
            
            <? }} ?>
            </p>

			</form>
            </div>
            </div>

                
            
            
            
            <div id="dashboard-right" class="span4">

                        
						<h4 class="widgettitle">Listado <? echo $tipo;?></h4>
 
                         <div style="max-height:494px; overflow-y:auto; margin:0 0 20px 0;">

						<table class="table table-bordered responsive" style="background:#fff;">
                            <tbody>
                            
                            <?
                            include('conexion.php');	
                            $consulta=@mysql_query("select * from publicidad where tipo = '".$tipo."' ORDER BY orden ASC", $conecta);
                            @mysql_close($conecta);	
                          	$registros = @mysql_num_rows($consulta);
							
							if ($registros>0){?>

							<?											
                            while ($resultado = @mysql_fetch_assoc($consulta)) { 
                            
                            $t=explode('~',$resultado['contenido']);
                            $ft1=$resultado['img_1'];
                            $ft2=$resultado['img_2'];
                            $anuncio=$resultado['idx'];
                            
                                                       
                            ?>




<tr>
                   
<td><a href="menu.php?accion=7A&dato=<? echo $anuncio;?>&modificar=ok&tipo=<? echo $tipo;?>" title="modificar"><? echo substr($t[0],0,40);?></a></td>
<td class="center" width="30"><a href="menu.php?accion=7A&dato=<? echo $anuncio;?>&modificar=ok&tipo=<? echo $tipo;?>" title="modificar"><span class="icon-picture"></span></a></td>
<td class="center" width="30"><a href="menu.php?accion=7A&eliminar_anuncio=ok&dato=<? echo $anuncio;?>&img_1=<? echo $ft1;?>&img_2=<? echo $ft2;?>&tipo=<? echo $tipo;?>"><span class="icon-trash"></span></a></td>

</tr>

<? } ?>

<? } else {?>


<tr>                   
<td>No se han encontrado registros en su busqueda</td>
</tr>


<? } ?>


                             

</tbody>

</table>

      		 </div>
                                               
      		 </div>
            

            

 			     
      </div>  
   
   </div>
