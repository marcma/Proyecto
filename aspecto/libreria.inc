<?php
	function EscribeParrafo($texto, $estilo='texto_normal') {
		echo '<div class='.$estilo.'>'.$texto.'</div>';
	}
	function DibujaMenuBotones($menu_botones_enlace, $estilo='menu_botones_enlace') {
		echo '<div class='.$estilo.'>';
			foreach ($menu_botones_enlace as $descripcion => $enlace)
				echo '<a href="'.$enlace.'"><span>'.$descripcion.'</span></a>';
		echo '</div>';
	}
	
	//Funcion para que pinte en login sin menu
	function dibuja0(){
		include('../aspecto/cuerpo.html');
		$menu = array('Login'=>'./vistas/login.php');
		DibujaMenuBotones($menu,'menu_botones_enlace1');

		echo '<br>';echo '<br>';

		include('../aspecto/pie.html');
		
	}
	
	function dibuja(){
		include('./aspecto/cuerpo.html');
		$menu = array('Login'=>'./vistas/login.php');
		DibujaMenuBotones($menu,'menu_botones_enlace1');

		echo '<br>';echo '<br>';

		include('./aspecto/pie.html');
	}
	
	function dibuja2(){
		include('./aspecto/cabecera.html');
		$menu = array('Inicio'=>'index2.php');
		DibujaMenuBotones($menu,'menu_botones_enlace2');
		$menu = array('Login'=>'./vistas/login.php');
		DibujaMenuBotones($menu,'menu_botones_enlace1');

		echo '<br>';echo '<br>';

		include('./aspecto/pie.html');
	}	
	
	function dibuja1(){
		include('../../aspecto/cabecera.html');
		$menu = array('Inicio'=>'index2.php');
		DibujaMenuBotones($menu,'menu_botones_enlace2');
		$menu = array('Login'=>'./vistas/login.php');
		DibujaMenuBotones($menu,'menu_botones_enlace1');
		echo '<br>';echo '<br>';
		include('../../aspecto/pie.html');


	}	
	
?> 