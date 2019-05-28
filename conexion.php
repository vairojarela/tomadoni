<?php
include("data/config/config.php");
$conecta=@mysql_connect($server,$usuario_base,$password);
@mysql_select_db($base,$conecta);
?>