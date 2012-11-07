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
					<option value="tituto" >Titulo</option>	
					<option value="nombreAutor" >Nombre autor</option>	
					<option value="apellido1Autor" >Primer apellido autor</option>	
					<option value="apellido2Autor" >segundo apellido autor</option>
					<option value="tema" >Tema</option>
					<option value="numPaginas" >Número de páginas</option>
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
					
				$consulta = "select codLibro,titulo,nombreAutor,apellido1Autor,apellido2Autor,tema,unidades,isbn,numPaginas from libros order by ".$criterio_ord;
				$resultado = $db->query($consulta);
				if ($db->errno != 0)
					throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
				assert($resultado !== false);

				if ($resultado->num_rows > 0){
						echo '<table border="1">';
							echo'<th>Código libro</th>';
							echo'<th>Título</th>';
							echo'<th>Nombre autor</th>';
							echo'<th>Primer apellido autor</th>';
							echo'<th>Segundo apellido autor</th>';
							echo'<th>Tema</th>';
							echo'<th>Unidades</th>';
							echo'<th>ISBN</th>';
							echo'<th>Número de páginas</th>';
						echo'</tr>';
						while ($obj = $resultado->fetch_object()){
							LimpiaResultados($obj);
							echo'<tr>';
								echo'<td align="center">'.$obj->codLibro.'</td>';
								echo'<td align="center">'.$obj->titulo.'</td>';
								echo'<td align="center">'.$obj->nombreAutor.'</td>';
								echo'<td align="center">'.$obj->apellido1Autor.'</td>';
								echo'<td align="center">'.$obj->apellido2Autor.'</td>';
								echo'<td align="center">'.$obj->tema.'</td>';
								echo'<td align="center">'.$obj->unidades.'</td>';
								echo'<td align="center">'.$obj->isbn.'</td>';
								echo'<td align="center">'.$obj->numPaginas.'</td>';
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
