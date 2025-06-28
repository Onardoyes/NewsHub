Bienvenidos a NewsHub!

Este es un proyecto sobre un recopilador de noticias personalizable, que busca ofrecerle a los diferentes usuarios acceso a las noticias que son de su verdadero interes, acompañandolo de una interfaz que se acomode a su propio estilo.

A continuación se dan los pasos para poder hacer uso del proyecto:

1.- Para utilizar este proyecto es unicamente necesario tener instalado XAMPP.

2.- Una vez se tenga instalado XAMPP, es necesario descargar este proyecto dentro de la carpeta "htdocs" que se encuentra dentro del directorio de instalacion de XAMPP.

3.- Realice la configuración inicial de phpMyAdmin.

4.- Cree la base de datos "NewsHub", esto utilizando el script "NewsHub.sql" que se encuentra en el directorio del proyecto: "htdocs\NewsHub\BD".

5.- Dentro del directorio del proyecto, en "htdocs\NewsHub\BD", se tiene que modificar la variable "$conexion" dentro del archivo "conexion.php" para que coincida con los datos que realizo su instalación para la conexion con phpMyAdmin.

Una vez realizado estos pasos y que los modulos de XAMPP, Apache y MySQL esten activos, solo queda dirigirse al buscador de su preferencia y colocar en la barra de URL lo siguiente: "http://localhost/NewsHub/index.php". Si no aparece la pagina "iniSesion.php", asegurese que siguio los pasos anteriores con precisión y vuelva a intentarlo.
