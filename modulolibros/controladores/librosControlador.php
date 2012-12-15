<?php
function listar(){
	//Incluye el modelo que corresponde
	require './modulolibros/modelos/librosModelo.php';

	//Le pide al modelo todos los items
	$libros = buscarTodosLosItems();

	//Pasa a la vista toda la información que se desea representar
	require './modulolibros/vistas/listar.php';
}
function alta(){
	require './modulolibros/vistas/alta.php';
}
if( isset($_POST['alta'])  ){
    require '../../modelo/conexion.php';
	require '../modelos/librosModelo.php';
	altaLibros($_POST['titulo'],$_POST['nombreAutor'],$_POST['apellido1Autor'],$_POST['apellido2Autor'],$_POST['tema'],$_POST['unidades'],$_POST['isbn'],$_POST['numPaginas'],$_POST['descripcion']);
	$libros = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=libros&accion=listar");
}

function buscar(){
	require './modulolibros/vistas/buscar.php';
}

function baja(){
	require './modulolibros/vistas/baja.php';
}
if( isset($_GET['id'])  ){
    require '../../modelo/conexion.php';
	require '../modelos/librosModelo.php';
	bajaLibros($_GET['id']);
	$libros = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=libros&accion=listar"); 
}
	
function modificar(){
	require './modulolibros/vistas/modificar.php';
}
////////////////////////////////////////////
function modificar2($idd){
	//echo $idd;	
	require './modulolibros/modelos/librosModelo.php';
	$libros = buscaridd($idd);	
	require './modulolibros/vistas/modificar2.php';
}
if( isset($_GET['idd']) ){
//echo $_GET['idd'];
	require '../../modelo/conexion.php';
	require '../modelos/librosModelo.php';
	modificarLibros($_GET['idd'],$_GET['titulo'],$_GET['nombreAutor'],$_GET['apellido1Autor'],$_GET['apellido2Autor'],$_GET['tema'],$_GET['unidades'],$_GET['isbn'],$_GET['numPaginas'],$_GET['descripcion']);	
	$libros = buscarTodosLosItems();
	header("Location: ../../index2.php?controlador=libros&accion=listar");	
	//?>
	<!--	<p>[<a href="./index2.php?controlador=items&accion=modificar">Nueva modificacion</a>]</p> -->
	<?php

}

?>




