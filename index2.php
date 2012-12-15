<?php
session_start();
require './modelo/conexion.php';
//require_once './vistas/principal.php';
require('./aspecto/libreria.inc');
dibuja2();

if (isset($_SESSION['userId'])) {
	echo '<b style="font-family:Arial;color:red;font-size:15px;font-weight:bold;">';
	echo $_SESSION['userId'];
	echo "</b><i>(";
	echo $_SESSION['userType'];
	echo ")</i><br/>";
	echo '<a style="font-family:Verdana,Arial;color:blue;font-size:15px;font-weight:bold;" href="./modulologin/modelos/logout.php">Logout</a>';
}

if (!isset($_SESSION['userId'])) {
			header("Location: ./index.php?controlador=login&accion=login");
}			
if ($_SESSION['userType'] != "administrador") {
			header("Location: ./index.php?controlador=login&accion=login");
}

?>
<div align='center'>
<?php
	$accionPredefinida = "listar";
	if(!empty($_GET['controlador'])){
			$controlador = $_GET['controlador'];
			if(! empty($_GET['accion'])){
				  $accion = $_GET['accion'];
				 if(! empty($_GET['param']))
					$param = $_GET['param']; 
			}
			else
				  $accion = $accionPredefinida;

			//Ya tenemos el controlador y la accion
			//La carpeta donde buscaremos los controladores
			$carpetaControladores = "./modulo".$controlador."/controladores/";
			//Formamos el nombre del fichero que contiene nuestro controlador
			$controlador = $carpetaControladores . $controlador . 'Controlador.php';

			//Incluimos el controlador o detenemos todo si no existe
			if(is_file($controlador))
				  require_once $controlador;
			else
				  die('El controlador no existe - 404 not found');

			//Llamamos la accion o detenemos todo si no existe
			if(is_callable($accion)&&(!(isset ($param))))
				  $accion();
			else if(is_callable($accion)&&(isset ($param)))
					$accion($param);
			
			else
				  die('La accion no existe - 404 not found');
	}
	?>
</div>
<?php 
/*function autentificacionAdministrador(){
	if(!isset($_SESSION['userId']){
			header("Location: ../../index2.php?controlador=libros&accion=error");
	}else if (isset($_SESSION['userId'] && isset($_SESSION['userType'] == administrador){
			header("Location: ../../index2.php?controlador=libros&accion=listar");
	}

} */
require('./aspecto/pie.html');
?>	