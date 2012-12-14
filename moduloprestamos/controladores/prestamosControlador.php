<?php
function listar(){
	//Incluye el modelo que corresponde
	require './moduloprestamos/modelos/prestamosModelo.php';

	//Le pide al modelo todos los items
	$items = buscarTodosLosItems();

	//Pasa a la vista toda la información que se desea representar
	require './moduloprestamos/vistas/listar.php';
}
function alta(){
	require './moduloprestamos/vistas/alta.php';
}
if( isset($_POST['usuario'])  ){
    require '../../modelo/conexion.php';
	require '../modelos/prestamosModelo.php';
	$alta = altaPrestamo($_POST['usuario'],$_POST['codLibro'],$_POST['fecha']);
	$items = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=prestamos&accion=listar");	
}

function buscar(){
	require './moduloprestamos/vistas/buscar.php';
}

function baja(){
	require './moduloprestamos/vistas/baja.php';
}
if( isset($_GET['id'])  ){
//echo $_GET['id'];
    require '../../modelo/conexion.php';
	require '../modelos/prestamosModelo.php';
	bajaPrestamo($_GET['id']);
	$items = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=prestamos&accion=listar"); 
}
	
function modificar(){
	require './moduloprestamos/vistas/modificar.php';
}


////////////////////////////////////////////
function modificar2($idd){
	//echo $idd;	
	require './moduloprestamos/modelos/itemsModelo.php';
	$items = buscaridd($idd);	
	require './moduloprestamos/vistas/modificar2.php';
}
if( isset($_GET['idd']) ){
//echo $_GET['idd'];
	require '../../modelo/conexion.php';
	require '../modelos/prestamosModelo.php';
	modificarPrestamo($_GET['idd'],$_GET['pass'],$_GET['nombre'],$_GET['apellido1'],$_GET['apellido2'],$_GET['edad'],$_GET['direccion'],$_GET['telefono'],$_GET['dni'],$_GET['email'],$_GET['tipo']);	
	$items = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=prestamos&accion=listar");
	//?>
	<!--	<p>[<a href="./index2.php?controlador=items&accion=modificar">Nueva modificacion</a>]</p> -->
	<?php

}

?>




