<div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Nevagaci&oacute;n</li>
                
                 <li class="<? if ($accion=='3A') {echo 'active';}?>"><a href="menu.php?accion=3A"><span class="iconfa-globe"></span> Seo</a></li>
				<li class="<? if ($accion=='4A') {echo 'active';}?>"><a href="menu.php?accion=4A"><span class="iconfa-laptop"></span> Info</a></li>
                


               <li class="dropdown <? if ($accion=='2A') {echo 'active';}?>"><a href=""><span class="iconfa-picture"></span> Banner</a>
                    <ul <? if ($accion=='2A' AND strlen($_GET['tipo'])>0) {echo 'style="display:block;"';}?>>                                    
                        <li class="<? if ($accion=='2A' OR $_GET['tipo']=='Principal')?>"><a href="menu.php?accion=2A&tipo=Principal">Principal</a></li>
                        <li class="<? if ($accion=='2A' OR $_GET['tipo']=='Clientes')?>"><a href="menu.php?accion=2A&tipo=Clientes">Clientes</a></li>
                        <li class="<? if ($accion=='2A' OR $_GET['tipo']=='Trabajos')?>"><a href="menu.php?accion=2A&tipo=Trabajos">Nuestros trabajos</a></li>
                    </ul>              
               </li>



               <li class="dropdown <? if ($accion=='7A') {echo 'active';}?>"><a href=""><span class="iconfa-briefcase"></span> Productos</a>
                    <ul <? if ($accion=='7A' AND strlen($_GET['tipo'])>0) {echo 'style="display:block;"';}?>>                                    
                        <li class="<? if ($accion=='7A' AND $_GET['tipo']=='Molienda')?>"><a href="menu.php?accion=7A&tipo=Molienda">Molienda</a></li>
                        <li class="<? if ($accion=='7A' AND $_GET['tipo']=='Mezclado')?>"><a href="menu.php?accion=7A&tipo=Mezclado">Mezclado</a></li>
                        <li class="<? if ($accion=='7A' AND $_GET['tipo']=='Clasificado')?>"><a href="menu.php?accion=7A&tipo=Clasificado">Clasificado</a></li>
                        <li class="<? if ($accion=='7A' AND $_GET['tipo']=='Transporte')?>"><a href="menu.php?accion=7A&tipo=Transporte">Transporte</a></li>
                        <li class="<? if ($accion=='7A' AND $_GET['tipo']=='Dosificado')?>"><a href="menu.php?accion=7A&tipo=Dosificado">Dosificado</a></li>
                        <li class="<? if ($accion=='7A' AND $_GET['tipo']=='Filtrado')?>"><a href="menu.php?accion=7A&tipo=Filtrado">Filtrado</a></li>
                        <li class="<? if ($accion=='7A' AND $_GET['tipo']=='Embolsado')?>"><a href="menu.php?accion=7A&tipo=Embolsado">Embolsado</a></li>
                        <li class="<? if ($accion=='7A' AND $_GET['tipo']=='Otros')?>"><a href="menu.php?accion=7A&tipo=Molienda">Otros</a></li>
                    </ul>              
               </li>



               <li class="dropdown <? if ($accion=='5A') {echo 'active';}?>"><a href=""><span class="iconfa-book"></span> Contenido</a>
                    <ul <? if ($accion=='5A' AND strlen($_GET['tipo'])>0) {echo 'style="display:block;"';}?>>                                    
                        <li class="<? if ($accion=='5A' OR $_GET['tipo']=='Empresa')?>"><a href="menu.php?accion=5A&tipo=Empresa">Empresa</a></li>
                        <li class="<? if ($accion=='5A' OR $_GET['tipo']=='Representaciones')?>"><a href="menu.php?accion=5A&tipo=Representaciones">Representaciones</a></li>
                        <li class="<? if ($accion=='5A' OR $_GET['tipo']=='Clientes')?>"><a href="menu.php?accion=5A&tipo=Clientes">Clientes</a></li>
                        <li class="<? if ($accion=='5A' OR $_GET['tipo']=='Ingenieria')?>"><a href="menu.php?accion=5A&tipo=Ingenieria">Ingenier&iacute;a y asesoramiento</a></li>
                    </ul>              
               </li>


				

               




            </ul>
        </div>
        
</div>