<?php 
require('../aspecto/libreria.inc');
dibuja();
//ComprobarAdministrador ();
function LimpiaResultados($objeto){
	foreach ($objeto as $atributo => $valor)
		if(is_string($objeto->$atributo) === true)
			$objeto->$atributo = stripslashes($objeto->$atributo);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Buscar usuario</title>
	<style type="text/css"><!--body{padding-top: 20px;}#resultados{position:absolute;}--></style>
	<script languaje="javascript" src="../js/ajax_buscar_e.js" type="text/javascript"></script>
</head>
<body>
<?php
echo '<br>';echo '<br>';echo '<br>';echo '<br>';
?>
<form action="#">
	Usuario:<br>
	<INPUT TYPE="text" id="usuario" autocomplete="off"><br>
	<div id="resultados"></div><br>
</form>
<?php
include('../aspecto/pie.html');
?>
</body>
</html>
