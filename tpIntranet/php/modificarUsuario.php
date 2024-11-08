<?php
include 'parametros.php';

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si se ha enviado el id del usuario a modificar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener datos del usuario a modificar
    $sql = "SELECT * FROM usuario WHERE id_u = $id";
    $result = mysqli_query($conn, $sql);

    // Verificar si la consulta devuelve algún resultado
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        die("Usuario no encontrado.");
    }
}

// Verificar si se ha enviado el formulario de modificación
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $nroDocumento = $_POST['nroDocumento'];
    $curso_id = $_POST['curso_id'];

    // Actualizar los datos del usuario en la base de datos
    $updateSql = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', tipoDocumento = '$tipoDocumento', nroDocumento = '$nroDocumento', curso_id = '$curso_id' WHERE id_u = $id";

    if (mysqli_query($conn, $updateSql)) {
        header("location:../index.php");
    } else {
        echo "Error al actualizar el usuario: " . mysqli_error($conn);
    }
}

// Cerrar conexión
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
</head>
<body>
    <h1>Modificar Usuario</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($user) ? $user['id_u'] : ''; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo isset($user) ? $user['nombre'] : ''; ?>" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo isset($user) ? $user['apellido'] : ''; ?>" required>
        <br>
        <label for="tipoDocumento">Tipo de Documento:</label>
        <input type="text" name="tipoDocumento" value="<?php echo isset($user) ? $user['tipoDocumento'] : ''; ?>" required>
        <br>
        <label for="nroDocumento">Número de Documento:</label>
        <input type="number" name="nroDocumento" value="<?php echo isset($user) ? $user['nroDocumento'] : ''; ?>" required>
        <br>
        <label for="curso_id">Curso ID:</label>
        <input type="number" name="curso_id" value="<?php echo isset($user) ? $user['curso_id'] : ''; ?>" required>
        <br>
        <button type="submit">Actualizar Usuario</button>
    </form>
</body>
</html>
