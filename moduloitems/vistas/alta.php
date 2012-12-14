<!DOCtype HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<script language="javascript" src="../../Proyecto MVC/moduloitems/js/valida_alta_items.js" type="text/javascript"></script>
		<title>Alta encuestas</title>
	</head>
	<body>
	<form action="../../Proyecto MVC/moduloitems/controladores/itemsControlador.php" method="POST" onSubmit="return valida()" name="formulario">
		<table>
			<tr>
				<td>Usuario:</td>
				<td><input type="text" name="usuario" size="20" maxlength="30"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="text" name="password" size="20" maxlength="30"></td>
			</tr>
			<tr>
				<td>Nombre:</td>
				<td><input type="text" name="nombre" size="20" maxlength="30"></td>
			</tr>
			<tr>
				<td>Primer apellido:</td>
				<td><input type="text" name="apellido1" size="20" maxlength="30"></td>
			</tr>
			<tr>
				<td>Segundo apellido:</td>
				<td><input type="text" name="apellido2" size="20" maxlength="30"></td>
			</tr>
			<tr>
				<td>Edad:</td>
				<td><input type="text" name="edad" size="20" maxlength="30"></td>
			</tr>		
			<tr>
				<td>Dirección:</td>
				<td><input type="text" name="direccion" size="20" maxlength="30"></td>
			</tr>
			<tr>
				<td><?php /*echo utf8_encode('Teléfono:') */?> Teléfono:</td>
				<td><input type="text" name="telefono" size="20" maxlength="30"></td>
			</tr>
			<tr>
				<td>Dni:</td>
				<td><input type="text" name="dni" size="20" maxlength="30"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" size="20" maxlength="30"></td>
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
		</table>
			<input type="submit" name="alta" value="Alta">
	</form>
	</body>
</html>