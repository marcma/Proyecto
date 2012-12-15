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
		<script language="JavaScript" src="./javaScripts/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
		<script type="text/javascript" src="./javaScripts/nicEdit-latest.js"></script> <script type="text/javascript">
			bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });			
		</script>
	</head>	
	<body>
	<?php while ($obj = $libros->fetch_object()){		
					LimpiaResultados($obj);
	?>
		<form action="./modulolibros/controladores/librosControlador.php" method="get" name="myform" id="myform" cellspacing="2" cellpadding="2">
			<table align="center">
				<tr>					
					<td>Código libro:</td>
					<td>
						<div id='myform_idd_errorloc' class="error_strings"></div>
						<INPUT TYPE="text" NAME="idd" SIZE="20" MAXLENGTH="30" value="<?php echo $obj->codLibro?>" readonly />
					</td>
				</tr>
				<tr>
					<td>Título:</td>								
					<td>
						<div id='myform_pass_errorloc' class="error_strings"></div>	
						<input type="text" name="titulo" size="20" maxlength="30" value="<?php echo $obj->titulo?>" />
					</td>
				</tr>
				<tr>					
					<td>Nombre autor:</td>					
					<td>
						<div id='myform_nombre_errorloc' class="error_strings"></div>
						<input type="text" name="nombreAutor" size="20" maxlength="30" value="<?php echo $obj->nombreAutor?>" />
					</td>
				</tr>
				<tr>
					<td>Primer apellido autor:</td>						
					<td>
						<div id='myform_apellido1_errorloc' class="error_strings"></div>
						<input type="text" name="apellido1Autor" size="20" maxlength="30" value="<?php echo $obj->apellido1Autor?>" />
					</td>
				</tr>
				<tr>
					<td>Segundo apellido autor:</td>				
					<td>
						<div id='myform_apellido2_errorloc' class="error_strings"></div>
						<input type="text" name="apellido2Autor" size="20" maxlength="30" value="<?php echo $obj->apellido2Autor?>" />
					</td>
				</tr>
				<tr>
					<td>Tema:</td>			
					<td>
						<div id='myform_edad_errorloc' class="error_strings"></div>	
						<input type="text" name="tema" size="20" maxlength="30" value="<?php echo $obj->tema?>" />
					</td>
				</tr>
				<tr>
					<td>Unidades:</td>				
					<td>
						<div id='myform_direccion_errorloc' class="error_strings"></div>	
						<input type="text" name="unidades" size="20" maxlength="30" value="<?php echo $obj->unidades?>" />
					</td>
				</tr>
				<tr>
					<td><?php /*echo utf8_encode('Teléfono:') */?> ISBN:</td>				
					<td>
						<div id='myform_telefono_errorloc' class="error_strings"></div>	
						<input type="text" name="isbn" size="20" maxlength="30" value="<?php echo $obj->isbn?>" />
					</td>
				</tr>
				<tr>
					<td>Número de páginas:</td>
					<td>
					<div id='myform_dni_errorloc' class="error_strings"></div>	
						<input type="text" name="numPaginas" size="20" maxlength="30" value="<?php echo $obj->numPaginas?>" />
					</td>
				</tr>
				<tr>
					<td>Descripción:</td>
					<td>
						<div id='myform_descripcion_errorloc' class="error_strings"></div>	
						<textarea name="descripcion" value="<?php echo $obj->descripcion?>" cols="40"></textarea><br />					
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
			<!--<script language="JavaScript" src="./modulolibros/js/valModificar.js" type="text/javascript" xml:space="preserve"></script> -->
		</form>
		<?php } ?>
	</body>	
</html>	