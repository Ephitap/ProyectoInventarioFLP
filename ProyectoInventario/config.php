<?php

$conn = new mysqli("localhost","root"," ","proyectobodegas");

if($conn->connect_error){
    die('error de conexion' . $conn->connect_error);
}

?>