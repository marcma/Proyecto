<?php 
	session_start();
	if (isset ($_SESSION['userId'])){
		$_SESSION = array();
		session_destroy();
	}
	header("Location: ../../index.php?controlador=login&accion=login");
?>