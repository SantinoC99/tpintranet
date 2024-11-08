--selecciona TODO de la tabla USUARIO
SELECT * FROM usuario;

SELECT usuario.nombre, usuario.apellido, curso.anio, curso.division
FROM usuario
JOIN curso ON usuario.curso_id=curso.id_c;
--Complicado, Vamo a ver
--Primero selecciona el nombre de la tabla usuario, apellido, etc. Hace lo mismo con la tabla curso.
--Luego le dice "selecciona lo que te dije de la tabla USUARIO (ya que partimos de la misma pq la 
--relacion se hace en el JOIN) Luego relacionalo con curso asi toma lo de curso tmb y una vez que tengas
--seleccionado lo que te dije, efectua la consulta cuando la clave foranea de curso(que indica a que curso
--pertenece el usuario) sea igual al id del curso"

--Sino aca esta la explicacion de chatgpt argentino tmb:

--Esta consulta SQL está buscando información sobre los usuarios y los cursos a los que pertenecen.
--Primero, selecciona el nombre y apellido de los usuarios, y el año y división del curso en el que están.
--Luego, usa el JOIN para combinar la tabla de usuario con la tabla de curso basándose en una relación de 
--claves: el curso_id de cada usuario debe coincidir con el id_c del curso. Es como unir dos listas: una con
--los usuarios y otra con los cursos, de modo que cada usuario tenga su curso correspondiente,
--mostrándote la información combinada de ambas tablas.


--actualiza de la tabla USUARIO. necesito que cambies el APELLIDO por 'Albanes' DONDE el id de usuario sea 3.
UPDATE usuario SET apellido = "Albanes" WHERE id_u=3;



--ELIMINA DE USUARIO DONDE el id de usuario sea 3
DELETE FROM usuario WHERE id_u=3;



--INSERTA dentro de USUARIO en nombre, apellido... los VALORES "Riquelme Albanes","Jose"...
INSERT INTO usuario(nombre,apellido,tipoDocumento,nroDocumento,tipoUsuario)
VALUES("Riquelme Albanes","Jose","DNI",47556821,"Alumno");