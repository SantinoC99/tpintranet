<?php
include 'parametros.php';

//VERIFICA SI SE MANDARON LOS DATOS
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $nroDocumento = $_POST['nroDocumento'];
    $curso_id = $_POST['curso_id'];

    $ActualizarSql = "UPDATE usuario SET 
            nombre = '$nombre', 
            apellido = '$apellido', 
            tipoDocumento = '$tipoDocumento', 
            nroDocumento = '$nroDocumento', 
            curso_id = '$curso_id' 
            WHERE id_u = $id";

    if (mysqli_query($conn, $ActualizarSql)){
        header("Location: ../index.php");
    }else{
        echo "Error al actualizar el usuario: " .mysqli_error($conn);
    }
}

// Verificar si se guardo la id
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del usuario
    $sql= "SELECT * FROM usuario WHERE id_u = $id";
    $datos= mysqli_query($conn, $sql);


    // guardar datos del usuario como array
    $usuario= mysqli_fetch_assoc($datos);
    
}
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
        <!-- campo oculto para el ID del usuario -->
        <input type="hidden" name="id" value="<?php echo isset($usuario) ?$usuario['id_u']: ''; ?>"> <!--id del usuario a modficar, esta en el array pero no se muestra -->

        <label for="nombre">Nombre:</label>
        <!------------------------------ pre-rellena los campos (si usuarios esta definida) usando el array asoc -->
        <input type="text" name="nombre" value="<?php echo isset($usuario) ?$usuario['nombre']: ''; ?>" required>
        <br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo isset($usuario) ?$usuario['apellido']: ''; ?>" required>
        <br>

        <label for="tipoDocumento">Tipo de Documento:</label>
        <input type="text" name="tipoDocumento" value="<?php echo isset($usuario) ? $usuario['tipoDocumento']: ''; ?>" required>
        <br>

        <label for="nroDocumento">Número de Documento:</label>
        <input type="number" name="nroDocumento" value="<?php echo isset($usuario) ? $usuario['nroDocumento']: ''; ?>" required>
        <br>

        <label for="curso_id">Curso ID:</label>
        <input type="number" name="curso_id" value="<?php echo isset($usuario) ? $usuario['curso_id']: ''; ?>" required>
        <br>

        <button type="submit">Actualizar Usuario</button>
    </form>
</body>
</html>
