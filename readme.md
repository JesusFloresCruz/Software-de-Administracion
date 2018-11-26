## Control de gestion
    


### Configuracion

1.   abrir el documento .env y cambiar los datos para acceder a la base de datos
DB_HOST=localhost
DB_DATABASE=gestor
DB_USERNAME=root
DB_PASSWORD=
(coloque asi, y me sigue botando error)
2.   Crear una base de datos con el nombre `gestor`
3.   Cargar los archivos  sql de la carpeta schema con phpmyadmin
4.   Entrar mediante consola hasta la carpeta del proyecto y ejecutar `composer install`
5.   Empezar a usar

## Paginas activas

1.  /proyectos  ->  muestra y agrega nuevos proyectos
2.  /usuario  ->  agrega usuarios a proyectos
3.  /asignacion  -> muestra y gestiona tareas de proyectos

## Datos de ejemplo

1. Se cargan datos de empresas
2. Se cargan datos de usuarios asignados a proyectos ya creados
3. Se deben cargar tareas desde la seccion proyectos y no desde asignaciones

## Modo de uso

Crear tarea
Para crear una tarea se debe seguir dos opciones
    1. Desde la seccion de proyectos (si aun no se han asignado tareas al proyecto )
    2. Desde la secion de asignaciones, previamente seleccionando un proyecto.

Observaciones:
    - Al eliminar un proyecto este borrara todos los usuarios y tareas asociados.
    - Al eliminar un usuarios este borrara  todas las tareas realizadas


### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
