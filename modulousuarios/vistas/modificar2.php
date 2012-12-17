<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Modificacion de usuarios</title>
		<script language="JavaScript" src="./javaScripts/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
	</head>	
	<body>
		<div class="contenedor">
			<div class="nombreSeccion">
				<h1>Modificar usuarios</h1>
			</div>
			<div class="cuerpo">
				<?php while ($obj = $items->fetch_object()){		
								LimpiaResultados($obj);
				?>
				<form action="./modulousuarios/controladores/usuariosControlador.php" method="get" name="myform" id="myform" cellspacing="2" cellpadding="2">
					<table align="center" class="letras">
						<tr>					
							<td>Usuario:</td>
							<td>
								<div id='myform_idd_errorloc' class="error_strings"></div>
								<INPUT TYPE="text" NAME="idd" SIZE="20" MAXLENGTH="30" value="<?php echo $obj->usuario?>" readonly />
							</td>
						</tr>
						<tr>
							<td>Password:</td>								
							<td>
								<div id='myform_pass_errorloc' class="error_strings"></div>	
								<input type="password" name="pass" size="20" maxlength="30" value="<?php echo $obj->password?>" />
							</td>
						</tr>
						<tr>					
							<td>Nombre:</td>					
							<td>
								<div id='myform_nombre_errorloc' class="error_strings"></div>
								<input type="text" name="nombre" size="20" maxlength="30" value="<?php echo $obj->nombre?>" />
							</td>
						</tr>
						<tr>
							<td>Primer apellido:</td>						
							<td>
								<div id='myform_apellido1_errorloc' class="error_strings"></div>
								<input type="text" name="apellido1" size="20" maxlength="30" value="<?php echo $obj->apellido1?>" />
							</td>
						</tr>
						<tr>
							<td>Segundo apellido:</td>				
							<td>
								<div id='myform_apellido2_errorloc' class="error_strings"></div>
								<input type="text" name="apellido2" size="20" maxlength="30" value="<?php echo $obj->apellido2?>" />
							</td>
						</tr>
						<tr>
							<td>Edad:</td>			
							<td>
								<div id='myform_edad_errorloc' class="error_strings"></div>	
								<input type="text" name="edad" size="20" maxlength="30" value="<?php echo $obj->edad?>" />
							</td>
						</tr>
						<tr>
							<td>Dirección:</td>				
							<td>
								<div id='myform_direccion_errorloc' class="error_strings"></div>	
								<input type="text" name="direccion" size="20" maxlength="30" value="<?php echo $obj->direccion?>" />
							</td>
						</tr>
						<tr>
							<td><?php /*echo utf8_encode('Teléfono:') */?> Teléfono:</td>				
							<td>
								<div id='myform_telefono_errorloc' class="error_strings"></div>	
								<input type="text" name="telefono" size="20" maxlength="30" value="<?php echo $obj->telefono?>" />
							</td>
						</tr>
						<tr>
							<td>Dni:</td>
							<td>
							<div id='myform_dni_errorloc' class="error_strings"></div>	
								<input type="text" name="dni" size="20" maxlength="30" value="<?php echo $obj->dni?>" />
							</td>
						</tr>
						<tr>					
							<td>Email:</td>				
							<td>
								<div id='myform_email_errorloc' class="error_strings"></div>
								<input type="text" name="email" size="20" maxlength="30" value="<?php echo $obj->email?>" />
							</td>
						</tr>
						<tr>					
							<td>Repite tu email:</td>				
							<td>
								<div id='myform_confemail_errorloc' class="error_strings"></div>
								<input type="text" name="confemail" size="20" maxlength="30" />
							</td>
						</tr>								
						<tr>
							<td>Tipo de usuario:</td>
							<td><select name="tipo">
									<option value="cliente"  <?php if($obj->tipo === "cliente" ){ echo "selected"; } ?> >Cliente</option>
									<option value="administrador" <?php if($obj->tipo  === "administrador" ){ echo "selected"; } ?> >Administrador</option>
									<option value="empleado" <?php if($obj->tipo  === "empleado" ){ echo "selected"; } ?> >Empleado</option>
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
								<input TYPE="submit" NAME="modifica" VALUE="Modifica" />
							</td>						
						</tr>								
					</table>
					<script language="JavaScript" src="./modulousuarios/js/valModificar.js" type="text/javascript" xml:space="preserve"></script>
				</form>
				<?php } ?>
			</div>
		</div>
	</body>	
</html>	