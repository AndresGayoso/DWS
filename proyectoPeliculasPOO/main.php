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
director int (id FK tabla director(id))
rating float (valoracion)
estreno int (año)
categoria int (id FK tabla categoria(id))
edad_min int (edad minima para ver la pelicula)

Tabla Directores
id int(id director)
nombre varchar(25) (nombre director)

Tabla Multimedia
id int (id imagen)
peliculas_id int (id pelicula)
imagen varchar(200) (url de la imagen)

Tabla Categoria
id int (id categoria)
categoria varchar(25) (nombre categoria)
 */



/*
echo "<pre>";
var_dump();
echo "</pre>";*/