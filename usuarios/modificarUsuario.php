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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Modificacion de encuestas</title>
	</head>
	<body>
		<?php
			if( (isset($_GET['id'])===false )&&(isset($_POST['modifica'])===false ) ) {
			try{
				@ $db = new mysqli('localhost', 'root', 'root1');
				if (mysqli_connect_errno() != 0)
					throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
				
				$db->select_db('Bibliotecaa');
				if ($db->errno != 0)
					throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
					
				$consulta = "select usuario,password,nombre,apellido1,apellido2,edad,direccion,telefono,dni,email,tipo from usuarios";
				$resultado = $db->query($consulta);
				if ($db->errno != 0)
					throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
				assert($resultado !== false);
				
				if ($resultado->num_rows > 0){
						echo '<table border="6">';
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
							echo'<tr>';
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
								echo'<td align="center">'.'<a href="'. $_SERVER['PHP_SELF'].'?id='.$obj->usuario .
																							'&pass='.$obj->password .
																							'&nombre='.$obj->nombre .
																							'&apellido1='.$obj->apellido1 .
																							'&apellido2='.$obj->apellido2 .
																							'&edad='.$obj->edad .
																							'&direccion='.$obj->direccion .
																							'&telefono='.$obj->telefono .
																							'&dni='.$obj->dni .
																							'&email='.$obj->email .
																							'&tipo='.$obj->tipo .
																							'">Modificar</a>'.'</td>';
							echo'</tr>';
						}
						echo'</table>';
					}
				else echo '<p>No hay datos que mostrar</p>';
				$resultado->free(); 
				$db->close(); 
			}catch (Exception $e){
				echo $e->getMessage();
				if (mysqli_connect_errno() == 0)
					$db->close();
				exit();
			}
			} else if( (isset($_GET['id'])===true )&&(isset($_POST['modifica'])===false ) ) {

		?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<TABLE>
				<TR>
					<TD>Usuario:</TD>
					<TD><INPUT TYPE="text" NAME="usuario" SIZE="20" MAXLENGTH="30" value="<?php echo $_GET['id'] ?>" readonly></TD>
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
			</TABLE>
			<INPUT TYPE="submit" NAME="modifica" VALUE="Modifica">
		</FORM>
		<?php
		} else { 
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
			
			$consulta = "update usuarios set password='".$password."',nombre='".$nombre."',apellido1='".$apellido1."',apellido2='".$apellido2."',edad='".$edad."',direccion='".$direccion."',telefono='".$telefono."',dni='".$dni."',email='".$email."',tipo='".$tipo."' where usuario='".$usuario."'";
			if ($db->query($consulta) === false)
				throw new ExcepcionEnTransaccion();
			$db->commit();
			
			$consulta = "select usuario,password,nombre,apellido1,apellido2,edad,direccion,telefono,dni,email,tipo from usuarios";
			$resultado = $db->query($consulta);
			if ($db->errno != 0)
				throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
			assert($resultado !== false);

			if ($resultado->num_rows > 0){
					echo '<table border="6">';
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
						echo'<tr>';
						echo'<td align="center">'.$obj->usuario.'</td>';
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
					echo'</table>';
				}
			else echo '<p>No hay datos que mostrar</p>';
			?>
			<p>[<a href="<?php echo $_SERVER['PHP_SELF'] ?>">Nueva modificacion</a>]</p>
			<?php
			$resultado->free(); 
			$db->close(); 
		}	catch (ExcepcionEnTransaccion $e){
				echo 'No se ha podido realizar la modificacion';
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