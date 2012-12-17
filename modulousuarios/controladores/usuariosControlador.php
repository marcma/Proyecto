<?php
				
function listar(){
	//Incluye el modelo que corresponde
	require './modulousuarios/modelos/usuariosModelo.php';

	//Le pide al modelo todos los items
	$items = buscarTodosLosItems();

	//Pasa a la vista toda la información que se desea representar
	require './modulousuarios/vistas/listar.php';
}
function alta(){
	require './modulousuarios/vistas/alta.php';
}
if( isset($_POST['usuario'])  ){
    require '../../modelo/conexion.php';
	require '../modelos/usuariosModelo.php';
	altaUsuarios($_POST['usuario'],$_POST['password'],$_POST['nombre'],$_POST['apellido1'],$_POST['apellido2'],$_POST['edad'],$_POST['direccion'],$_POST['telefono'],$_POST['dni'],$_POST['email'],$_POST['tipo']);
	$items = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=usuarios&accion=listar");	
}

function altaCliente(){
	require './modulousuarios/vistas/altaCliente.php';
}
if( isset($_POST['usuario'])  ){
    require '../../modelo/conexion.php';
	require '../modelos/usuariosModelo.php';
	altaUsuarios($_POST['usuario'],$_POST['password'],$_POST['nombre'],$_POST['apellido1'],$_POST['apellido2'],$_POST['edad'],$_POST['direccion'],$_POST['telefono'],$_POST['dni'],$_POST['email'],$_POST['tipo']);
	echo '<h1>Usuario registrado correctamente</h1>';
}

function buscar(){
	require './modulousuarios/vistas/buscar.php';
}

function baja(){
	require './modulousuarios/vistas/baja.php';
}
if( isset($_GET['id'])  ){
    require '../../modelo/conexion.php';
	require '../modelos/usuariosModelo.php';
	bajaUsuarios($_GET['id']);
	$items = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=usuarios&accion=listar"); 
}
	
function modificar(){
	require './modulousuarios/vistas/modificar.php';
}
function modificar2($idd){
	require './modulousuarios/modelos/usuariosModelo.php';
	$items = buscaridd($idd);	
	require './modulousuarios/vistas/modificar2.php';
}
if( isset($_GET['idd']) ){
	require '../../modelo/conexion.php';
	require '../modelos/usuariosModelo.php';
	modificarUsuarios($_GET['idd'],$_GET['pass'],$_GET['nombre'],$_GET['apellido1'],$_GET['apellido2'],$_GET['edad'],$_GET['direccion'],$_GET['telefono'],$_GET['dni'],$_GET['email'],$_GET['tipo']);	
	$items = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=usuarios&accion=listar");
	//?>
	<!--	<p>[<a href="./index2.php?controlador=items&accion=modificar">Nueva modificacion</a>]</p> -->
	<?php

}

?>




