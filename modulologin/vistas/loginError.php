<!DOCtype HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<script language="JavaScript" src="./javaScripts/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
		<title>Login</title>
	</head>
	<body>
		<div class="contenedor">
			<div class="nombreSeccion">
				<h1>Login</h1>
			</div>
			<div class="cuerpo">	
				<form action="./modulologin/controladores/loginControlador.php" name="myform" id="myform" cellspacing="2" cellpadding="2" method="POST">
					<br/>
					<table class="letras"> 
						<tr>					
							<td>Usuario:</td>
							<td>
								<div id='myform_login_errorloc' class="error_strings"></div>
								<input type="text" name="login" size="20" maxlength="30" />
							</td>
						</tr>
						<tr>
							<td>Password:</td>								
							<td>
								<div id='myform_password_errorloc' class="error_strings"></div>	
								<input type="password" name="password" size="20" maxlength="30" />
							</td>
						</tr>
						<tr>
							<td>Tipo de usuario:</td>
							<td><select name="tipo">
									<option value="cliente" selected="selected">Cliente</option>
									<option value="administrador">Administrador</option>
									<option value="empleado">Empleado</option>
								</select>
							</td>
						
						</tr>
						<tr>
							<td></td>
							<td>
								<h3 style="color: red;">Datos inválidos<h3>						
							<td>
						</tr>	
						<tr>
							<td colspan='2' align='center'><a href='./index.php?controlador=items&accion=altaCliente'>¿No tienes registro?, pincha aquí</a></td>
						</tr>				
						<tr>
							<td></td>
						</tr>
						<tr>
							<td></td>
						</tr>			
						<tr>
							<td></td>	
							<td>
								<input type="submit" name="conectar" value="Conectar">
							</td>						
						</tr>	
					</table>
					<script language="JavaScript" src="./modulologin/js/valLogin.js" type="text/javascript" xml:space="preserve"></script>
				</form>
			</div>
		</div>	
	</body>
</html>