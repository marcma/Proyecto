<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<table border="6" id="alta">
			<tr>
				<th>Usuario</th>
				<th>Password</th>
				<th>Nombre</th>
				<th>Apellido1</th>
				<th>Apellido2</th>
				<th>Edad</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Dni</th>
				<th>Email</th>					
				<th>Tipo</th>		
			</tr>
			<?php while ($obj = $items->fetch_object()){		
					LimpiaResultados($obj);
			?>
				<tr class="impar color">
					<td align="center"><?php echo $obj->usuario?></td>
					<td align="center"><?php echo $obj->password?></td>
					<td align="center"><?php echo $obj->nombre?></td>
					<td align="center"><?php echo $obj->apellido1?></td>
					<td align="center"><?php echo $obj->apellido2?></td>
					<td align="center"><?php echo $obj->edad?></td>
					<td align="center"><?php echo $obj->direccion?></td>
					<td align="center"><?php echo $obj->telefono?></td>
					<td align="center"><?php echo $obj->dni?></td>
					<td align="center"><?php echo $obj->email?></td>						
					<td align="center"><?php echo $obj->tipo?></td>		
				</tr>
						
				<?php if ($obj = $items->fetch_object()){		
				?>
					<tr class="par color">
						<td align="center"><?php echo $obj->usuario?></td>
						<td align="center"><?php echo $obj->password?></td>
						<td align="center"><?php echo $obj->nombre?></td>
						<td align="center"><?php echo $obj->apellido1?></td>
						<td align="center"><?php echo $obj->apellido2?></td>
						<td align="center"><?php echo $obj->edad?></td>
						<td align="center"><?php echo $obj->direccion?></td>
						<td align="center"><?php echo $obj->telefono?></td>
						<td align="center"><?php echo $obj->dni?></td>
						<td align="center"><?php echo $obj->email?></td>						
						<td align="center"><?php echo $obj->tipo?></td>		
					</tr>
				<?php } ?>	

			<?php } ?>
			
		</table>
	</body>
</html>

