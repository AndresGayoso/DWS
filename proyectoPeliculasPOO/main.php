<?php
/*
Filtrar por rating(seguro),
Filtrar por categoria(seguro),
Filtrar por año (antigua a nueva o viceversa || probar),
Filtrar por director (probar),
Filtrar por edad (mayor a menos o viceversa || probar)
*/

/*
 DB Estructura:
Tabla Peliculas
id int (identificador PK)
nombre varchar(25) (nombre pelicula)
duracion varchar(25) (tiempo pelicula formato h : m)
director int (id ref Directores FK)
rating float (valoracion)
estreno int (año)
edad_min int (edad minima para ver la pelicula)

Tabla Directores
id int(id director PK)
nombre varchar(25) (nombre director)

Tabla Multimedia
id int (id imagen PK)
peliculas_id int (id pelicula FK)
imagen varchar(200) (url de la imagen)

Tabla Categorias
id int (id categoria PK)
categoria varchar(25) (nombre categoria)


Tabla CategoriaPeliclas
id (PK)
pelicula_id (id ref tabla pelicula FK)
categoria_id (id ref tabal categorias FK)

 */



/*
echo "<pre>";
var_dump();
echo "</pre>";*/