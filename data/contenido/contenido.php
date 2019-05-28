<? 
if ($_GET['tipo']=='Empresa' OR $_GET['tipo']=='Company'){$tipo='Empresa';}
if ($_GET['tipo']=='Representaciones' OR $_GET['tipo']=='Representations'){$tipo='Representaciones';}
if ($_GET['tipo']=='Clientes' OR $_GET['tipo']=='Clients'){$tipo='Clientes';}
if ($_GET['tipo']=='Productos' OR $_GET['tipo']=='Products'){$tipo='Productos';}
if ($_GET['tipo']=='Ingenieria-y-Asesoramiento' OR $_GET['tipo']=='Engineering-and-Advice'){$tipo='Ingenieria';}
if ($_GET['tipo']=='Nuestros-trabajos' OR $_GET['tipo']=='Our-work'){$tipo='Nuestros trabajos';}
?>

<? if ($tipo=='Empresa' OR $tipo=='Representaciones' OR $tipo=='Clientes' OR $tipo=='Ingenieria' OR $tipo=='Nuestros trabajos' OR $tipo=='Company' OR $tipo=='Representations' OR $tipo=='Clients' OR $tipo=='Engineering' OR $tipo=='Our work'){?>

<div id="m6">

        <div class="m1">

			<?
            include('conexion.php');	
            $consulta=@mysql_query("select * from contenido where tipo='".$tipo."'", $conecta);
            @mysql_close($conecta);	
            $resultado=@mysql_fetch_assoc($consulta); 
            $t=explode('~',$resultado['contenido']);
            $img=@str_replace('../','',$resultado['img_1']);
            $img2=@str_replace('../','',$resultado['img_2']);
            ?>


			<? if ($tipo=='Clientes'){?>
            
            <h1><? echo $_GET['tipo'];?></h1>
       
       		<img src="<? echo $img;?>" />

			<? if ($lang!='en'){?>
            <h2><? echo $t[0];?></h2>
            
            <div id="scrol_ficha">
            <div class="customScrollBox">
            <div class="container">
            <div class="contenido">

            <p><? echo strip_tags($t[1],'<b><br><p>');?> </p>
            
            </div>
            </div>
            <div class="dragger_container">
            <div class="dragger"></div>
            </div>
            </div>
            </div>
            <? } else {?>

            <h2><? echo $t[2];?></h2>
            
            <div id="scrol_ficha">
            <div class="customScrollBox">
            <div class="container">
            <div class="contenido">

            <p><? echo strip_tags($t[3],'<b><br><p>');?> </p>
            
            </div>
            </div>
            <div class="dragger_container">
            <div class="dragger"></div>
            </div>
            </div>
            </div>
           
            
            <? } ?>
                    
            
            <? } ?>


			<? if ($tipo=='Empresa' OR $tipo=='Ingenieria'){?>
                        
            <h1><? echo str_replace('Ingenieria','Ingenier&iacute;a',str_replace('-',' ',$_GET['tipo']));?></h1>
       
			<div class="b2" style="background:url(<? echo $img;?>)">

                <div class="d1">
                	
                    <? if ($lang!='en'){?>
                    <h2><? echo $t[0];?></h2>
                    
                    <div id="scrol_ficha">
                    <div class="customScrollBox">
                    <div class="container">
                    <div class="contenido">
        
                    <p><? echo strip_tags($t[1],'<b><br><p>');?> </p>
                    
                    </div>
                    </div>
                    <div class="dragger_container">
                    <div class="dragger"></div>
                    </div>
                    </div>
                    </div>
                    <? } else {?>
                    
                    <h2><? echo $t[2];?></h2>
                    
                    <div id="scrol_ficha">
                    <div class="customScrollBox">
                    <div class="container">
                    <div class="contenido">
        
                    <p><? echo strip_tags($t[3],'<b><br><p>');?> </p>
                    
                    </div>
                    </div>
                    <div class="dragger_container">
                    <div class="dragger"></div>
                    </div>
                    </div>
                    </div>
                   
                    
                    <? } ?>
                    
                </div>

			</div>
            
            <? } ?>

			<? if ($tipo=='Representaciones'){?>
            
            <h1><? echo $_GET['tipo'];?></h1>
       		
            <div class="b1" style="background:url(<? echo $img;?>)">

                <div class="d1">

                    <? if ($lang!='en'){?>
                
                    <h2><? echo $t[0];?></h2>
                    
                    <div id="scrol_ficha">
                    <div class="customScrollBox">
                    <div class="container">
                    <div class="contenido">
        
                    <p><? echo strip_tags($t[1],'<b><br><p>');?> </p>
                    
                    </div>
                    </div>
                    <div class="dragger_container">
                    <div class="dragger"></div>
                    </div>
                    </div>
                    </div>
                    
                    <? } else {?>
                    

                    <h2><? echo $t[2];?></h2>
                    
                    <div id="scrol_ficha">
                    <div class="customScrollBox">
                    <div class="container">
                    <div class="contenido">
        
                    <p><? echo strip_tags($t[3],'<b><br><p>');?> </p>
                    
                    </div>
                    </div>
                    <div class="dragger_container">
                    <div class="dragger"></div>
                    </div>
                    </div>
                    </div>
                    
                    <? } ?>
                    
                    <img src="<? echo $img2;?>" />
                </div>

			</div>            
            <? } ?>

        
        <div class="clear"></div>
        </div>



<div class="clear"></div>
</div>


<? if ($tipo=='Clientes'){?>

<div id="m4">
    <div class="m1"><? echo $_GET['tipo'];?>  <a href="" class="sig"></a><a href="" class="ant"></a></div>
    <div class="m2">
        <div class="b-01">
        	<ul>
				<?
                include('conexion.php');	
                $banner_2=@mysql_query("select * from banner where tipo='Clientes' and estado='si' order by orden ASC", $conecta);
                @mysql_close($conecta);	
                while($resultado_2=@mysql_fetch_assoc($banner_2)){ 
                $img_2=@str_replace('../','',$resultado_2['imagen']);
                $url_2=$resultado_2['url'];
                ?>
                
                <? if (strlen($url_2)>0){?>
                <li><a href="<? echo $url_2;?>" target="_blank"><img src="<? echo $img_2;?>" /></a></li>
                <? } else {?>
                <li><img src="<? echo $img_2;?>" /></li>
                <? } ?>
                <? } ?>            
            </ul>
        </div>
    </div>
</div>

<? } ?>


<? if ($tipo=='Nuestros trabajos'){?>

<div id="m7">
    <div class="m1"><h1><? echo str_replace('-',' ',$_GET['tipo']);?></h1></div>
    <div class="m2">
    
        <div id="galeria" style="position:relative; padding:0px; margin:0px; visibility:hidden">
        <div id="bx_galeria" style="visibility:hidden"> 
        
		<?
        /*GALERIA*/
		include('conexion.php');	
		$banner_3=@mysql_query("select * from banner where tipo='Trabajos' and estado='si' order by orden ASC", $conecta);
		@mysql_close($conecta);	
		while($resultado_3=@mysql_fetch_assoc($banner_3)){ 
		$img_3=@str_replace('../','',$resultado_3['imagen']);
		?>
                
                
			<div data-thumb="<? echo $img_3;?>"><img src="<? echo $img_3;?>"/></div>
        
        <? } ?>        
        
        
        
        </div>
        </div>
        
    </div>
</div>

<? } ?>



<? } ?>


<? if ($tipo=='Productos'){?>

<? $categoria=$_GET['categoria']; ?>


<? if ($categoria=='Milling' OR $categoria=='Molienda'){?> <? $cate='Molienda';?> <? } ?>
<? if ($categoria=='Mixing' OR $categoria=='Mezclado'){?> <? $cate='Mezclado';?> <? } ?>
<? if ($categoria=='Classifyng' OR $categoria=='Clasificado'){?> <? $cate='Clasificado';?> <? } ?>
<? if ($categoria=='Conveying' OR $categoria=='Transporte'){?> <? $cate='Transporte';?> <? } ?>
<? if ($categoria=='Bagging' OR $categoria=='Embolsado'){?> <? $cate='Embolsado';?> <? } ?>
<? if ($categoria=='Filtering' OR $categoria=='Filtrado'){?> <? $cate='Filtrado';?> <? } ?>
<? if ($categoria=='Feeders' OR $categoria=='Dosificado'){?> <? $cate='Dosificado';?> <? } ?>
<? if ($categoria=='Others' OR $categoria=='Otros'){?> <? $cate='Otros';?> <? } ?>


<div id="m3">

	
    <? if (strlen($categoria)>0) {?>
    
   	<h1><? echo $_GET['tipo'];?> / <? echo $categoria;?></h1>

    <table cellpadding="0" cellspacing="0" style="border:1px solid #ddd;  font-size:12px; color:#000; background:#fafafa;">
    <tr>
	<? if ($lang!='en'){?>
    <td style="width:878px; padding:15px;">PRODUCTO</td>
    <td style="border-left:1px solid #ddd; text-align:center; width:169px;">DOCUMENTO</td>
	<? } else {?>
    <td style="width:878px; padding:15px;">PRODUCT</td>
    <td style="border-left:1px solid #ddd; text-align:center; width:169px;">DOCUMENT</td>
    <? } ?>
    </tr>
    </table>
 
	<?
    include('conexion.php');	
	
	if (strlen($categoria)>0){
    $consulta=@mysql_query("select * from publicidad where tipo='".$cate."' ORDER BY orden ASC", $conecta);
	} else {
    $consulta=@mysql_query("select * from publicidad", $conecta);
	}
	
    @mysql_close($conecta);	
	$x='';
    while($resultado=@mysql_fetch_assoc($consulta)){ 
    $c=explode('~',$resultado['contenido']);
    $img1=@str_replace('../','',$resultado['img_1']);
    $img2=@str_replace('../','',$resultado['img_2']);
	$x=$x+1;
    ?>    

	<? if ($x%2==0){?>
    <table cellpadding="0" cellspacing="0" style="border:1px solid #ddd; border-top:0; font-size:12px; color:#454545; text-transform:uppercase;">
    <? } else {?>
    <table cellpadding="0" cellspacing="0" style="border:1px solid #ddd; border-top:0; font-size:12px; color:#454545; text-transform:uppercase; background:#fafafa;">
    <? } ?>
    <tr>
    <td style="padding:15px; width:878px;">
    


    <? if ($lang!='en'){?>
    
    <? if (strlen($img1)>0){?>
    
    <a href="<? echo $img1;?>" <? if (ereg('.jpg',$img1)){?> class="imagen" <? } else {?> target="_blank" <? } ?> >

	<? if ($categoria=='Molienda'){?><img src="imagenes/productos/1a.jpg" /><? } ?>
	<? if ($categoria=='Mezclado'){?><img src="imagenes/productos/2a.jpg"/><? } ?>
	<? if ($categoria=='Clasificado'){?><img src="imagenes/productos/3a.jpg" /><? } ?>
	<? if ($categoria=='Transporte'){?><img src="imagenes/productos/4a.jpg" /><? } ?>
	<? if ($categoria=='Embolsado'){?><img src="imagenes/productos/5a.jpg" /><? } ?>
	<? if ($categoria=='Filtrado'){?><img src="imagenes/productos/6a.jpg" /><? } ?>
	<? if ($categoria=='Dosificado'){?><img src="imagenes/productos/7a.jpg" /><? } ?>
	<? if ($categoria=='Otros'){?><img src="imagenes/productos/8a.jpg" /><? } ?>
        
    
    </a>
    
    <? } else {?>

	<? if ($categoria=='Molienda'){?><img src="imagenes/productos/1a.jpg" /><? } ?>
	<? if ($categoria=='Mezclado'){?><img src="imagenes/productos/2a.jpg"/><? } ?>
	<? if ($categoria=='Clasificado'){?><img src="imagenes/productos/3a.jpg" /><? } ?>
	<? if ($categoria=='Transporte'){?><img src="imagenes/productos/4a.jpg" /><? } ?>
	<? if ($categoria=='Embolsado'){?><img src="imagenes/productos/5a.jpg" /><? } ?>
	<? if ($categoria=='Filtrado'){?><img src="imagenes/productos/6a.jpg" /><? } ?>
	<? if ($categoria=='Dosificado'){?><img src="imagenes/productos/7a.jpg" /><? } ?>
	<? if ($categoria=='Otros'){?><img src="imagenes/productos/8a.jpg" /><? } ?>


    <? } ?>
    
    <? } else {?>
    
    <? if (strlen($img2)>0){?>
    <a href="<? echo $img2;?>" <? if (ereg('.jpg',$img2)){?> class="imagen" <? } else {?> target="_blank" <? } ?> >

	<? if ($categoria=='Milling'){?><img src="imagenes/productos/1c.jpg" /><? } ?>
	<? if ($categoria=='Mixing'){?><img src="imagenes/productos/2c.jpg"/><? } ?>
	<? if ($categoria=='Classifyng'){?><img src="imagenes/productos/3c.jpg" /><? } ?>
	<? if ($categoria=='Conveying'){?><img src="imagenes/productos/4c.jpg" /><? } ?>
	<? if ($categoria=='Bagging'){?><img src="imagenes/productos/5c.jpg" /><? } ?>
	<? if ($categoria=='Filtering'){?><img src="imagenes/productos/6c.jpg" /><? } ?>
	<? if ($categoria=='Feeders'){?><img src="imagenes/productos/7c.jpg" /><? } ?>
	<? if ($categoria=='Others'){?><img src="imagenes/productos/8c.jpg" /><? } ?>
    
    </a>
    
    <? } else {?>

	<? if ($categoria=='Milling'){?><img src="imagenes/productos/1c.jpg" /><? } ?>
	<? if ($categoria=='Mixing'){?><img src="imagenes/productos/2c.jpg"/><? } ?>
	<? if ($categoria=='Classifyng'){?><img src="imagenes/productos/3c.jpg" /><? } ?>
	<? if ($categoria=='Conveying'){?><img src="imagenes/productos/4c.jpg" /><? } ?>
	<? if ($categoria=='Bagging'){?><img src="imagenes/productos/5c.jpg" /><? } ?>
	<? if ($categoria=='Filtering'){?><img src="imagenes/productos/6c.jpg" /><? } ?>
	<? if ($categoria=='Feeders'){?><img src="imagenes/productos/7c.jpg" /><? } ?>
	<? if ($categoria=='Others'){?><img src="imagenes/productos/8c.jpg" /><? } ?>

    <? } ?>
    <? } ?> 
    
       

    <h2>

    <? if ($lang!='en'){?>
    <? if (strlen($img1)>0){?>
    <a href="<? echo $img1;?>" <? if (ereg('.jpg',$img1)){?> class="imagen" <? } else {?> target="_blank" <? } ?> ><b><? echo $categoria;?></b><br /><? echo $c[0];?></a>
    <? } else {?>
    <b><? echo $categoria;?></b><br />
	<? echo $c[0];?>
    <? } ?>
    <? } else {?>
    
    <? if (strlen($img2)>0){?>
    <a href="<? echo $img2;?>" <? if (ereg('.jpg',$img2)){?> class="imagen" <? } else {?> target="_blank" <? } ?> ><? echo $c[1];?></a>
    <? } else {?>
    <b><? echo $categoria;?></b><br />
	<? echo $c[1];?>
    <? } ?>
    <? } ?>  
    
    </h2>  

    
    
    </td>

	
    <td style="border-left:1px solid #ddd; width:169px; text-align:center;">
    
    <? if ($lang!='en'){?>
    <? if (strlen($img1)>0){?>
    <a href="<? echo $img1;?>" <? if (ereg('.jpg',$img1)){?> class="imagen" <? } else {?> target="_blank" <? } ?> style="background:#05a25d; border-radius:4px; width:100px; height:34px; display:inline-block; line-height:34px; color:#fff;">INGRESAR</a>
    <? } else {?>
    <a href="#" style="background:#05a25d; border-radius:4px; width:100px; height:34px; display:inline-block; line-height:34px; color:#fff; cursor:default;">NO DOCUMENTO</a>
    <? } ?>
    <? } else {?>
    
    <? if (strlen($img2)>0){?>
    <a href="<? echo $img2;?>" <? if (ereg('.jpg',$img2)){?> class="imagen" <? } else {?> target="_blank" <? } ?> style="background:#05a25d; border-radius:4px; width:100px; height:34px; display:inline-block; line-height:34px; color:#fff;">READ MORE</a>
    <? } else {?>
    <a href="#" style="background:#05a25d; border-radius:4px; width:100px; height:34px; display:inline-block; line-height:34px; color:#fff; cursor:default;">NO FILE</a>
    <? } ?>
    <? } ?>    
    </td>

    
    
    </tr>
    </table>

    <? } ?>
    
    <? } else {?>
    
    <h1><? echo $_GET['tipo'];?></h1>

    <? if ($lang!='en'){?>
	<a href="productos-Molienda"><img src="imagenes/productos/1.jpg" /></a>
	<a href="productos-Mezclado"><img src="imagenes/productos/2.jpg" /></a>
	<a href="productos-Clasificado"><img src="imagenes/productos/3.jpg" /></a>
	<a href="productos-Transporte"><img src="imagenes/productos/4.jpg" /></a>
	<a href="productos-Embolsado"><img src="imagenes/productos/5.jpg" /></a>
	<a href="productos-Filtrado"><img src="imagenes/productos/6.jpg" /></a>
	<a href="productos-Dosificado"><img src="imagenes/productos/7.jpg" /></a>
	<a href="productos-Otros"><img src="imagenes/productos/8.jpg" /></a>
	<? } else {?>
	<a href="products-Milling"><img src="imagenes/productos/1b.jpg" /></a>
	<a href="products-Mixing"><img src="imagenes/productos/2b.jpg" /></a>
	<a href="products-Classifyng"><img src="imagenes/productos/3b.jpg" /></a>
	<a href="products-Conveying"><img src="imagenes/productos/4b.jpg" /></a>
	<a href="products-Bagging"><img src="imagenes/productos/5b.jpg" /></a>
	<a href="products-Filtering"><img src="imagenes/productos/6b.jpg" /></a>
	<a href="products-Feeders"><img src="imagenes/productos/7b.jpg" /></a>
	<a href="products-Others"><img src="imagenes/productos/8b.jpg" /></a>
    <? } ?>    
    
    <? } ?>
    

<div class="clear"></div>
</div>
<? } ?>