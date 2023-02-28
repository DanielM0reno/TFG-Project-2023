# tfg-project-2023
Final degree project.

## 27/02/2023
- Se requiere de una plantilla para la zona de administración de una empresa.
- En lugar de partir de 0, y mediante una version estable de Bootstrap 4 se empleará un tema destinado para ello.
- Tema utilizado https://github.com/colorlibhq/AdminLTE en su version gratuita.
    - Donde se incluyen liberias bastantes interesantes y widget que muestra la informacion muy visual y sencilla.
    - Unicamente se empleará la versión gratuita, con licencia MIT.
- Emplearemos de base el fichero "starter.html" que se encuentra dentro del tema.
    - Fichero el cual los desarrolladores recomiendan para orientarse por el tema.
- Screenshot de página de ejemplo de como se podria mostrar la página principal.

![Example1](/screenshots/example1.png)

- Realización de práctica donde se simula una base de datos con facturas y usuarios
- Se muestra en una página de administración el listado de facturas, su gestion para borrado o editar datos
- Y la opción de añadir una factura a la base de datos

![Example2](/screenshots/example2.png)

## 28/02/2023
- Realización de script para insertar masivamente datos en la tabla de facturas
    - Ver script 'script-insert_data.php' dentro del directorio scripts
- Despues del insertado comprobamos la necesidad de paginación para optimizar el rendimiento de la página
- Para ello empleo ajax para realizar la paginación.
