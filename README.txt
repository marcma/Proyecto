Si quieres subir la aplicaci�n web, hay que contratar un host como por ejemplo 1&1.

La base de datos est� en la ruta:
(ra�z proyecto)/modulo/Bibliotecaa.sql

Datos administrador BASE DE DATOS(MySQL) por defecto:
	Usuario: root
	Contase�a: root1

Si quieres cambiar los datos deber�as de hacer lo siguiente:

Para modificar el usuario y contrase�a editamos el fichero que hay en hay que ir (ra�z proyecto)/modulo/conexion.php, modificamos las variables usuario y contrase�a:
	$servidor = 'localhost';
	$bd = 'Bibliotecaa';
	$usuario = '(tu usuario)';
	$contrasenia = '(tu contrase�a)';
	
Para que funcione el DataTable tambi�n tendremos que modificar el fichero que hay en (ra�z proyecto)/datatable/php/server_processing2.php, modificamos las variables usuario y contrase�a:
	$gaSql['user']       = "(tu usuario)";
	$gaSql['password']   = "(tu contrase�a)";
	$gaSql['db']         = "Bibliotecaa";
	$gaSql['server']     = "localhost";
	
Con esto ya deber�a de funcionar la aplicaci�n.

El usuario administrador de la aplicaci�n es:
	Usuario: marc
	Contrase�a: marc
	tipo: administrador

Solo se puede acceder a la aplicaci�n de gesti�n, desde un usuario tipo "administrador".

Se pueden crear clientes, pero no peuden acceder a la aplicaci�n.

S�lo est� hecha la parte de la administraci�n.

