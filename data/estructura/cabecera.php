<div id="c1">

    

	<div class="m1">

    	

        <? if ($lang!='en'){?>

        <div class="b1"><a href="inicio"></a></div>

        <? } else {?>

        <div class="b1"><a href="home"></a></div>

        <? } ?>



        <div class="b6"><a href="home"></a></div>

        <div class="b5"><a href="inicio"></a></div>

        <div class="b4"><? echo $direccion_web;?></div>

        <div class="b3"><? echo $telefono_web;?></div>

        <div class="b2"><? echo $email_web;?></div>

        

    </div>

    

    <? if ($lang!='en'){?>    

    <div class="m2">

    	<ul>

    	<li><a href="inicio">INICIO</a></li>

    	<li><a href="empresa">EMPRESA</a></li>



    	<li class="submenu">

        

        	<a href="productos">PRODUCTOS</a>

            

            <ul>

            <li><a href="productos-Molienda">Molienda</a></li>

            <li><a href="productos-Mezclado">Mezclado</a></li>

            <li><a href="productos-Clasificado">Clasificado</a></li>

            <li><a href="productos-Transporte">Transporte</a></li>

            <li><a href="productos-Embolsado">Embolsado</a></li>

            <li><a href="productos-Filtrado">Filtrado</a></li>

            <li><a href="productos-Dosificado">Dosificado</a></li>

            <li><a href="productos-Otros">Otros</a></li>

            </ul>

            

        </li>



    	<li><a href="ingenieria-y-asesoramiento">INGENIER&Iacute;A Y ASESORAMIENTO</a></li>

    	<li><a href="nuestros-trabajos">NUESTROS TRABAJOS</a></li>

    	<li><a href="representaciones">REPRESENTACIONES</a></li>

    	<li><a href="clientes">CLIENTES</a></li>
    	
        <li><a href="novedades">NOVEDADES</a></li>

    	<li class="contacto"><a href="contactenos">CONT&Aacute;CTENOS</a></li>  

        </ul>  



    </div>

    <? } else {?>

    

    <div class="m2">

    	<ul>

    	<li><a href="home">HOME</a></li>

    	<li><a href="company">company</a></li>



    	<li class="submenu">

        

        	<a href="products">products</a>

            

            <ul>

            <li><a href="products-Milling">Milling</a></li>

            <li><a href="products-Mixing">Mixing</a></li>

            <li><a href="products-Classifyng">Classifyng</a></li>

            <li><a href="products-Conveying">Conveying</a></li>

            <li><a href="products-Bagging">Bagging</a></li>

            <li><a href="products-Filtering">Filtering</a></li>

            <li><a href="products-Feeders">Feeders</a></li>

            <li><a href="products-Others">Others</a></li>

            </ul>

            

        </li>



    	<li><a href="engineering-and-advice">ENGINEERING AND ADVICE</a></li>

    	<li><a href="our-work">OUR WORK</a></li>

    	<li><a href="representations">Representations</a></li>

    	<li><a href="clients">Clients</a></li>

    	<li><a href="contact" class="contacto">Contact</a></li>  

        </ul>  

    </div>

    

    

    <? } ?>

        

</div>