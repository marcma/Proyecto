<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Modificacion de usuarios</title>
		<style type="text/css" xml:space="preserve">
			BODY, P,TD{ font-family: Arial,Verdana,Helvetica, sans-serif; font-size: 10pt }
			A{font-family: Arial,Verdana,Helvetica, sans-serif;}
			B {	font-family : Arial, Helvetica, sans-serif;	font-size : 12px;	font-weight : bold;}
			.error_strings{ font-family:Verdana; font-size:14px; color:red; background-color:#ff0;}
		</style>
		<!--<script language="javascript" src="../../Proyecto MVC/moduloitems/js/valida_alta_items.js" type="text/javascript"></script> -->
		<script language="JavaScript" src="./genValidator/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
		<link rel="stylesheet" href="./aspecto/jquery-ui.css" />
		<script type="text/javascript" src="./javaScripts/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="./javaScripts/jquery-ui.js"></script>
		<script>
			$(function() {
				$("#datepicker").datepicker();
			});
		</script>				
	</head>	
	<body>
		<div class="contenedor">
			<div class="nombreSeccion">
				<h1>Modificar prestamos</h1>
			</div>
			<div class="cuerpo">	
				<?php while ($obj = $items->fetch_object()){		
							LimpiaResultados($obj);
				?>
				<form action="./moduloprestamos/controladores/prestamosControlador.php" method="get" name="myform" id="myform" cellspacing="2" cellpadding="2">
					<table class="letras" align="center">
						<tr>					
							<td>Usuario:</td>
							<td>
								<div id='myform_idd_errorloc' class="error_strings"></div>
								<INPUT TYPE="text" NAME="idd" SIZE="20" MAXLENGTH="30" value="<?php echo $obj->usuario?>" readonly />
							</td>
						</tr>
						<tr>
							<td>Código del libro:</td>								
							<td>
								<div id='myform_pass_errorloc' class="error_strings"></div>	
								<input type="text" name="codLibro" size="20" maxlength="30" value="<?php echo $obj->codLibro?>" readonly />
							</td>
						</tr>
						<tr>					
							<td>Fecha prestamo:</td>					
							<td>
								<div id='myform_nombre_errorloc' class="error_strings"></div>
								<input type="text" id="datepicker" name="fechaPrestamo" size="20" maxlength="30" value="<?php echo $obj->fechaPrestamo?>" />
							</td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td></td>	
							<td>
								<input TYPE="submit" NAME="modifica" VALUE="Modifica" />
							</td>						
						</tr>								
					</table>
					<script language="JavaScript" src="./moduloitems/js/valModificar.js" type="text/javascript" xml:space="preserve"></script>
				</form>
				<?php } ?>
			</div>
		</div>
	</body>	
</html>	