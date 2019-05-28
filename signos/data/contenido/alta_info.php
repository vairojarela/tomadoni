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
$contenido.=$_POST['t1'].'~';
$contenido.=$_POST['t2'].'~';
$contenido.=$_POST['t3'].'~';
$contenido.=$_POST['t4'].'~';
$contenido.=$_POST['t5'].'~';
$contenido.=$_POST['t6'].'~';
$contenido.=$_POST['t7'].'~';
$contenido.=$_POST['t8'].'~';
$contenido.=$_POST['t9'].'~';
$contenido.=$_POST['t10'].'~';
$contenido.=$_POST['t11'].'~';

$sql="update info set contenido='".$contenido."' where idx=1";  
			
$resultado=@mysql_query($sql,$conecta);
@mysql_close($conecta);

if (!mysql_errno()){
$mensaje= '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><h4>Resultados</h4><p style="margin: 8px 0">Se ha realizado el cambio con exito!</p></div>';				
} 
			
}

?>
        <ul class="breadcrumbs">
            <li><a href="menu.php?accion=3A"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="menu.php?accion=3A">Informaci&oacute;n</a> <span class="separator"></span></li>
            <li>Administrar</li>
        </ul>
        
        <div class="pageheader">
	        <div class="pageicon"><span class="iconfa-globe"></span></div>
            <div class="pagetitle">
                <h5>Informaci&oacute;n</h5>
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
                $sql='select * from info';
                $equipo=@mysql_query($sql,$conecta);
                $registro=@mysql_fetch_assoc($equipo);
                $t=@explode('~',$registro['contenido']);
                $idx=$registro['idx'];
                ?>                 
                    
                 <input name="idx" id="idx" type="hidden"  value="<? echo $idx;?>"/>
                 
                 			
                                                
                            <p>
                                <label style="font-weight:normal;">Empresa</label>
                                <span class="field"><input name="t0" id="t0" type="text" class="input-xxlarge" value="<? echo $t[0];?>"/>
                              </span>
                            </p>
                            
                            <p>
                                <label style="font-weight:normal;">Email</label>
                                <span class="field">
                                <input name="t1" id="t1" type="text" class="input-xxlarge" value="<? echo $t[1];?>"/>
                              </span>
                            </p>

                            <p>
                                <label style="font-weight:normal;">Dominio</label>
                                <span class="field">
                                <input name="t2" id="t2" type="text" class="input-xxlarge" value="<? echo $t[2];?>"/>
                              </span>
                            </p>
                           


                            <p>
                                <label style="font-weight:normal;">Tel&eacute;fono</label>
                                <span class="field">
                                <input name="t3" id="t3" type="text" class="input-xxlarge" value="<? echo $t[3];?>"/>
                              </span>
                            </p>

                            <p>
                                <label style="font-weight:normal;">Tel&eacute;fono Alternativo</label>
                                <span class="field">
                                <input name="t11" id="t11" type="text" class="input-xxlarge" value="<? echo $t[11];?>"/>
                              </span>
                            </p>
                            
                            <p>
                                <label style="font-weight:normal;">Direcci&oacute;n</label>
                                <span class="field">
                                <input name="t4" id="t4" type="text" class="input-xxlarge" value="<? echo $t[4];?>"/>
                              </span>
                            </p>                            
 
                    	   
                           
                             <p>
                                <label style="font-weight:normal;">Horarios</label>
                                <span class="field">
                                <input name="t5" id="t5" type="text" class="input-xxlarge" value="<? echo $t[5];?>"/>
                              </span>
                            </p>
                            
                            
                            <p>
                                <label style="font-weight:normal;">Copyright (footer)</label>
                                <span class="field">
                                <input name="t6" id="t6" type="text" class="input-xxlarge" value="<? echo $t[6];?>"/>
                              </span>
                            </p>
                            
                                                 	   

                            <p>
                                <label style="font-weight:normal;">Facebook</label>
                                <span class="field">
                                <input name="t7" id="t7" type="text" class="input-xxlarge" value="<? echo $t[7];?>"/>
                              </span>
                            </p>                          


                            <p>
                                <label style="font-weight:normal;">Twitter</label>
                                <span class="field">
                                <input name="t8" id="t8" type="text" class="input-xxlarge" value="<? echo $t[8];?>"/>
                              </span>
                            </p>                          

                            <p>
                                <label style="font-weight:normal;">Youtube</label>
                                <span class="field">
                                <input name="t9" id="t9" type="text" class="input-xxlarge" value="<? echo $t[9];?>"/>
                              </span>
                            </p>                          


                            <p>
                                <label style="font-weight:normal;">Google+</label>
                                <span class="field">
                                <input name="t10" id="t10" type="text" class="input-xxlarge" value="<? echo $t[10];?>"/>
                              </span>
                            </p>                          
	
                            <p class="stdformbutton">
                            <input class="btn btn-primary" type="submit" id="Enviar" name="Enviar" value="Guardar" style="border:0; height:32px;"/>
                           </p>
                    </form>
                </div>
            </div>
            
            
            </div>
        </div>
