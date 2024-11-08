<?php

echo 'Hola Mundo'.'<br>';
echo 'Salto de linea'.'<br>';
$edad=18;
$nombre="Marcos";

if($edad>=18){
    echo 'Es mayor de edad<br>';
}else{
    echo 'No es mayor de edad<br>';
}

$i=1;

while($i<10){
    $i+=1;
}
echo $i.'<br>';


$a=1;

for($a;$a<10;$a++){
    $a=$a+1;
    echo 'numero: '.$a;
    echo '<br>';
}

echo '<br>';

$frutas=array("Manzana","Naranja","Platano");

foreach($frutas as $elemento){
    echo $elemento.' ';
}

echo '<br>';

//funciones basicas con parametros
function saludar($nombre){
    return "Hola, ".$nombre;
}
//ingresar parametros
echo saludar("Carlos");

echo '<br>';
$a=1;
$b=1;

function sumar($a,$b){
    return "Suma: ". $a+$b;
}
//ingresar parametros
echo sumar(1,4);



echo '<br>';
//Funcion void, no recibe parametros
function vacia(){
    echo 'Soy una funcion vacia';
}

echo '<br>';

echo vacia();

echo '<br>';



//manejo de errores
try {
    //simulamos un error
    echo 'Simulemos un fallo: ';
    throw new Exception('¡Ocurrió un error intencionado! <br>');

    echo 'Hola Mundo, Aca no hay ningun error';

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}



//Conexion con una base de datos y consulta
/*
$localhost="localhost";
$user="root";
$password="1234";
$dbname="Base-do-datos";

$conn=mysqli_connect("localhost","user","password","dbname");

if(!$conn){
    die("<br> No tenes base de datos mogolico, Conexion Fallida, Walter se la come.");
}

$sql="SELECT * FROM tabla";

//ejectua la consulta
$conn->query($sql);

//guarda la consulta. Recibe 2 parametros, conexion a bbdd y consulta
$respuesta=mysqli_query($conn,$sql);
*/

echo '<br>';

//Include para incluir archivos
include 'archivoAincluir.php';


//Arrays porque puede que lo tome
$colores = array("Rojo","Verde","Azul");

$edades = array("Juan"=>25,"Maria"=>30);

echo 'recorriendo un array con foreach Normal <br>';
foreach($colores as $i){
    echo $i.'<br>';
}


echo '<br>';
echo '<br>';


echo 'recorriendo un array con for a lo GODscript <br>';
for($i=0;$i<count($colores);$i++){
    echo $colores[$i].'<br>';
}
?>