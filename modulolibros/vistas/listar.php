<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<table border="6" id="alta">
			<tr>
				<th>Código libro</th>
				<th>Título</th>
				<th>Nombre autor</th>
				<th>Primer apellido autor</th>
				<th>Segundo apellido autor</th>
				<th>Tema</th>
				<th>Unidades</th>
				<th>ISBN</th>
				<th>Número de páginas</th>
				<th>Descripción</th>					
			</tr>
			<?php while ($obj = $libros->fetch_object()){		
					LimpiaResultados($obj);
			?>
				<tr class="impar color">
					<td align="center"><?php echo $obj->codLibro?></td>
					<td align="center"><?php echo $obj->titulo?></td>
					<td align="center"><?php echo $obj->nombreAutor?></td>
					<td align="center"><?php echo $obj->apellido1Autor?></td>
					<td align="center"><?php echo $obj->apellido2Autor?></td>
					<td align="center"><?php echo $obj->tema?></td>
					<td align="center"><?php echo $obj->unidades?></td>
					<td align="center"><?php echo $obj->isbn?></td>
					<td align="center"><?php echo $obj->numPaginas?></td>
					<td align="center"><?php echo $obj->descripcion?></td>						
				</tr>
						
				<?php if ($obj = $libros->fetch_object()){		
				?>
					<tr class="par color">
						<td align="center"><?php echo $obj->codLibro?></td>
						<td align="center"><?php echo $obj->titulo?></td>
						<td align="center"><?php echo $obj->nombreAutor?></td>
						<td align="center"><?php echo $obj->apellido1Autor?></td>
						<td align="center"><?php echo $obj->apellido2Autor?></td>
						<td align="center"><?php echo $obj->tema?></td>
						<td align="center"><?php echo $obj->unidades?></td>
						<td align="center"><?php echo $obj->isbn?></td>
						<td align="center"><?php echo $obj->numPaginas?></td>
						<td align="center"><?php echo $obj->descripcion?></td>							
					</tr>
				<?php } ?>	

			<?php } ?>
			
		</table>
	</body>
</html>

