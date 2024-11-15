<?php


$host = 'localhost'; 
$dbname = 'archivo'; 
$username = 'root'; 
$password = ''; 

//conecta con bbdd
$conn = mysqli_connect($host, $username, $password, $dbname);


if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

?>