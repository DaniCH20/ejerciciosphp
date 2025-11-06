/*
 Mostrar todos los usuarios ordenados por apellido alfabéticamente
*/
SELECT id, nombre, apellido, login
FROM usuario
ORDER BY apellido ASC;
/*
Mostrar los nombres y apellidos de los usuarios cuyo ciclo sea ‘DAM’
*/
SELECT u.nombre, u.apellido
FROM usuario u
JOIN usuario_ciclo uc ON u.id = uc.usuario_id
JOIN ciclo c ON uc.ciclo_id = c.id
WHERE c.nombre = 'DAM';

/*
Mostrar los usuarios cuyo teléfono principal comience con “9”
*/
SELECT nombre, apellido, telefono1
FROM usuario
WHERE telefono1 LIKE '9%';

/*
Mostrar las asignaturas que tengan más de 150 horas totales
*/
SELECT nombre, horasTotales
FROM asignatura
WHERE horasTotales > 150;

/*
Mostrar los ciclos y su periodo
*/
SELECT nombre AS Ciclo, periodo
FROM ciclo;

/*
Mostrar el nombre, apellido y rol de cada usuario
*/
SELECT u.nombre, u.apellido, r.nombre AS rol
FROM usuario u
JOIN rol_usuario ru ON u.id = ru.usuario_id
JOIN roles r ON ru.rol_id = r.id;

/*
Mostrar los nombres de los usuarios y el ciclo al que pertenecen
*/
SELECT u.nombre, u.apellido, c.nombre AS ciclo
FROM usuario u
JOIN usuario_ciclo uc ON u.id = uc.usuario_id
JOIN ciclo c ON uc.ciclo_id = c.id;
/*
Mostrar las asignaturas junto al ciclo donde se imparten
*/
SELECT a.nombre AS Asignatura, c.nombre AS Ciclo
FROM asignatura a
JOIN asignatura_ciclo ac ON a.id = ac.asignatura_id
JOIN ciclo c ON ac.ciclo_id = c.id;

/*
Mostrar todas las reuniones con el nombre del estado asociado
*/
SELECT r.titulo, r.asunto, e.nombre AS Estado
FROM reunion r
JOIN estado e ON r.estado_id = e.id;

/*
Mostrar los usuarios que tengan rol “Profesor” y su ciclo
*/
SELECT u.nombre, u.apellido, c.nombre AS ciclo
FROM usuario u
JOIN usuario_ciclo uc ON u.id = uc.usuario_id
JOIN ciclo c ON uc.ciclo_id = c.id
JOIN rol_usuario ru ON u.id = ru.usuario_id
JOIN roles r ON ru.rol_id = r.id
WHERE r.nombre = 'Profesor';

/*
Contar cuántos usuarios hay en cada ciclo
*/
SELECT c.nombre AS Ciclo, COUNT(u.id) AS NumeroUsuarios
FROM usuario u
JOIN usuario_ciclo uc ON u.id = uc.usuario_id
JOIN ciclo c ON uc.ciclo_id = c.id
GROUP BY c.nombre;

/*
Contar cuántas asignaturas tiene cada ciclo
*/
SELECT c.nombre AS Ciclo, COUNT(a.id) AS TotalAsignaturas
FROM ciclo c
JOIN asignatura_ciclo ac ON c.id = ac.ciclo_id
JOIN asignatura a ON ac.asignatura_id = a.id
GROUP BY c.nombre;

/*
Mostrar la media de horas de las asignaturas por ciclo
*/
SELECT c.nombre AS Ciclo, AVG(a.horasTotales) AS PromedioHoras
FROM ciclo c
JOIN asignatura_ciclo ac ON c.id = ac.ciclo_id
JOIN asignatura a ON ac.asignatura_id = a.id
GROUP BY c.nombre;

/*
Mostrar cuántos usuarios hay por rol
*/
SELECT r.nombre AS Rol, COUNT(ru.usuario_id) AS TotalUsuarios
FROM roles r
JOIN rol_usuario ru ON r.id = ru.rol_id
GROUP BY r.nombre;

/*
Mostrar los usuarios que pertenecen al ciclo con más asignaturas
*/
SELECT u.nombre, u.apellido
FROM usuario u
JOIN usuario_ciclo uc ON u.id = uc.usuario_id
WHERE uc.ciclo_id = (
    SELECT c.id
    FROM ciclo c
    JOIN asignatura_ciclo ac ON c.id = ac.ciclo_id
    GROUP BY c.id
    ORDER BY COUNT(ac.asignatura_id) DESC
    LIMIT 1
);

/*
Mostrar las asignaturas que tienen más horas que la media general
*/
SELECT nombre, horasTotales
FROM asignatura
WHERE horasTotales > (SELECT AVG(horasTotales) FROM asignatura);

/*
Muestra los nombres y apellidos de los usuarios cuyo rol sea “Alumno” y pertenezcan al ciclo “DAW”.
*/
SELECT u.nombre, u.apellido
FROM usuario u
JOIN usuario_ciclo uc ON u.id = uc.usuario_id
JOIN ciclo c ON uc.ciclo_id = c.id
JOIN rol_usuario ru ON u.id = ru.usuario_id
JOIN roles r ON ru.rol_id = r.id
WHERE r.nombre = 'Alumno' AND c.nombre = 'DAW';

/*
Muestra todas las reuniones que aún estén “Pendientes” y se realizan en el aula 106.
*/
SELECT r.titulo, r.asunto, r.hora
FROM reunion r
JOIN estado e ON r.estado_id = e.id
WHERE e.nombre = 'Pendiente' AND r.aula = 'Aula 106';

/*
Muestra los profesores que imparten asignaturas del ciclo ‘ASIR’
*/
SELECT DISTINCT u.nombre, u.apellido
FROM usuario u
JOIN rol_usuario ru ON u.id = ru.usuario_id
JOIN roles r ON ru.rol_id = r.id
JOIN usuario_ciclo uc ON u.id = uc.usuario_id
JOIN ciclo c ON uc.ciclo_id = c.id
WHERE r.nombre = 'Profesor' AND c.nombre = 'ASIR';

/*
Muestra los nombres de los usuarios y sus reuniones confirmadas
*/
SELECT u.nombre, u.apellido, re.titulo, e.nombre AS Estado
FROM usuario u
JOIN reunion re ON u.dni IN (re.dni1, re.dni2)
JOIN estado e ON re.estado_id = e.id
WHERE e.nombre = 'Confirmado';

/*
🧠💥 Ejercicios SQL (sin soluciones)
1️⃣

Obtén el nombre completo y el ciclo de los usuarios que tengan más de un número de teléfono registrado (es decir, ambos telefono1 y telefono2 no nulos).
*/
SELECT u.nombre, u.apellido, c.nombre AS ciclo
FROM usuario u
JOIN usuario_ciclo uc ON u.id = uc.usuario_id
JOIN ciclo c ON uc.ciclo_id = c.id
WHERE u.telefono1 IS NOT NULL AND u.telefono2 IS NOT NULL
AND u.telefono1 <> '' AND u.telefono2 <> '';
/*
2️⃣

Muestra el nombre del ciclo y el total de horas de todas sus asignaturas sumadas.
Ordena el resultado de mayor a menor total de horas.
*/
SELECT c.nombre , sum(a.horasTotales) as horasTotales
FROM ciclo c 
JOIN asignatura_ciclo ac ON c.id=ac.ciclo_id
JOIN asignatura a ON ac.asignatura_id=a.id
GROUP BY c.nombre
ORDER BY horasTotales DESC;

/*
3️⃣

Lista los nombres y apellidos de los usuarios cuyo rol no sea “Alumno” ni “Profesor”.
Ordena alfabéticamente por apellido.
*/
SELECT u.nombre , u.apellido , r.nombre
FROM usuario u
JOIN rol_usuario ru ON u.id=ru.usuario_id
JOIN roles r ON ru.rol_id=r.id
WHERE r.nombre !="Alumno" and r.nombre!="Profesor"
ORDER BY u.apellido ;
/*
4️⃣

Muestra el nombre de las asignaturas que no pertenecen a ningún ciclo en la tabla asignatura_ciclo.
*/
SELECT a.nombre
FROM asignatura a
LEFT JOIN asignatura_ciclo ac ON a.id = ac.asignatura_id
WHERE ac.id IS NULL;
/*

5️⃣

Encuentra los ciclos que tengan más de 2 asignaturas y muestra su nombre junto con la cantidad exacta de asignaturas que tienen.
*/
SELECT c.nombre, COUNT(a.id) AS total_asignaturas
FROM ciclo c
JOIN asignatura_ciclo ac ON c.id = ac.ciclo_id
JOIN asignatura a ON ac.asignatura_id = a.id
GROUP BY c.nombre
HAVING COUNT(a.id) > 2;

/*
6️⃣

Muestra el nombre, apellido y rol de los usuarios que pertenezcan al ciclo “DAM” y cuyo rol no sea “Alumno”.
*/
SELECT u.nombre, u.apellido, r.nombre AS rol
FROM usuario u
JOIN usuario_ciclo uc ON u.id = uc.usuario_id
JOIN ciclo c ON uc.ciclo_id = c.id
JOIN rol_usuario ru ON u.id = ru.usuario_id
JOIN roles r ON ru.rol_id = r.id
WHERE c.nombre = 'DAM' AND r.nombre <> 'Alumno';

/*
7️⃣

Obtén el nombre completo de los usuarios que participan en al menos una reunión confirmada (estado = 'Confirmado').
*/
-- Si existiera una tabla reunion_usuario(usuario_id, reunion_id)
SELECT DISTINCT u.nombre, u.apellido
FROM usuario u
JOIN reunion_usuario ru ON u.id = ru.usuario_id
JOIN reunion r ON ru.reunion_id = r.id
JOIN estado e ON r.estado_id = e.id
WHERE e.nombre = 'Confirmado';

/*
8️⃣

Muestra todos los usuarios cuya dirección contenga la palabra “Calle” y su correspondiente rol.
*/
SELECT u.nombre, u.apellido, r.nombre AS rol
FROM usuario u
JOIN rol_usuario ru ON u.id = ru.usuario_id
JOIN roles r ON ru.rol_id = r.id
WHERE u.direccion LIKE '%Calle%';

/*
9️⃣

Muestra los roles que no tienen usuarios asociados en la tabla rol_usuario.
*/
SELECT r.nombre
FROM roles r
LEFT JOIN rol_usuario ru ON r.id = ru.rol_id
WHERE ru.id IS NULL;

/*
🔟

Muestra el nombre de las asignaturas cuyo código sea mayor que la media de los códigos de todas las asignaturas.
*/
SELECT nombre, codigo
FROM asignatura
WHERE codigo > (SELECT AVG(codigo) FROM asignatura);

/*
11️⃣

Obtén el nombre de cada ciclo, junto con el número total de usuarios y el número total de asignaturas asociados a él.
(Muestra ambas cantidades en una misma fila).
*/
SELECT 
    c.nombre AS Ciclo,
    COUNT(DISTINCT uc.usuario_id) AS TotalUsuarios,
    COUNT(DISTINCT ac.asignatura_id) AS TotalAsignaturas
FROM ciclo c
LEFT JOIN usuario_ciclo uc ON c.id = uc.ciclo_id
LEFT JOIN asignatura_ciclo ac ON c.id = ac.ciclo_id
GROUP BY c.nombre;

/*
12️⃣

Muestra el nombre y apellido de los usuarios que no tengan ningún rol asignado en rol_usuario.
*/
SELECT u.nombre, u.apellido
FROM usuario u
LEFT JOIN rol_usuario ru ON u.id = ru.usuario_id
WHERE ru.id IS NULL;

/*
13️⃣

Muestra el nombre de los ciclos que no tengan ningún usuario matriculado en la tabla usuario_ciclo.
*/
SELECT c.nombre
FROM ciclo c
LEFT JOIN usuario_ciclo uc ON c.id = uc.ciclo_id
WHERE uc.id IS NULL;

/*
14️⃣

Muestra las asignaturas y sus horas totales de los ciclos que tengan menos de 3 asignaturas asignadas.
*/
SELECT a.nombre, a.horasTotales, c.nombre AS ciclo
FROM asignatura a
JOIN asignatura_ciclo ac ON a.id = ac.asignatura_id
JOIN ciclo c ON ac.ciclo_id = c.id
WHERE c.id IN (
    SELECT ciclo_id
    FROM asignatura_ciclo
    GROUP BY ciclo_id
    HAVING COUNT(asignatura_id) < 3
);

/*
15️⃣

Crea una consulta que muestre el nombre del ciclo, el promedio de horas por asignatura y el número de asignaturas solo para los ciclos cuyo promedio sea mayor a 150 horas.
*/
SELECT c.nombre , ROUND(AVG(a.horasTotales)) as promedio , COUNT(a.id)
FROM ciclo c 
JOIN asignatura_ciclo ac ON c.id=ac.ciclo_id
JOIN asignatura a ON ac.asignatura_id=a.id
GROUP BY c.nombre 
HAVING AVG(a.horasTotales)>=150;