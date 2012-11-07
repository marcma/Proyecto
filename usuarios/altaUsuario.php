<?php 
require('../aspecto/libreria.inc');
dibuja();
function LimpiaResultados($objeto){
	foreach ($objeto as $atributo => $valor)
		if(is_string($objeto->$atributo) === true)
			$objeto->$atributo = stripslashes($objeto->$atributo);
}
class ExcepcionEnTransaccion extends Exception{
	public function __construct(){}
}
?>

<!DOCtype HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Alta encuestas</title>
	</head>
	<body>
	<?php
	if (isset($_POST['alta'])===false) {
	?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
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
			<td>Teléfono:</td>
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
	<?php
	}else { 
	
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];	
	$nombre=$_POST['nombre'];
	$apellido1=$_POST['apellido1'];
	$apellido2=$_POST['apellido2'];
	$edad=$_POST['edad'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$dni=$_POST['dni'];
	$email=$_POST['email'];		
	$tipo=$_POST['tipo'];	

	try{
		@ $db = new mysqli('localhost', 'root', 'root1');
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
		
		$db->select_db('Bibliotecaa');
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
		
		$consulta = "insert into usuarios (usuario,password,nombre,apellido1,apellido2,edad,direccion,telefono,dni,email,tipo) values ('$usuario','$password','$nombre','$apellido1','$apellido2',$telefono,'$direccion',$telefono,'$dni','$email','$tipo')";
				
		if ($db->query($consulta) === false)
			throw new ExcepcionEnTransaccion();
		$db->commit();
		
		$consulta = "select usuario,password,nombre,apellido1,apellido2,edad,direccion,telefono,dni,email,tipo from usuarios";
		$resultado = $db->query($consulta);
		if ($db->errno != 0)
			throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
		assert($resultado !== false);

		if ($resultado->num_rows > 0){
				echo '<table border="6" id="alta">';
				echo'<tr>';
					echo'<th>Usuario</th>';
					echo'<th>Password</th>';
					echo'<th>Nombre</th>';
					echo'<th>Apellido1</th>';
					echo'<th>Apellido2</th>';
					echo'<th>Edad</th>';
					echo'<th>Direccion</th>';
					echo'<th>Telefono</th>';
					echo'<th>Dni</th>';
					echo'<th>Email</th>';					
					echo'<th>Tipo</th>';
				echo'</tr>';
				while ($obj = $resultado->fetch_object()){
					LimpiaResultados($obj);

					echo'<tr class="impar">';
						echo'<td align="center">'.$obj->usuario.'</td>';
						echo'<td align="center">'.$obj->password.'</td>';
						echo'<td align="center">'.$obj->nombre.'</td>';
						echo'<td align="center">'.$obj->apellido1.'</td>';
						echo'<td align="center">'.$obj->apellido2.'</td>';
						echo'<td align="center">'.$obj->edad.'</td>';
						echo'<td align="center">'.$obj->direccion.'</td>';
						echo'<td align="center">'.$obj->telefono.'</td>';
						echo'<td align="center">'.$obj->dni.'</td>';
						echo'<td align="center">'.$obj->email.'</td>';						
						echo'<td align="center">'.$obj->tipo.'</td>';
					echo'</tr>';
					
					if($obj = $resultado->fetch_object()){
						echo'<tr class="par">';
							echo'<td align="center">'.$obj->usuario.'</td>';
							echo'<td align="center">'.$obj->password.'</td>';
							echo'<td align="center">'.$obj->nombre.'</td>';
							echo'<td align="center">'.$obj->apellido1.'</td>';
							echo'<td align="center">'.$obj->apellido2.'</td>';
							echo'<td align="center">'.$obj->edad.'</td>';
							echo'<td align="center">'.$obj->direccion.'</td>';
							echo'<td align="center">'.$obj->telefono.'</td>';
							echo'<td align="center">'.$obj->dni.'</td>';
							echo'<td align="center">'.$obj->email.'</td>';							
							echo'<td align="center">'.$obj->tipo.'</td>';
						echo'</tr>';
					}					
				}
				echo'</table>';
			}
		else echo '<p>No hay datos que mostrar</p>';
		?>
		<p>[<a href="<?php echo $_SERVER['PHP_SELF'] ?>">Nueva alta</a>]</p>
		<?php
		$resultado->free(); 
		$db->close(); 
	}catch (ExcepcionEnTransaccion $e){
		echo 'No se ha podido realizar al alta';
		$db->rollback();
		$db->close();
	}catch (Exception $e){
		echo $e->getMessage();
		if (mysqli_connect_errno() == 0)
			$db->close();
		exit();
	}
	}
	include('../aspecto/pie.html');
	?>
	</body>
</html>
