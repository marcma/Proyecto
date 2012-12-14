<?php 

?>

		
		<?php
		if( (isset($_GET['id'])===true )&&(isset($_GET['modifica'])===false ) ) {
		echo '<br>';echo '<br>';echo '<br>';echo '<br>';
		?>
		<?php 
		require('../../aspecto/libreria.inc');
		dibuja1();
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
			<TABLE align="center">
				<TR>
					<TD>Usuario:</TD>
					<TD><INPUT TYPE="text" NAME="usuario" SIZE="20" MAXLENGTH="30" value="<?php echo $_GET['id'] ?>" readonly></TD>
				</TR>
				<tr>
					<td>Password:</td>
					<td><input type="text" name="password" size="20" maxlength="30" value="<?php echo $_GET['pass'] ?>"></td>
				</tr>
				<tr>
					<td>Nombre:</td>
					<td><input type="text" name="nombre" size="20" maxlength="30" value="<?php echo $_GET['nombre'] ?>"></td>
				</tr>
				<tr>
					<td>Primer apellido:</td>
					<td><input type="text" name="apellido1" size="20" maxlength="30" value="<?php echo $_GET['apellido1'] ?>"></td>
				</tr>
				<tr>
					<td>Segundo apellido:</td>
					<td><input type="text" name="apellido2" size="20" maxlength="30" value="<?php echo $_GET['apellido2'] ?>"></td>
				</tr>
				<tr>
					<td>Edad:</td>
					<td><input type="text" name="edad" size="20" maxlength="30" value="<?php echo $_GET['edad'] ?>"></td>
				</tr>				
				<tr>
					<td>Dirección:</td>
					<td><input type="text" name="direccion" size="20" maxlength="30" value="<?php echo $_GET['direccion'] ?>"></td>
				</tr>
				<tr>
					<td>Teléfono:</td>
					<td><input type="text" name="telefono" size="20" maxlength="30" value="<?php echo $_GET['telefono'] ?>"></td>
				</tr>
				<tr>
					<td>Dni:</td>
					<td><input type="text" name="dni" size="20" maxlength="30" value="<?php echo $_GET['dni'] ?>"></td>
				</tr>	
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" size="20" maxlength="30" value="<?php echo $_GET['email'] ?>"></td>
				</tr>				
				<tr>
					<td>Tipo de usuario:</td>
					<td><select name="tipo">
							<option value="cliente" <?php if($_GET['tipo'] === "cliente" ){ echo "selected"; } ?> >Cliente</option>
							<option value="administrador" <?php if($_GET['tipo'] === "administrador" ){ echo "selected"; } ?> >Administrador</option>
							<option value="empleado" <?php if($_GET['tipo'] === "empleado" ){ echo "selected"; } ?> >Empleado</option>
						</select>
					</td>
				</tr>
				<TR>
					<TD colspan="2">
						<INPUT TYPE="submit" NAME="modifica" VALUE="Modifica">
					</TD>
				</TR>				
			</TABLE>

		</form>
		<?php
		include('../../aspecto/pie.html');
		
		} else { 
		
			require '../../modelo/conexion.php';
			
			$usuario1=$_GET['usuario'];
			$password=$_GET['password'];	
			$nombre=$_GET['nombre'];
			$apellido1=$_GET['apellido1'];
			$apellido2=$_GET['apellido2'];
			$edad=$_GET['edad'];
			$direccion=$_GET['direccion'];
			$telefono=$_GET['telefono'];
			$dni=$_GET['dni'];
			$email=$_GET['email'];
			$tipo=$_GET['tipo'];
		try{
			@ $db = new mysqli($servidor, $usuario, $contrasenia);
			if (mysqli_connect_errno() != 0)
				throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
			
			$db->select_db($bd);
			if ($db->errno != 0)
				throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
			
			$consulta = "update usuarios set password='".$password."'
											,nombre='".$nombre."'
											,apellido1='".$apellido1."'
											,apellido2='".$apellido2."'
											,edad='".$edad."'
											,direccion='".$direccion."'
											,telefono='".$telefono."'
											,dni='".$dni."'
											,email='".$email."'
											,tipo='".$tipo."' where usuario='".$usuario1."'";
			if ($db->query($consulta) === false)
				throw new ExcepcionEnTransaccion();
			$db->commit();
			
			header ("Location: ../../index2.php?controlador=items&accion=listar");
			$db->close(); 
		}catch (ExcepcionEnTransaccion $e){
			echo 'No se ha podido realizar la modificacion';
			$db->rollback();
			$db->close();
		}catch (Exception $e){
			echo $e->getMessage();
			if (mysqli_connect_errno() == 0)
				$db->close();
			exit();
		}
		}
		?>
