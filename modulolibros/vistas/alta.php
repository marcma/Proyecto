<!DOCtype HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<style type="text/css" xml:space="preserve">
			BODY, P,TD{ font-family: Arial,Verdana,Helvetica, sans-serif; font-size: 10pt }
			A{font-family: Arial,Verdana,Helvetica, sans-serif;}
			B {	font-family : Arial, Helvetica, sans-serif;	font-size : 12px;	font-weight : bold;}
			.error_strings{ font-family:Verdana; font-size:14px; color:red; background-color:#ff0;}
		</style>
		<!--<script language="javascript" src="../../Proyecto MVC/moduloitems/js/valida_alta_items.js" type="text/javascript"></script> -->
		<script language="JavaScript" src="./javaScripts/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
		<script type="text/javascript" src="./javaScripts/nicEdit-latest.js"></script> <script type="text/javascript">
			bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });			
		</script>
		<title>Alta usuarios</title>
	</head>
	<body>
		<form action="./modulolibros/controladores/librosControlador.php" name="myform" id="myform" cellspacing="2" cellpadding="2" method="POST" onSubmit="return valida()">
			<table>				
				<tr>
					<td>Título:</td>								
					<td>
						<div id='myform_password_errorloc' class="error_strings"></div>	
						<input type="text" name="titulo" size="20" maxlength="30" />
					</td>
				</tr>
				<tr>					
					<td>Nombre autor:</td>					
					<td>
						<div id='myform_nombre_errorloc' class="error_strings"></div>
						<input type="text" name="nombreAutor" size="20" maxlength="30" />
					</td>
				</tr>
				<tr>
					<td>Primer apellido autor:</td>						
					<td>
						<div id='myform_apellido1_errorloc' class="error_strings"></div>
						<input type="text" name="apellido1Autor" size="20" maxlength="30" />
					</td>
				</tr>
				<tr>
					<td>Segundo apellido autor:</td>				
					<td>
						<div id='myform_apellido2_errorloc' class="error_strings"></div>
						<input type="text" name="apellido2Autor" size="20" maxlength="30" />
					</td>
				</tr>
				<tr>
					<td>Tema:</td>			
					<td>
						<div id='myform_edad_errorloc' class="error_strings"></div>	
						<input type="text" name="tema" size="20" maxlength="30" />
					</td>
				</tr>		
				<tr>
					<td>Unidades:</td>				
					<td>
						<div id='myform_direccion_errorloc' class="error_strings"></div>	
						<input type="text" name="unidades" size="20" maxlength="30" />
					</td>
				</tr>
				<tr>
					<td><?php /*echo utf8_encode('Teléfono:') */?> ISBN:</td>				
					<td>
						<div id='myform_telefono_errorloc' class="error_strings"></div>	
						<input type="text" name="isbn" size="20" maxlength="30" />
					</td>
				</tr>
				<tr>
					<td>Número de páginas:</td>
					<td>
						<div id='myform_dni_errorloc' class="error_strings"></div>	
						<input type="text" name="numPaginas" size="20" maxlength="30" />
					</td>
				</tr>
				<tr>
					<td>Descripción:</td>
					<td>
						<div id='myform_descripcion_errorloc' class="error_strings"></div>	
						<textarea name="descripcion" cols="40"></textarea><br />					
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
						<input type="submit" name="alta" value="Alta">
					</td>						
				</tr>	
			</table>
			<!--<script language="JavaScript" src="./modulolibros/js/valAlta.js" type="text/javascript" xml:space="preserve"></script> -->
		</form>
	</body>
</html>