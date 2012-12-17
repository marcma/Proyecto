<?php
session_start();
function login(){
	require './modulologin/vistas/login.php';
}
if( isset($_POST['conectar'])  ){
    require '../../modelo/conexion.php';
	require '../modelos/loginModelo.php';
	$auten = CompruebaAutenticacion($_POST['login'],$_POST['password'],$_POST['tipo']);
	if ($auten){
		$_SESSION['userId'] = $_POST['login'];
		$_SESSION['userType'] = $_POST['tipo'];
		header("Location: ../../index2.php");		
	}else{
		header("Location: ../../index.php?controlador=login&accion=loginError");
	}
}


function loginError(){
	require './modulologin/vistas/loginError.php';
}



?>




