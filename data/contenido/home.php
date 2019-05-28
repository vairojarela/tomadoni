<div id="m1">

    <div id="banner">
    <div id="fmslideshow" style="visibility:hidden">
    
    <?
    include('conexion.php');	
    $banner_1=@mysql_query("select * from banner where tipo='Principal' and estado='si' order by orden ASC", $conecta);
    @mysql_close($conecta);	
    while($resultado_1=@mysql_fetch_assoc($banner_1)){ 
    $img_1=@str_replace('../','',$resultado_1['imagen']);
    $url_1=$resultado_1['url'];
    ?>
    
    <? if (strlen($url_1)>0){?>
    <div><div data-align="C" data-spacing="0,0"> <a href="<? echo $url_1;?>" target="_blank"><img src="<? echo $img_1;?>" /></a></div></div>
    <? } else {?>
    <div><div data-align="C" data-spacing="0,0"> <img src="<? echo $img_1;?>"/></div></div>
    <? } ?>
    <? } ?>
    
    </div>
    </div>

	<div class="m1">

	<?
    include('conexion.php');	
    $consulta=@mysql_query("select * from contenido", $conecta);
    @mysql_close($conecta);	
    $resultado=@mysql_fetch_assoc($consulta); 
    $t=explode('~',$resultado['contenido']);
    $img=@str_replace('../','',$resultado['img_2']);
    ?>

    <img src="<? echo $img;?>" />
    <? if ($lang!='en'){?>
    <h1><? echo $t[0];?></h1>
    <p><? echo strip_tags($t[1],'');?></p>
    <a href="empresa">SEGUIR LEYENDO..</a>
    <? } else {?>
    <h1><? echo $t[2];?></h1>
    <p><? echo strip_tags($t[3],'');?></p>
    <a href="company">READ MORE..</a>
    <? } ?>
    </div>
    
    <div class="m2">
    
    	<? if ($lang!='en'){?>
    	<div class="b1">
			<img src="imagenes/iconos/1.jpg" />
        	<h1>Soluciones a Medida</h1>
            <p>Contamos con procesos de control de calidad y apoyo al cliente,  adecu&aacute;ndonos a las necesidades del mercado local e internacional.</p>
        </div>

    	<div class="b2">
			<img src="imagenes/iconos/2.jpg" />
        	<h1>Experiencia en la Industria</h1>
            <p>Dise&ntilde;amos e instalamos plantas para procesos industriales, con la ingenier&iacute;a y la experiencia tecnol&oacute;gica adquirida desde 1948.</p>
        </div>

    	<div class="b1">
			<img src="imagenes/iconos/3.jpg" />
        	<h1>Representante exclusiva de PAYPER S.A.</h1>
            <p>La firma es representante exclusiva de PAYPER S.A. de Espa&ntilde;a, empresa dedicada a la fabricaci&oacute;n de maquinas embolsadoras autom&aacute;ticas de gran precisi&oacute;n.</p>
        </div>
        <? } else {?>
        
    	<div class="b1">
			<img src="imagenes/iconos/1.jpg" />
        	<h1>Custom Solutions</h1>
            <p>We have quality control processes and customer support, adapting to the needs of the local and international market.</p>
        </div>

    	<div class="b2">
			<img src="imagenes/iconos/2.jpg" />
        	<h1>Industry Experience</h1>
            <p>We design and install plants for industrial processes, engineering and technological experience since 1948.</p>
        </div>

    	<div class="b1">
			<img src="imagenes/iconos/3.jpg" />
        	<h1>Exclusive representative PAYPER S.A.</h1>
            <p>The firm is the exclusive representative of PAYPER SA of Spain, dedicated to the manufacture of automatic bagging machines for high precision.</p>
        </div>
        
        <? } ?>
    
    </div>
        
</div>

<div id="m2">
	<div class="m1">
    <? if ($lang!='en'){?>
    <h1>Tecnolog&iacute;a para el proceso de polvos y gr&aacute;nulos</h1>
    <a href="contactenos">cont&aacute;ctenos</a>
    <? } else {?>
    <h1>Technology for processing powders and granules</h1>
    <a href="contact">contact us</a>
    
    <? } ?>
    </div>
</div>

<div id="m3">
	<? if ($lang!='en'){?>
	<h1>PRODUCTOS</h1>
	<a href="productos-Molienda"><img src="imagenes/productos/1.jpg" /></a>
	<a href="productos-Mezclado"><img src="imagenes/productos/2.jpg" /></a>
	<a href="productos-Clasificado"><img src="imagenes/productos/3.jpg" /></a>
	<a href="productos-Transporte"><img src="imagenes/productos/4.jpg" /></a>
	<a href="productos-embolsado"><img src="imagenes/productos/5.jpg" /></a>
	<a href="productos-Filtrado"><img src="imagenes/productos/6.jpg" /></a>
	<a href="productos-Dosificado"><img src="imagenes/productos/7.jpg" /></a>
	<a href="productos-Otros"><img src="imagenes/productos/8.jpg" /></a>
    <? } else {?>
	<h1>PRODUCTS</h1>
	<a href="products-Milling"><img src="imagenes/productos/1b.jpg" /></a>
	<a href="products-Mixing"><img src="imagenes/productos/2b.jpg" /></a>
	<a href="products-Classifyng"><img src="imagenes/productos/3b.jpg" /></a>
	<a href="products-Conveying"><img src="imagenes/productos/4b.jpg" /></a>
	<a href="products-Bagging"><img src="imagenes/productos/5b.jpg" /></a>
	<a href="products-Filtering"><img src="imagenes/productos/6b.jpg" /></a>
	<a href="products-Feeders"><img src="imagenes/productos/7b.jpg" /></a>
	<a href="products-Others"><img src="imagenes/productos/8b.jpg" /></a>
    <? } ?>
<div class="clear"></div>
</div>

<div id="m4">
    <div class="m1"><? if ($lang!='en'){?> CLIENTES <? } else {?> CLIENTS <? } ?>  <a href="" class="sig"></a><a href="" class="ant"></a></div>
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