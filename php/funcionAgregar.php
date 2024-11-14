<?php
include 'parametros.php';
error_reporting(E_ALL & ~E_WARNING); 


//verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    agregarUsuario($conn); //Llamar a la funcion
}

function agregarUsuario($conn) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $nroDocumento = $_POST['nroDocumento'];
    $tipoUsuario = $_POST['tipoUsuario'];
    $curso_id = $_POST['curso_id'];
    $sql = "INSERT INTO usuario (nombre, apellido, tipoDocumento, nroDocumento, tipoUsuario, curso_id) 
            VALUES ('$nombre', '$apellido', '$tipoDocumento', $nroDocumento, '$tipoUsuario', $curso_id)";


if($conn->query($sql) === TRUE){ //si se hizo la consulta entonces

    header("Location: ../index.php");  // Redirige a index

}
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Intranet</title>
</head>
<body>
    <h1>Agregar Usuario</h1>

    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br>
        <label for="tipoDocumento">Tipo de Documento:</label>
        <input type="text" id="tipoDocumento" name="tipoDocumento" required>
        <br>
        <label for="nroDocumento">Numero de Documento:</label>
        <input type="number" id="nroDocumento" name="nroDocumento" required>
        <br>
        <label for="tipoUsuario">Tipo de Usuario:</label>
        <input type="text" id="tipoUsuario" name="tipoUsuario" required>
        <br>
        <label for="curso_id">Curso:</label>
        <select id="curso_id" name="curso_id" required>
            <option value="">Seleccione un curso</option>
            <?php
            //obtener los cursos de la bdd
            $sql = "SELECT id_c, anio, division FROM curso";
            $sqlresultado= $conn->query($sql);

            if($sqlresultado->num_rows > 0){ //si hay mas de 0 filas entonces
                while($row = $sqlresultado->fetch_assoc()){ //hace un array asociativo con las filas
                    echo "<option value='" .$row['id_c']. "'>" .$row['anio']. " - " .$row['division']. "</option>";
                    
                }
                
            }
            ?>
        </select>
        <br>
        <input type="submit" name="subirDatos" value="Agregar Usuario">
    </form>
</body>
</html>
