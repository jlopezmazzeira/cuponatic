# cuponatic

Las aplicaciones están separadas en frontend y backend, la aplicación frontend esta realizada con AngularJS en su versión 1.6, 
para correr esta aplicación le damos doble al archivo index.html que esta en la raíz del directorio que tiene por nombre front, nos 
aparecera una ventana que contendrá un campo de texto y botón, en el campo de texto colocaremos el nombre del producto a buscar
y luego presionamos el botón "Vamos!", si existe uno o más producto que contengan dicha palabra nos aparecera una lista en una
tabla, si no, nos lanzara un mensaje informandonos que no ha encontrado dicho producto.

En el archivo controller.js debemos cambiar la url que va hacia nuestro backend, ya que si no nos podremos comunicar con el backend.

Para correr el backend debemos colocar el directorio "back" en nuestro directorio www si estamos en linux o wamp, si estamos usando
wamp debemos colocarlo en el htdocs e iniciamos nuestro php y mysql. 

Debemos cambiar la configuración de nuestra base de datos, debemos colocar nuestro usuario y contrañesa, el servidor donde se encuentra
nuestra base de datos y el nombre de nuestra base de datos, este archivo se encuentra en "back/app/lib/database.php"

Como recomendación es mejor colocar tanto el front como el back en el directorio donde se encuentran nuestras aplicaciones web ya 
sea en www o htdocs, ya que si lo hacemos desde otro lado como por "Descargar" o "Escritorio" nos dará problemas de comunicación. 
