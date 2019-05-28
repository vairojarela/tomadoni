<? 
include('conexion.php');	
$b_seo='select * from seo';
$s_seo=@mysql_query($b_seo,$conecta);
$r_seo=@mysql_fetch_assoc($s_seo);
$t_seo=@explode('~',$r_seo['contenido']);
$b_info='select * from info';
$s_info=@mysql_query($b_info,$conecta);
$r_info=@mysql_fetch_assoc($s_info);
$t_info=@explode('~',$r_info['contenido']);
/*META TAGS*/
$title=$t_seo[0];
$keywords=$t_seo[1];
$description=$t_seo[2];	
/*INFO*/
$empresa_web=$t_info[0];
$email_web=$t_info[1];
$dominio_web=$t_info[2];
$telefono_web=$t_info[3];
$direccion_web=$t_info[4];
$horario_web=$t_info[5];
$footer_web=$t_info[6];
$facebook_web=$t_info[7];
$twitter_web=$t_info[8];
$youtube_web=$t_info[9];
$google_web=$t_info[10];
$telefono2_web=$t_info[11];
$video='';

$analytics="<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-66006020-1', 'auto');
ga('send', 'pageview');
</script>";

$remarketing='<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 944727448;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/944727448/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>';

$conversion='<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 944727448;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "SiisCJPM8l4QmMu9wgM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/944727448/?label=SiisCJPM8l4QmMu9wgM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>';
?>