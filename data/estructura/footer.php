<div id="footer">
	<? if ($lang!='en'){?>
    <div class="m1">
    
        <div class="b1">
            <h1>TOMADONI</h1>
            <a href="inicio">Inicio</a>
            <a href="empresa">Empresa</a>
            <a href="productos">Productos</a>
            <a href="representaciones">Representaciones</a>
            <a href="clientes">Clientes</a>
            <a href="contactenos">Cont&aacute;ctenos</a>
        </div>

        <div class="b2">
            <h1>¿DONDE ESTAMOS?</h1>
			<iframe width="287" height="124" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="http://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=<? echo $direccion_web;?>&amp;aq=&amp;vpsrc=0&amp;ie=UTF8&amp;hq=&amp;hnear=<? echo $direccion_web;?>&amp;t=m&amp;z=14&amp;iwloc=r1&amp;output=embed"></iframe>
        </div>

        <div class="b3">
            <h1>HORARIO</h1>
			<p><span>Lunes a Viernes</span> 8:00 a 18:00hs<br />Sabado y domingo - Cerrado</p>
        </div>

        <div class="b4">
            <h1>CONTACTOS</h1>
            <p>Alianza 345 Ciudadela<br />Buenos Aires,Argentina<br /><br /><? echo $telefono_web;?><br /><? echo $email_web;?><br />www.tomadoni.com</p>
        </div>
        
    </div>
    
    <div class="m2">
        <div class="b1">Copyright © 2014 <? echo $footer_web;?>. Todos los derechos reservados. <a href="http://www.pcsignos.com.ar/posicionamiento-web/">posicionamiento seo</a></div>
        <div class="b2"><a href="http://www.pcsignos.com.ar/agencia-marketing-digital/" target="_blank" title="Agencia de marketing digital"></a></div>
    </div>
    <? } else {?>

    <div class="m1">
    
        <div class="b1">
            <h1>TOMADONI</h1>
            <a href="home">Home</a>
            <a href="company">Company</a>
            <a href="products">Products</a>
            <a href="representations">Representations</a>
            <a href="clients">Clients</a>
            <a href="contact">Contact us</a>
        </div>

        <div class="b2">
            <h1>WHERE ARE WE?</h1>
			<iframe width="287" height="124" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="http://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=<? echo $direccion_web;?>&amp;aq=&amp;vpsrc=0&amp;ie=UTF8&amp;hq=&amp;hnear=<? echo $direccion_web;?>&amp;t=m&amp;z=14&amp;iwloc=r1&amp;output=embed"></iframe>
        </div>

        <div class="b3">
            <h1>SCHEDULE</h1>
			<p><span>Monday to Friday</span> 8:00 a 18:00hs<br />Saturday and Sunday - Closed</p>
        </div>

        <div class="b4">
            <h1>CONTACTS</h1>
            <p>Alianza 345 Ciudadela<br />Buenos Aires,Argentina<br /><br /><? echo $telefono_web;?><br /><? echo $email_web;?><br />www.tomadoni.com</p>
        </div>
        
    </div>
    
    <div class="m2">
        <div class="b1">Copyright © 2014 <? echo $footer_web;?>. All rights reserved. <a href="http://www.pcsignos.com.ar/posicionamiento-web/">posicionamiento seo</a></div>
        <div class="b2"><a href="http://www.pcsignos.com.ar/agencia-marketing-digital/" target="_blank" title="Agencia de marketing digital"></a></div>
    </div>    
    
    <? } ?>

</div>

<div id="scroll"><a href="#top"><span></span></a></div>

<? echo $remarketing;?>

</body>
</html>