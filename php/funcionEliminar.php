<?php
include 'parametros.php';

function EliminarUsuario($conn){

if(isset($_POST['id'])){ //si id existe y tiene un valor entonces:

    $id = $_POST['id'];

    $sql = "DELETE FROM usuario WHERE id_u = $id";


    if(mysqli_query($conn, $sql)){
        
        // redirigir
        header("Location: ../index.php");
    }else{
        echo "Error al eliminar usuario:" .mysqli_error($conn);
    }
}

}

EliminarUsuario($conn);
mysqli_close($conn);
?>
