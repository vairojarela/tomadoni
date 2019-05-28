<?
	session_start();
	if (!isset($_SESSION['activo'])) {
		session_destroy();
		header('refresh:0; url=index.php');
		exit();
	}


if ($_POST["Enviar"]=="Guardar" ){

include('conexion.php');

$contenido.=$_POST['t0'].'~';
$contenido.=$_POST['tags'].'~';
$contenido.=$_POST['t2'].'~';
$contenido.=$_POST['t3'].'~';


$sql="update seo set contenido='".$contenido."' where idx=1";  
			
$resultado=@mysql_query($sql,$conecta);
@mysql_close($conecta);

if (!mysql_errno()){
$mensaje= '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha realizado el cambio con exito!</p></div>';				
} 
			
}

?>
        <ul class="breadcrumbs">
            <li><a href="menu.php?accion=3A"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="menu.php?accion=3A">Seo</a> <span class="separator"></span></li>
            <li>Administrar</li>
        </ul>
        
        <div class="pageheader">
	        <div class="pageicon"><span class="iconfa-globe"></span></div>
            <div class="pagetitle">
                <h5>Seo</h5>
                <h1>Administrar</h1>
            </div>
        </div>
        
        <div class="maincontent">
            <div class="maincontentinner">
            
            <? echo $mensaje; ?>
           
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Administrar</h4>
                <div class="widgetcontent nopadding">
                 <form action="<? $PHP_SELF ?>"  method="post" enctype="multipart/form-data" class="stdform stdform2" >
                 
				<?
                include('conexion.php');
                $sql='select * from seo';
                $equipo=@mysql_query($sql,$conecta);
                $registro=@mysql_fetch_assoc($equipo);
                $t=@explode('~',$registro['contenido']);
                $idx=$registro['idx'];
                ?>                 
                    
                 <input name="idx" id="idx" type="hidden"  value="<? echo $idx;?>"/>
                                                
                            <p>
                                <label style="font-weight:normal;">Titulo <small>Maximo 60 caracteres.</small></label>
                                <span class="field"><input name="t0" id="t0" type="text" class="input-xxlarge" maxlength="60"  value="<? echo $t[0];?>"/>
                              </span>
                            </p>
                            

                            <p>
                                <label style="font-weight:normal;">Palabras Claves</label>
                                <span class="field"><input name="tags" id="tags" class="input-large" value="<? echo $t[1];?>"/></span>
                            </p>

                            <p>	
                                <label style="font-weight:normal;">Descrición <small>Maximo 250 caracteres.</small></label>
                                <span class="field"><textarea cols="80" rows="5" name="t2" id="t2" class="span5" maxlength="250"><? echo $t[2];?></textarea></span>
                            </p>

                             <p>
                                <label style="font-weight:normal;">Codigo Analisis</label>
                                <span class="field"><textarea cols="80" rows="5" name="t3" id="t3" class="span5"><? echo $t[3];?></textarea></span>
                            </p>
                            
                            
                           
	
                            <p class="stdformbutton">
                            <input class="btn btn-primary" type="submit" id="Enviar" name="Enviar" value="Guardar" style="border:0; height:32px;"/>
                           </p>
                    </form>
                </div>
            </div>
            
            
            </div>
        </div>
