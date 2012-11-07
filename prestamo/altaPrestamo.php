<?php 
require('../aspecto/libreria.inc');
dibuja();
function LimpiaResultados($objeto){
	foreach ($objeto as $atributo => $valor)
		if(is_string($objeto->$atributo) === true)
			$objeto->$atributo = stripslashes($objeto->$atributo);
}
class ExcepcionEnTransaccion extends Exception{
	public function __construct(){}
}
?>

<!DOCtype HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Alta prestamo</title>
		<script language="javascript">
<!--
function showDateSelected(){
   alert("Date selected is "+document.form1.date1.value);
}
//-->
</script>

	</head>
	<body>
	<?php
	if (isset($_POST['alta'])===false) {
	?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	

		<p>Usuario:
			<input type="text" name="usuario" size="20" maxlength="30"></p>
		
		
		<p>Código libro:
			<input type="text" name="codLibro" size="20" maxlength="30"></p>
		
		
		<?php
		/*	
		  //Le ponemos la zona horaria de Madrid	 
		  date_default_timezone_set('Europe/Madrid');
		  //get class into the page
		  require_once("../calendar/calendar/classes/tc_calendar.php");
		  $myCalendar = new tc_calendar("date2", true);
		  $myCalendar->setIcon("../calendar/calendar/images/iconCalendar.gif");
		  $myCalendar->setDate(date("d"), date("m"), date("Y"));
		  $myCalendar->setPath("../calendar");
		  $myCalendar->setYearInterval(1960, date("Y"));
		  $myCalendar->dateAllow("1960-01-01", date("Y-m-d"));
		  $myCalendar->setAlignment("left", "bottom");
		  $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-14", "2010-12-25"), 0, "year");
		  $myCalendar->disabledDay("sun");
		  $myCalendar->writeScript();	
		  $theDate = isset($_POST["date1"]) ? $_POST["date1"] : "";
		*/
		?>
		
		
		<p>Fecha prestamo:</p>
			<p>
				<select name="dia">
					<option value="Día" selected="selected">Día</option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
				</select>
				
				<select name="mes">
					<option value="Mes" selected="selected">Mes</option>
					<option value="01">Enero</option>
					<option value="02">Febrero</option>
				</select>

				<select name="anyo">
					<option value="Año" selected="selected">Año</option>
					<option value="2010">2010</option>
					<option value="2011">2011</option>
				</select>
			</p>
	
		
		
		</br>
		<input type="submit" name="alta" value="Alta">
	</form>
	<?php
	}else { 
	
	$usuario=$_POST['usuario'];
	$codLibro=$_POST['codLibro'];	
	$dia=$_POST['dia'];
	$mes=$_POST['mes'];
	$anyo=$_POST['anyo'];
	$fecha=$anyo.'-'.$mes.'-'.$dia;



	try{
		@ $db = new mysqli('localhost', 'root', 'root1');
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
		
		$db->select_db('Bibliotecaa');
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
		
		$consulta = "insert into prestamo (usuario,codLibro,fechaPrestamo) values ('$usuario',$codLibro,'$fecha')";
				
		if ($db->query($consulta) === false)
			throw new ExcepcionEnTransaccion();
		$db->commit();
		
		$consulta = "select usuario,codLibro,fechaPrestamo from prestamo";
		$resultado = $db->query($consulta);
		if ($db->errno != 0)
			throw new Exception('Error realizando consulta:'.$db->error, $db->errno);

		if ($resultado->num_rows > 0){
				echo '<table border="6" id="alta">';
				echo'<tr>';
					echo'<th>Usuario</th>';
					echo'<th>código libro</th>';
					echo'<th>Fecha de prestamo</th>';
				echo'</tr>';
				while ($obj = $resultado->fetch_object()){
					LimpiaResultados($obj);
										
					echo'<tr class="impar">';
						echo'<td align="center">'.$obj->usuario.'</td>';
						echo'<td align="center">'.$obj->codLibro.'</td>';
						echo'<td align="center">'.$obj->fechaPrestamo.'</td>';

					echo'</tr>';
					
					/*if($obj = $resultado->fetch_object()){
						echo'<tr class="par">';
							echo'<td align="center">'.$obj->usuario.'</td>';
							echo'<td align="center">'.$obj->codLibro.'</td>';
							echo'<td align="center">'.$obj->fechaa.'</td>';
						echo'</tr>';
					}	*/				
				}
				echo'</table>';
			}
		else echo '<p>No hay datos que mostrar</p>';
		?>
		<p>[<a href="<?php echo $_SERVER['PHP_SELF'] ?>">Nueva alta</a>]</p>
		<?php
		$resultado->free(); 
		$db->close(); 
	}catch (ExcepcionEnTransaccion $e){
		echo 'No se ha podido realizar al alta';
		$db->rollback();
		$db->close();
	}catch (Exception $e){
		echo $e->getMessage();
		if (mysqli_connect_errno() == 0)
			$db->close();
		exit();
	}
	}
	include('../aspecto/pie.html');
	?>
	</body>
</html>
