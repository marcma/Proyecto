Si quieres subir la aplicación web, hay que contratar un host como por ejemplo 1&1.

La base de datos está en la ruta:
(raíz proyecto)/modulo/Bibliotecaa.sql

Datos administrador BASE DE DATOS(MySQL) por defecto:
	Usuario: root
	Contaseña: root1

Si quieres cambiar los datos deberías de hacer lo siguiente:

Para modificar el usuario y contraseña editamos el fichero que hay en hay que ir (raíz proyecto)/modulo/conexion.php, modificamos las variables usuario y contraseña:
	$servidor = 'localhost';
	$bd = 'Bibliotecaa';
	$usuario = '(tu usuario)';
	$contrasenia = '(tu contraseña)';
	
Para que funcione el DataTable también tendremos que modificar el fichero que hay en (raíz proyecto)/datatable/php/server_processing2.php, modificamos las variables usuario y contraseña:
	$gaSql['user']       = "(tu usuario)";
	$gaSql['password']   = "(tu contraseña)";
	$gaSql['db']         = "Bibliotecaa";
	$gaSql['server']     = "localhost";
	
Con esto ya debería de funcionar la aplicación.

El usuario administrador de la aplicación es:
	Usuario: marc
	Contraseña: marc
	tipo: administrador

Solo se puede acceder a la aplicación de gestión, desde un usuario tipo "administrador".

Se pueden crear clientes, pero no peuden acceder a la aplicación.

Sólo está hecha la parte de la administración.

