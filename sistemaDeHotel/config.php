<?php
$host = 'localhost';
$datanombre = 'hotelReservas';
$usuario = 'root';
$contraseña = '';

$conn = new mysqli($host, $usuario, $contraseña, $datanombre);

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}
?>