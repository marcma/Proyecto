<?php 
require('../aspecto/libreria.inc');
dibuja();
function LimpiaResultados($objeto){
	foreach ($objeto as $atributo => $valor)
		if(is_string($objeto->$atributo) === true)
			$objeto->$atributo = stripslashes($objeto->$atributo);
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Ordenar encuestas</title>
	</head>
	<body>
		<?php
		if (isset($_GET['ordena'])===false) {
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
			<p>Ordena por: 
			<select name="criterio_ord">
					<option value="nombre" >Nombre</option>	
					<option value="apellido1" >Primer apellido</option>	
					<option value="apellido2" >Segundo apellido</option>	
					<option value="edad" >Edad</option>
					<option value="tipo" >Tipo usuario</option>	
			</select>
			</p>
			<INPUT TYPE="submit" NAME="ordena" VALUE="Ordena">
		</FORM>
		<?php
		} else {
		$criterio_ord=$_GET['criterio_ord']; 
			try{
				@ $db = new mysqli('localhost', 'root', 'root1');
				if (mysqli_connect_errno() != 0)
					throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
				
				$db->select_db('Bibliotecaa');
				if ($db->errno != 0)
					throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
					
				$consulta = "select usuario,password,nombre,apellido1,apellido2,direccion,edad,telefono,dni,email,tipo from usuarios order by ".$criterio_ord;
				$resultado = $db->query($consulta);
				if ($db->errno != 0)
					throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
				assert($resultado !== false);

				if ($resultado->num_rows > 0){
						echo '<table border="1">';
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
							echo'</tr>';
						}
						echo'</table>';
					}
				else
						echo '<p>No hay datos que mostrar</p>';
				?>
				<p>[<a href="<?php echo $_SERVER['PHP_SELF'] ?>">Nueva ordenacion</a>]</p>
				<?php
				$resultado->free(); 
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
