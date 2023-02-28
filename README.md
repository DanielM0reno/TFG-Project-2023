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
- Para ello empleo ajax y la libreria datatable para realizar la paginación.
- Se puede observar la nueva tabla realiada con datatables.

![Example2-Datatable](/screenshots/example2-datatables.png)

- Script para adaptar los botones de la tabla para editar y eliminar elementos.

```
<script type="application/javascript">
    $(document).ready( function () {
        var table = $('#listado_fact').DataTable({
            ajax: 'backend/get_data edit.php',
            columnDefs: [
            {
                targets: -1,
                data: null,
                defaultContent: '<form action="example2-gestionar_fact.php" method="post" class="float-left">'+
                                  '<button type="submit" name="delete" class="badge badge-danger">Borrar</button>'+
                                  '</form><form action="example2-modif_fact.php" method="post" class="float-left">'+
                                    '<button type="submit" name="to_edit" class="badge badge-warning ml-1">Editar</button></form>',
            },
        ],
        });

        $('#listado_fact tbody').on('click', 'button', function () {
          var data = table.row($(this).parents('tr')).data();
          this.value = data[0];
    });
    } );
  </script>
```

![Example2-Datatable with options](/screenshots/example2-datatables_with_options.png)