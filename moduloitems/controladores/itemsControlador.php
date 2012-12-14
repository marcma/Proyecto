<?php
function listar(){
	//Incluye el modelo que corresponde
	require './moduloitems/modelos/itemsModelo.php';

	//Le pide al modelo todos los items
	$items = buscarTodosLosItems();

	//Pasa a la vista toda la información que se desea representar
	require './moduloitems/vistas/listar.php';
}
function alta(){
	require './moduloitems/vistas/alta.php';
}
if( isset($_POST['usuario'])  ){
    require '../../modelo/conexion.php';
	require '../modelos/itemsModelo.php';
	altaItem($_POST['usuario'],$_POST['password'],$_POST['nombre'],$_POST['apellido1'],$_POST['apellido2'],$_POST['edad'],$_POST['direccion'],$_POST['telefono'],$_POST['dni'],$_POST['email'],$_POST['tipo']);
	$items = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=items&accion=listar");	
}

function buscar(){
	require './moduloitems/vistas/buscar.php';
}

function baja(){
	require './moduloitems/vistas/baja.php';
}
if( isset($_GET['id'])  ){
//echo $_GET['id'];
    require '../../modelo/conexion.php';
	require '../modelos/itemsModelo.php';
	bajaItem($_GET['id']);
	$items = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=items&accion=listar"); 
}
	
function modificar(){
	require './moduloitems/vistas/modificar.php';
}


////////////////////////////////////////////
function modificar2($idd){
	//echo $idd;	
	require './moduloitems/modelos/itemsModelo.php';
	$items = buscaridd($idd);	
	require './moduloitems/vistas/modificar2.php';
}
if( isset($_GET['idd']) ){
//echo $_GET['idd'];
	require '../../modelo/conexion.php';
	require '../modelos/itemsModelo.php';
	modificarItem($_GET['idd'],$_GET['pass'],$_GET['nombre'],$_GET['apellido1'],$_GET['apellido2'],$_GET['edad'],$_GET['direccion'],$_GET['telefono'],$_GET['dni'],$_GET['email'],$_GET['tipo']);	
	$items = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=items&accion=listar");
	//?>
	<!--	<p>[<a href="./index2.php?controlador=items&accion=modificar">Nueva modificacion</a>]</p> -->
	<?php

}

?>




