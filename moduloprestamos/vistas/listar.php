<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<div class="contenedor">
			<div class="nombreSeccion">
				<h1>lista prestamos</h1>
			</div>
			<div class="cuerpo">	
				<table border="6" id="alta">
					<tr>
						<th>Usuario</th>
						<th>Codigo libro</th>
						<th>Fecha prestamo</th>	
					</tr>
					<?php while ($obj = $items->fetch_object()){		
							LimpiaResultados($obj);
					?>
						<tr class="impar color">
							<td align="center"><?php echo $obj->usuario?></td>
							<td align="center"><?php echo $obj->codLibro?></td>
							<td align="center"><?php echo $obj->fechaPrestamo?></td>	
						</tr>
								
						<?php if ($obj = $items->fetch_object()){		
						?>
							<tr class="par color">
								<td align="center"><?php echo $obj->usuario?></td>
								<td align="center"><?php echo $obj->codLibro?></td>
								<td align="center"><?php echo $obj->fechaPrestamo?></td>	
							</tr>
						<?php } ?>	

					<?php } ?>
					
				</table>
			</div>
		</div>
	</body>
</html>

