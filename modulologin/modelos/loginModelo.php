<?php

function CompruebaAutenticacion($login, $password, $tipo){
	global $servidor, $bd, $usuario, $contrasenia;
	try {
		@ $db = new mysqli($servidor, $usuario, $contrasenia);
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
		
		$db->select_db($bd);
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
			
		$consulta = "select usuario, password from usuarios where usuario='".$login."' and password='".$password."'";
		$resultado = $db->query($consulta);
		if ($db->errno != 0) 
			throw new Exception('Error consultando encuestas '. $db->error, $db->errno);

		if ($resultado->num_rows > 0){
			LimpiaResultados($biblioteca);
			$datosLoginValidos = true;
		}else{
			$datosLoginValidos = false;
			
		}
		$resultado->free();
		$db->close();
	}catch (Exception $e){
		echo '<p>'.$e->getMessage().'</p>';
		if (mysqli_connect_errno() == 0)
			$db->close();
		exit;
	}
	return $datosLoginValidos;
}





?>
