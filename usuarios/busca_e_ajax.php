<?php
function LimpiaResultados($objeto){
	foreach ($objeto as $atributo => $valor)
		if(is_string($objeto->$atributo) === true)
			$objeto->$atributo = stripslashes($objeto->$atributo);
}

$usuario=$_GET['usuario'];
if($usuario==="")//el us no introduce nada en el input
	$consulta = "select * from usuarios where usuario not LIKE '%'";
	//si el us no introduce nada en el input -> la consulta sería 
	//select id, textoPregunta from encuesta where id  LIKE '%' que muestra todos los registros de la tabla
	//queremos que si el us no introduce nada en el input, no mostraremos nada en ajax ->
	//select id, textoPregunta from encuesta where id not LIKE '%'
else
	$consulta = "select * from usuarios where usuario LIKE '".$usuario."%'";
$cadena="";
try{
	@ $db = new mysqli('localhost', 'root', 'root1');
	if (mysqli_connect_errno() != 0)
		throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
	
	$db->select_db('Bibliotecaa');
	if ($db->errno != 0)
		throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
		
	$resultado = $db->query($consulta);
	if ($db->errno != 0)
		throw new Exception('Error realizando consulta:'.$db->error, $db->errno);

	if ($resultado->num_rows > 0){
		$cadena.= '<table border="6" id="alta">';
			$cadena.='<tr>';
				$cadena.='<th>Usuario</th>';
				$cadena.='<th>Password</th>';
				$cadena.='<th>Nombre</th>';
				$cadena.='<th>Apellido1</th>';
				$cadena.='<th>Apellido2</th>';
				$cadena.='<th>Edad</th>';
				$cadena.='<th>Direccion</th>';
				$cadena.='<th>Telefono</th>';
				$cadena.='<th>Dni</th>';
				$cadena.='<th>Email</th>';	
				$cadena.='<th>Tipo</th>';			
			$cadena.='</tr>';
			while ($obj = $resultado->fetch_object()){
				LimpiaResultados($obj);
				$cadena.='<tr class="impar">';
					$cadena.='<td align="center">'.$obj->usuario.'</td>';
					$cadena.='<td align="center">'.$obj->password.'</td>';
					$cadena.='<td align="center">'.$obj->nombre.'</td>';
					$cadena.='<td align="center">'.$obj->apellido1.'</td>';
					$cadena.='<td align="center">'.$obj->apellido2.'</td>';
					$cadena.='<td align="center">'.$obj->edad.'</td>';
					$cadena.='<td align="center">'.$obj->direccion.'</td>';
					$cadena.='<td align="center">'.$obj->telefono.'</td>';
					$cadena.='<td align="center">'.$obj->dni.'</td>';
					$cadena.='<td align="center">'.$obj->email.'</td>';
					$cadena.='<td align="center">'.$obj->tipo.'</td>';				
				$cadena.='</tr>';
				
				if($obj = $resultado->fetch_object()){
					$cadena.='<tr class="par">';
						$cadena.='<td align="center">'.$obj->usuario.'</td>';
						$cadena.='<td align="center">'.$obj->password.'</td>';
						$cadena.='<td align="center">'.$obj->nombre.'</td>';
						$cadena.='<td align="center">'.$obj->apellido1.'</td>';
						$cadena.='<td align="center">'.$obj->apellido2.'</td>';
						$cadena.='<td align="center">'.$obj->edad.'</td>';
						$cadena.='<td align="center">'.$obj->direccion.'</td>';
						$cadena.='<td align="center">'.$obj->telefono.'</td>';
						$cadena.='<td align="center">'.$obj->dni.'</td>';
						$cadena.='<td align="center">'.$obj->email.'</td>';
						$cadena.='<td align="center">'.$obj->tipo.'</td>';	
					$cadena.='</tr>';
				}	
			}
		$cadena.='</table>';
	}
	$resultado->free(); 
	$db->close(); 
}catch (Exception $e){
	echo $e->getMessage();
	if (mysqli_connect_errno() == 0)
		$db->close();
	exit();
}
echo utf8_encode($cadena);
?>
