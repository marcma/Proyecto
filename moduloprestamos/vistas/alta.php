<!DOCtype HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<script language="JavaScript" src="./javaScripts/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
		<title>Alta usuarios</title>
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
				<h1>Alta prestamos</h1>
			</div>
			<div class="cuerpo">	
				<form action="./moduloprestamos/controladores/prestamosControlador.php" name="myform" id="myform" cellspacing="2" cellpadding="2" method="POST">
					<table class="letras">				
						<tr>					
							<td>Usuario:</td>
							<td>
								<div id='myform_usuario_errorloc' class="error_strings"></div>
								<input type="text" name="usuario" size="20" maxlength="30" />
							</td>
						</tr>
						<tr>
							<td>Código del libro:</td>								
							<td>
								<div id='myform_codLibro_errorloc' class="error_strings"></div>	
								<input type="text" name="codLibro" size="20" maxlength="30" />
							</td>
						</tr>	
						<tr>
							<td>Fecha prestamo:</td>								
							<td>
								<div id='myform_fecha_errorloc' class="error_strings"></div>	
								<input type="text" id="datepicker" name="fecha" size="20" maxlength="30" />
							</td>
						</tr>					
						<tr>
							<td></td>
						</tr>			
						<tr>
							<td></td>	
							<td>
								<input type="submit" name="alta" value="Alta">
							</td>						
						</tr>	
					</table>
					<script language="JavaScript" src="./moduloprestamos/js/valAlta.js" type="text/javascript" xml:space="preserve"></script>
				</form>
			</div>
		</div>
	</body>
</html>