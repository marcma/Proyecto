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
			if( (isset($_GET['id'])===false )&& (isset($_POST['modifica'])===false ) ) {
			try{
				@ $db = new mysqli('localhost', 'root', 'root1');
				if (mysqli_connect_errno() != 0)
					throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
				
				$db->select_db('Bibliotecaa');
				if ($db->errno != 0)
					throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
					
				$consulta = "select codLibro,titulo,nombreAutor,apellido1Autor,apellido2Autor,tema,unidades,isbn,numPaginas from libros";
				$resultado = $db->query($consulta);
				if ($db->errno != 0)
					throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
				assert($resultado !== false);
				
				if ($resultado->num_rows > 0){
						echo '<table border="6">';
						echo'<tr>';
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
								echo'<td align="center">'.'<a href="'. $_SERVER['PHP_SELF'].'?id='.$obj->codLibro .
																							'&tit='.$obj->titulo .
																							'&nombreA='.$obj->nombreAutor .
																							'&apellido1='.$obj->apellido1Autor .
																							'&apellido2='.$obj->apellido2Autor .
																							'&tema='.$obj->tema .
																							'&unidades='.$obj->unidades .
																							'&isbn='.$obj->isbn .
																							'&numPaginas='.$obj->numPaginas .
																							'" >Modificar</a>'.'</td>';
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
				<tr>
					<td>Código libro:</td>
					<td><input type="text" name="codLibro" size="20" maxlength="30" value="<?php echo $_GET['id'] ?>" readonly></td>
				</tr>
				<tr>
					<td>Título:</td>
					<td><input type="text" name="titulo" size="20" maxlength="30" value="<?php echo $_GET['tit'] ?>"></td>
				</tr>
				<tr>
					<td>Nombre autor:</td>
					<td><input type="text" name="nombreAutor" size="20" maxlength="30" value="<?php echo $_GET['nombreA'] ?>"></td>
				</tr>
				<tr>
					<td>Primer apellido autor:</td>
					<td><input type="text" name="apellido1Autor" size="20" maxlength="30" value="<?php echo $_GET['apellido1'] ?>"></td>
				</tr>		
				<tr>
					<td>Segundo apellido autor:</td>
					<td><input type="text" name="apellido2Autor" size="20" maxlength="30" value="<?php echo $_GET['apellido2'] ?>"></td>
				</tr>
				<tr>
					<td>Tema:</td>
					<td><input type="text" name="tema" size="20" maxlength="30" value="<?php echo $_GET['tema'] ?>"></td>
				</tr>
				<tr>
					<td>Unidades:</td>
					<td><input type="text" name="unidades" size="20" maxlength="30" value="<?php echo $_GET['unidades'] ?>"></td>
				</tr>		
				<tr>
					<td>ISBN:</td>
					<td><input type="text" name="isbn" size="20" maxlength="30" value="<?php echo $_GET['isbn'] ?>"></td>
				</tr>
				<tr>
					<td>Número de páginas:</td>
					<td><input type="text" name="numPaginas" size="20" maxlength="30" value="<?php echo $_GET['numPaginas'] ?>"></td>
				</tr>								
			</TABLE>
			<INPUT TYPE="submit" NAME="modifica" VALUE="Modifica">
		</FORM>
		<?php
		} else { 
			$codLibro=$_POST['codLibro'];
			$titulo=$_POST['titulo'];	
			$nombreAutor=$_POST['nombreAutor'];
			$apellido1Autor=$_POST['apellido1Autor'];
			$apellido2Autor=$_POST['apellido2Autor'];
			$tema=$_POST['tema'];
			$unidades=$_POST['unidades'];
			$isbn=$_POST['isbn'];
			$numPaginas=$_POST['numPaginas'];

			try{
				@ $db = new mysqli('localhost', 'root', 'root1');
				if (mysqli_connect_errno() != 0)
					throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
				
				$db->select_db('Bibliotecaa');
				if ($db->errno != 0)
					throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
				
				$consulta = "update libros set titulo='".$titulo."',nombreAutor='".$nombreAutor."',apellido1Autor='".$apellido1Autor."',apellido2Autor='".$apellido2Autor."',tema='".$tema."',unidades='".$unidades."',isbn='".$isbn."',numPaginas='".$numPaginas."' where codLibro='".$codLibro."'";
				if ($db->query($consulta) === false)
					throw new ExcepcionEnTransaccion();
				$db->commit();
				
				$consulta = "select codLibro,titulo,nombreAutor,apellido1Autor,apellido2Autor,tema,unidades,isbn,numPaginas from libros";
				$resultado = $db->query($consulta);
				if ($db->errno != 0)
					throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
				assert($resultado !== false);

				if ($resultado->num_rows > 0){
						echo '<table border="6">';
						echo'<tr>';
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
				else echo '<p>No hay datos que mostrar</p>';
				?>
				<p>[<a href="<?php echo $_SERVER['PHP_SELF'] ?>">Nueva modificacion</a>]</p>
				<?php
				$resultado->free(); 
				$db->close(); 
			}catch(ExcepcionEnTransaccion $e){
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