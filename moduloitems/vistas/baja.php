<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Modificacion de encuestas</title>
		<style type="text/css"><!--body{padding-top: 20px;}--></style>
		<script language="javascript" src="./moduloitems/js/baja_items.js" type="text/javascript"></script>
	</head>
	<body>
		<form id="form3" name="form3" method="get" action="" onsubmit="return false;">
			<table width="92%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  Buscar en todos los campos: 
				  <td colspan="4" align="center" valign="middle">
					<label>				  
						<input name="buscar" type="text" size="46" id="buscar" autocomplete="off"/>
					</label>
				  </td>				  
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
				  <td colspan="4" align="center"><table width="300" border="0" cellspacing="0" cellpadding="0" style="font-size:14px">
					<tr>
					  Ordenar por:
					  <td align="center">
						<label><input type="radio" name="radio" id="radio1" value="radio1"/>Desc
						</label>
					  </td>
					  
					  <td align="center">
						<label>
							<input type="radio" name="radio" id="radio2" value="radio2"/>Asc
						</label>
					</td>
					  
					  <td align="center"><label>
						<select name="criterio_ord" id="criterio_ord" >
							<option value="usuario" >Usuario</option>	
							<option value="password" >Password</option>
							<option value="apellido1" >Primer apellido</option>	
							<option value="apellido2" >Segundo apellido</option>		
							<option value="edad" >Edad</option>
							<option value="direccion" >Direcci�n</option>
							<option value="telefono" >Tel�fono</option>
							<option value="dni" >Dni</option>
							<option value="email" >Email</option>
							<option value="tipo" >Tipo de usuario</option>
						</select>
					  </label></td>
					  <td align="center"><label>
						<select name="mas" id="mas" >
						  <option value="10">10</option>
						  <option value="20">20</option>
						  <option value="all">Todos</option>
						</select>
					  </label></td>
					</tr>
				  </td>
				</tr>
			</table>
		</form>
		<div id="resultado3"></div>
	</body>
</html>