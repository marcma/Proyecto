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
				
			$consulta = "select usuario,codLibro,fechaPrestamo from prestamo where usuario='".$usuario."'";
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