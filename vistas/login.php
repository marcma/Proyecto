<?php 
require('../aspecto/libreria.inc');
//InicializarSesion(0);
dibuja0();

function LimpiaResultados($objeto){
	foreach ($objeto as $atributo => $valor)
		if(is_string($objeto->$atributo) === true)
			$objeto->$atributo = stripslashes($objeto->$atributo);
}
class ExcepcionEnTransaccion extends Exception{
	public function __construct(){}
}
function CompruebaAutenticacion($login, $password, &$outTipoUsuario, &$outimg_usuario, &$outTextoError){
	try {
		@ $db = new mysqli('localhost', 'root', 'root1');
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
			
		$db->select_db('Bibliotecaa');
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
			
		$consulta = "select usuario, password from usuarios where usuario='".$login."' and password='".$password."'";
		$resultado = $db->query($consulta);
		if ($db->errno != 0) 
			throw new Exception('Error consultando encuestas '. $db->error, $db->errno);

		if ($resultado->num_rows > 0){
			$encuesta = $resultado->fetch_object();
			LimpiaResultados($encuesta);
			$outTipoUsuario = $encuesta->tipoUsuario;
			$outimg_usuario = $encuesta->img_usuario;
			$datosLoginValidos = true;
			$outTextoError = '';
		}else{
			$outTipoUsuario = null;
			$outimg_usuario = null;
			$datosLoginValidos = false;
			$outTextoError = 'No existe ningun usuario con ese login/password en la BD';
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
function DatosLoginValidos($login, $password, &$outTipoUsuario, &$outimg_usuario, &$outTextoError){
	if ($login == ''){
		$outTipoUsuario = null;
		$outimg_usuario = null;
		$datosLoginValidos = false;
		$outTextoError = 'Debes introducir algún valor para el login';
	}elseif ($password == ''){
		$outTipoUsuario = null;
		$outimg_usuario = null;
		$datosLoginValidos = false;
		$outTextoError = 'Debes introducir algún valor para el password';			 		 
	}else
		$datosLoginValidos = CompruebaAutenticacion($login, $password, $outTipoUsuario, $outimg_usuario, $outTextoError);
	return $datosLoginValidos;
}
function VerFormularioLoginEncuesta($login, $password, $formularioCorrecto, $textoError){
	echo '<br>';
	echo '<div align="center" style="font-family:Verdana,Arial;color:#00afff;font-size:18px;font-weight:bold;">'.'ACCESO APLICACION BIBLIOTECA</div>';
	echo '<br>';
	echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
		echo '<table border="0" align="center">';
			echo '<tr>';
				echo '<td><b>Usuario:</b></td>';
				echo '<td><input type="text" name="login" value="'.$login.'" size="20"></td>';
			echo '</tr><tr>';
				echo '<td><b>Password:</b></td>';
				echo '<td><input type="password" name="password" value="'.$password.'" size="20"></td>';
			echo '</tr><tr>';	
				echo '<td colspan="2" align="center"><input type="submit" name="valida" value="Valida"></td>';
			echo '</tr><tr>';	
				echo "<td colspan='2' align='center'><a href='../index.php?controlador=items&accion=alta'>Usuario no registrado</a></td>";
			echo '</tr>';
		echo '</table>';
	echo '</form>';
	if ($formularioCorrecto === false)
		echo '<p><font color="#FF0000"><b>Error: </b>'.$textoError.'</font></p>';
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>Valida usuario</title>
    </head>
<body>
<?php
	$loginEncuestaEnviado = isset($_POST['valida']);
	if ($loginEncuestaEnviado === true ){
		$login = addslashes ($_POST['login']);
		$password = addslashes ($_POST['password']);
		//$captcha = $_POST['captcha'];
		$formularioCorrecto = DatosLoginValidos($login, $password, $tipoUsuario, $img_usuario, $textoError);
		//if ($formularioCorrecto === false && isset($_SESSION['userId']) === true)
			//header ("Location:logout_encuesta.php");
	}else{
		$login = '';
		$password = '';
		$textoError = '';
		$formularioCorrecto = true;
	}
	
	if ($loginEncuestaEnviado === true && $formularioCorrecto === true){
		assert($tipoUsuario != null);
		$_SESSION['userId'] = $login;
		$_SESSION['userType'] = $tipoUsuario;
		$_SESSION['img_usuario'] = $img_usuario;
		header ("Location: ../index2.php");
	}else
		VerFormularioLoginEncuesta($login, $password, $formularioCorrecto, $textoError);

include('../aspecto/pie.html');
//EscribeParrafo('@PHP powered by IES Estacio','texto_cabecera2a');
?>
</body>
</html>
