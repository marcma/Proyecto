<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Modificacion de encuestas</title>
		<style type="text/css"><!--body{padding-top: 20px;}--></style>
		<script language="javascript" src="./modulolibros/js/modificar_libros.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="contenedor">
			<div class="nombreSeccion">
				<h1>Modificar libros</h1>
			</div>
			<div class="cuerpo">	
				<form id="form3" name="form3" method="get" action="" onsubmit="return false;">
					<table class="letras" width="92%" border="0" cellspacing="0" cellpadding="0">
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
								<label class="letras"><input type="radio" name="radio" id="radio1" value="radio1"/>Desc
								</label>
							  </td>
							  
							  <td align="center">
								<label class="letras">
									<input type="radio" name="radio" id="radio2" value="radio2" checked="checked" />Asc
								</label>
							</td>
							  
							  <td align="center"><label>
								<select name="criterio_ord" id="criterio_ord" >
									<option value="codLibro" >C�digo libro</option>	
									<option value="titulo" >T�tulo</option>
									<option value="nombreAutor">Nombre autor</option>	
									<option value="apellido1Autor">Primer apellido autor</option>		
									<option value="apellido2Autor">Segundo apellido autor</option>
									<option value="tema" >Tema</option>
									<option value="unidades" >Unidades</option>
									<option value="isbn" >ISBN</option>
									<option value="numPaginas" >N�mero de p�ginas</option>
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
			</div>
		</div>
	</body>
</html>