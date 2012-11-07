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
		<title>Buscar usuario</title>
	</head>
	<body>
		<?php
		if (isset($_POST['busca'])===false) {
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<TABLE>
				<TR>
					<TD>Usuario:</TD>
					<TD><INPUT TYPE="text" NAME="usuario" SIZE="20" MAXLENGTH="30"></TD>
				</TR>
			</TABLE>
			<INPUT TYPE="submit" NAME="busca" VALUE="Busca">
		</FORM>
		<?php
	} else {
		$usuario=$_POST['usuario']; 
		try{
			@ $db = new mysqli('localhost', 'root', 'root1');
			if (mysqli_connect_errno() != 0)
				throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
			
			$db->select_db('Bibliotecaa');
			if ($db->errno != 0)
				throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
				
			$consulta = "select usuario,password,nombre,apellido1,apellido2,direccion,edad,telefono,dni,email,tipo from usuarios where usuario='".$usuario."'";
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
						echo'</tr>';
					}
					echo'</table>';
				}
			else
					echo '<p>No hay datos que mostrar</p>';
			?>
			<p>[<a href="<?php echo $_SERVER['PHP_SELF'] ?>">Nueva busqueda</a>]</p>
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