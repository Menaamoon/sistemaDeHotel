<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$basedatos = "hoteldatabase";


$conn = new mysqli($servidor, $usuario, $contraseña, $basedatos);


if ($conn->connect_error) {
    die("Error de conexión: ".$conn->connect_error);
}
?>
