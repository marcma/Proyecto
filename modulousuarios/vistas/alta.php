<!DOCtype HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<script language="JavaScript" src="./javaScripts/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
		<title>Alta usuarios</title>
	</head>
	<body>
		<div class="contenedor">
			<div class="nombreSeccion">
				<h1>Alta usuarios</h1>
			</div>
			<div class="cuerpo">
				<form action="./modulousuarios/controladores/usuariosControlador.php" name="myform" id="myform" cellspacing="2" cellpadding="2" method="POST">
					<table class="letras">				
						<tr>					
							<td >Usuario:</td>
							<td>
								<div id='myform_usuario_errorloc' class="error_strings"></div>
								<input type="text" name="usuario" size="20" maxlength="45" />								
							</td>
						</tr>
						<tr>
							<td >Password:</td>								
							<td>
								<div id='myform_password_errorloc' class="error_strings"></div>	
								<input type="password" name="password" size="20" maxlength="45" />
							</td>
						</tr>
						<tr>					
							<td>Nombre:</td>					
							<td>
								<div id='myform_nombre_errorloc' class="error_strings"></div>
								<input type="text" name="nombre" size="20" maxlength="45" />
							</td>
						</tr>
						<tr>
							<td>Primer apellido:</td>						
							<td>
								<div id='myform_apellido1_errorloc' class="error_strings"></div>
								<input type="text" name="apellido1" size="20" maxlength="45" />
							</td>
						</tr>
						<tr>
							<td>Segundo apellido:</td>				
							<td>
								<div id='myform_apellido2_errorloc' class="error_strings"></div>
								<input type="text" name="apellido2" size="20" maxlength="45" />
							</td>
						</tr>
						<tr>
							<td>Edad:</td>			
							<td>
								<div id='myform_edad_errorloc' class="error_strings"></div>	
								<input type="text" name="edad" size="20" maxlength="45" />
							</td>
						</tr>		
						<tr>
							<td>Dirección:</td>				
							<td>
								<div id='myform_direccion_errorloc' class="error_strings"></div>	
								<input type="text" name="direccion" size="20" maxlength="45" />
							</td>
						</tr>
						<tr>
							<td><?php /*echo utf8_encode('Teléfono:') */?> Teléfono:</td>				
							<td>
								<div id='myform_telefono_errorloc' class="error_strings"></div>	
								<input type="text" name="telefono" size="20" maxlength="45" />
							</td>
						</tr>
						<tr>
							<td>Dni:</td>
							<td>
							<div id='myform_dni_errorloc' class="error_strings"></div>	
								<input type="text" name="dni" size="20" maxlength="45" />
							</td>
						</tr>
						<tr>					
							<td>Email:</td>				
							<td>
								<div id='myform_email_errorloc' class="error_strings"></div>
								<input type="text" name="email" size="20" maxlength="45" />
							</td>
						</tr>
						<tr>					
							<td>Repite tu email:</td>				
							<td>
								<div id='myform_confemail_errorloc' class="error_strings"></div>
								<input type="text" name="confemail" size="20" maxlength="45" />
							</td>
						</tr>				
						<tr>
							<td>Tipo de usuario:</td>
							<td><select name="tipo">
									<option value="cliente" selected="selected">Cliente</option>
									<option value="administrador">Administrador</option>
									<option value="empleado">Empleado</option>
								</select>
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
								<input type="submit" name="alta" value="Alta" />
							</td>						
						</tr>	
					</table>
					<script language="JavaScript" src="./modulousuarios/js/valAlta.js" type="text/javascript" xml:space="preserve"></script>
				</form>
			</div>	
		</div>
	</body>	
</html>