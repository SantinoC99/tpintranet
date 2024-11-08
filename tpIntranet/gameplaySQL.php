<?php
include 'php/parametros.php';

$consultaSelect='SELECT * FROM usuario WHERE id_u=280';

$res=mysqli_query($conn,$consultaSelect);

if (mysqli_num_rows($res) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo De Usuario</th>
                <th>Tipo De Documento</th>
                <th>Numero De Documento</th>
            </tr>";
    // Salida de datos de cada fila
    while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>
            <td>{$row['id_u']}</td>
            <td>{$row['nombre']}</td>
            <td>{$row['apellido']}</td>
            <td>{$row['tipoUsuario']}</td>
            <td>{$row['tipoDocumento']}</td>
            <td>{$row['nroDocumento']}</td>
        </tr>";

        }
        echo "</table>";
} else {
    echo "No se encontraron usuarios."; // Mensaje si no hay usuarios
}

//<------------------------------------------------------------------------------------------------>
echo '<br><br><br><br><br><br><br><br>';

$consultaJoin='SELECT usuario.id_u,usuario.nombre,usuario.apellido,curso.anio,curso.division
FROM usuario
JOIN curso ON usuario.curso_id=curso.id_c';

$res2=mysqli_query($conn,$consultaJoin);

if (mysqli_num_rows($res2) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Año</th>
                <th>División</th>
            </tr>";
    // Salida de datos de cada fila
    while ($row = mysqli_fetch_assoc($res2)) {
            echo "<tr>
            <td>{$row['id_u']}</td>
            <td>{$row['nombre']}</td>
            <td>{$row['apellido']}</td>
            <td>{$row['anio']}</td>
            <td>{$row['division']}</td>
        </tr>";

        }
        echo "</table>";
} else {
    echo "No se encontraron usuarios."; // Mensaje si no hay usuarios
}
?>