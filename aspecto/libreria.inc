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
	
	//Funcion para que pinte el login sin menu
	function dibuja0(){
		include('../aspecto/sinMenu.html');
		echo '<br>';echo '<br>';
		include('../aspecto/pie.html');
		
	}
		
	function dibuja(){
		include('./aspecto/sinMenu.html');
		echo '<br>';echo '<br>';
		include('./aspecto/pie.html');
	}
	
	function dibuja2(){
		include('./aspecto/menu.html');
		echo '<br>';echo '<br>';
		include('./aspecto/pie.html');
	}	
	
	function dibuja1(){
		include('../../aspecto/menu.html');
		echo '<br>';echo '<br>';
		include('../../aspecto/pie.html');


	}	
	
?> 