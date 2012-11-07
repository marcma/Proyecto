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
					
				$consulta = "select usuario,codLibro,fechaPrestamo from prestamo";
				$resultado = $db->query($consulta);
				if ($db->errno != 0)
					throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
				assert($resultado !== false);
				
				if ($resultado->num_rows > 0){
						echo '<table border="6">';
						echo'<tr>';
							echo'<th>Usuario</th>';
							echo'<th>código libro</th>';
							echo'<th>Fecha de prestamo</th>';
						echo'</tr>';
						while ($obj = $resultado->fetch_object()){
							LimpiaResultados($obj);
							echo'<tr>';
								echo'<td align="center">'.$obj->usuario.'</td>';
								echo'<td align="center">'.$obj->codLibro.'</td>';
								echo'<td align="center">'.$obj->fechaPrestamo.'</td>';
								echo'<td align="center">'.'<a href="'. $_SERVER['PHP_SELF'].'?id='.$obj->usuario .
																							'&codLibro='.$obj->codLibro .
																							'&fechaPrestamo='.$obj->fechaPrestamo .																							
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
					<td>Código del libro:</td>
					<td><input type="text" name="codLibro" size="20" maxlength="30" value="<?php echo $_GET['codLibro'] ?>"></td>
				</tr>
				<tr>
					<td>Fecha prestamo:</td>
					<td><input type="text" name="fechaPrestamo" size="20" maxlength="30" value="<?php echo $_GET['fechaPrestamo'] ?>"></td>
				</tr>								
			</TABLE>
			<INPUT TYPE="submit" NAME="modifica" VALUE="Modifica">
		</FORM>
		<?php
		} else { 
			$usuario=$_POST['usuario'];
			$codLibro=$_POST['codLibro'];	
			$fechaPrestamo=$_POST['fechaPrestamo'];

		try{
			@ $db = new mysqli('localhost', 'root', 'root1');
			if (mysqli_connect_errno() != 0)
				throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
			
			$db->select_db('Bibliotecaa');
			if ($db->errno != 0)
				throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
			
			$consulta = "update prestamo set usuario='".$usuario."',codLibro='".$codLibro."',fechaPrestamo='".$fechaPrestamo."' where usuario='".$usuario."'";
			if ($db->query($consulta) === false)
				throw new ExcepcionEnTransaccion();
			$db->commit();
			
			$consulta = "select usuario,codLibro,fechaPrestamo from prestamo";
			$resultado = $db->query($consulta);
			if ($db->errno != 0)
				throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
			assert($resultado !== false);

			if ($resultado->num_rows > 0){
					echo '<table border="6">';
					echo'<tr>';
						echo'<th>Usuario</th>';
						echo'<th>código libro</th>';
						echo'<th>Fecha de prestamo</th>';
					echo'</tr>';
					while ($obj = $resultado->fetch_object()){
						LimpiaResultados($obj);
						echo'<tr>';
						echo'<td align="center">'.$obj->usuario.'</td>';
							echo'<td align="center">'.$obj->usuario.'</td>';
							echo'<td align="center">'.$obj->codLibro.'</td>';
							echo'<td align="center">'.$obj->fechaPrestamo.'</td>';						
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