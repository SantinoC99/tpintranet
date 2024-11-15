<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Intranet</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Lista de Usuarios</h1>

    <?php
    include 'php/parametros.php';



    // Cargar la consulta desde el insertar.sql
    $sql = file_get_contents('sql/insertar.sql');

    // En caso de fallar
    if (!$sql) {
        die("Error al cargar el archivo SQL.");
    }

    // Ejecutar la consulta. Conecta con la bbdd y luego realiza la consulta a la misma
    if (mysqli_query($conn, $sql)) {
        echo "Usuario agregado exitosamente.";
    } else {
        echo "Error al insertar datos: " . mysqli_error($conn);
    }

    $sql = "SELECT id_u, nombre, apellido, tipoDocumento, nroDocumento, tipoUsuario, anio, division
    FROM usuario
    JOIN curso ON usuario.curso_id = curso.id_c;"; 

    $result = mysqli_query($conn, $sql); // Almacenar consulta

    // Mostrar los resultados en una tabla 
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo De Usuario</th>
                    <th>Tipo De Documento</th>
                    <th>Numero De Documento</th>
                    <th>Año</th>
                    <th>División</th>
                    <th>Acciones</th>
                </tr>";
        // Salida de datos de cada fila
        while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                <td>{$row['id_u']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['apellido']}</td>
                <td>{$row['tipoUsuario']}</td>
                <td>{$row['tipoDocumento']}</td>
                <td>{$row['nroDocumento']}</td>
                <td>{$row['anio']}</td>
                <td>{$row['division']}</td>
                <td>
                    <form action='php/modificarUsuario.php' method='GET'>
                        <input type='hidden' name='id' value='{$row['id_u']}'>
                        <button type='submit' class='BotonAcciones'>Editar Usuario</button>
                    </form>
                </td>
            </tr>";

            }
            echo "</table>";
    } else {
        echo "No se encontraron usuarios."; // Mensaje si no hay usuarios
    }


    // Cerrar conexión
    mysqli_close($conn);
    ?>

    <!-- Formulario para agregar un usuario -->
    <form method="POST">
        <button class="agregarUsuario" type="submit">Agregar Usuario</button>
    </form>
</body>
</html>
