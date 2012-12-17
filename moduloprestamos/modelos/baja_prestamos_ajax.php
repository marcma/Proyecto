<?php
require '../../modelo/conexion.php';

if($_GET["mas"]!=""){
	if($_GET["mas"]!="all")
		$mas="limit 0,".$_GET["mas"];
	else
		$mas="limit 0,100";
}else
	$mas="limit 0,10";

if($_GET["radio1"]=="true")
	$orden="desc";
else if($_GET["radio2"]=="true")
	$orden="asc";
else
	$orden="asc";
	
if($_GET["criterio_ord"]!="")
	$criterio_ord=$_GET['criterio_ord']; 
else
	$criterio_ord="id"; 
	
//$sql="SELECT * FROM usuarios order by $criterio_ord ".$orden." ".$mas;
//if($_GET["text"]!=""){
	$text="%".$_GET["text"]."%";
	$sql="SELECT * FROM prestamo where (usuario like '$text') 
									or (codLibro like '$text') 
									or (fechaPrestamo like '$text') 
									order by $criterio_ord ".$orden." ".$mas;

//else if($_GET["text"]=="")//el us no introduce nada en el input text
//	$sql = "select * from usuarios where usuario not LIKE '%'";

$cadena="";
try{
	@ $db = new mysqli($servidor, $usuario, $contrasenia);
	if (mysqli_connect_errno() != 0)
		throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
	
	$db->select_db($bd);
	if ($db->errno != 0)
		throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
		
	$resultado= $db->query($sql);
	if ($db->errno != 0)
		throw new Exception('Error realizando consulta:'.$db->error, $db->errno);

	if ($resultado->num_rows > 0){
		$cadena.= '<br>';$cadena.= '<br>';$cadena.= '<br>';$cadena.= '<br>';
			$cadena.= '<table border="6" id="alta">';
			$cadena.='<tr>';
				$cadena.='<th>Usuario</th>';
				$cadena.='<th>Código del libro</th>';
				$cadena.='<th>Fecha prestamo</th>';
			$cadena.='</tr>';
			
			while ($obj = $resultado->fetch_object()){
				LimpiaResultados($obj);
				$cadena.='<tr class="impar color">';
					$cadena.='<td align="center">'.$obj->usuario.'</td>';
					$cadena.='<td align="center">'.$obj->codLibro.'</td>';
					$cadena.='<td align="center">'.$obj->fechaPrestamo.'</td>';
					$cadena.= '<td align="right"><a href="./moduloprestamos/controladores/prestamosControlador.php?id='.$obj->usuario .'">Eliminar</a>'.'</td>';						
				$cadena.='</tr>';
				
				if ($obj = $resultado->fetch_object()){
					$cadena.='<tr class="par color">';
					$cadena.='<td align="center">'.$obj->usuario.'</td>';
					$cadena.='<td align="center">'.$obj->codLibro.'</td>';
					$cadena.='<td align="center">'.$obj->fechaPrestamo.'</td>';
					$cadena.= '<td align="right"><a href="./moduloprestamos/controladores/prestamosControlador.php?id='.$obj->usuario .'">Eliminar</a>'.'</td>';				
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
