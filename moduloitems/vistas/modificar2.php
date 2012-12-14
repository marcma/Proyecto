<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Modificacion de usuarios</title>
		<script> </script>
	</head>	
	<body>
	<?php while ($obj = $items->fetch_object()){		
					LimpiaResultados($obj);
			?>
		<form action="../controladores/itemsControlador.php" method="get">
			<TABLE align="center">
				<TR>
					<TD>Usuario:</TD>
					<TD><INPUT TYPE="text" NAME="usuario" SIZE="20" MAXLENGTH="30" value="<?php echo $obj->usuario?>" readonly></TD>
				</TR>
				<tr>
					<td>Password:</td>
					<td><input type="text" name="password" size="20" maxlength="30" value="<?php echo $_GET['pass'] ?>"></td>
				</tr>
				<tr>
					<td>Nombre:</td>
					<td><input type="text" name="nombre" size="20" maxlength="30" value="<?php echo $_GET['nombre'] ?>"></td>
				</tr>
				<tr>
					<td>Primer apellido:</td>
					<td><input type="text" name="apellido1" size="20" maxlength="30" value="<?php echo $_GET['apellido1'] ?>"></td>
				</tr>
				<tr>
					<td>Segundo apellido:</td>
					<td><input type="text" name="apellido2" size="20" maxlength="30" value="<?php echo $_GET['apellido2'] ?>"></td>
				</tr>
				<tr>
					<td>Edad:</td>
					<td><input type="text" name="edad" size="20" maxlength="30" value="<?php echo $_GET['edad'] ?>"></td>
				</tr>				
				<tr>
					<td>Dirección:</td>
					<td><input type="text" name="direccion" size="20" maxlength="30" value="<?php echo $_GET['direccion'] ?>"></td>
				</tr>
				<tr>
					<td>Teléfono:</td>
					<td><input type="text" name="telefono" size="20" maxlength="30" value="<?php echo $_GET['telefono'] ?>"></td>
				</tr>
				<tr>
					<td>Dni:</td>
					<td><input type="text" name="dni" size="20" maxlength="30" value="<?php echo $_GET['dni'] ?>"></td>
				</tr>	
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" size="20" maxlength="30" value="<?php echo $_GET['email'] ?>"></td>
				</tr>				
				<tr>
					<td>Tipo de usuario:</td>
					<td><select name="tipo">
							<option value="cliente" <?php if($_GET['tipo'] === "cliente" ){ echo "selected"; } ?> >Cliente</option>
							<option value="administrador" <?php if($_GET['tipo'] === "administrador" ){ echo "selected"; } ?> >Administrador</option>
							<option value="empleado" <?php if($_GET['tipo'] === "empleado" ){ echo "selected"; } ?> >Empleado</option>
						</select>
					</td>
				</tr>
				<TR>
					<TD colspan="2">
						<INPUT TYPE="submit" NAME="modifica" VALUE="Modifica">
					</TD>
				</TR>				
			</TABLE>

		</form>
		<?php } ?>
	</body>	
</html>	