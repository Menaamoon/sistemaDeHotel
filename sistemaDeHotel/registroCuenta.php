<?php


include 'conexion.php';
if (!isset($conn)) {
    die("Error: La conexión no se ha establecido. Verifica que el archivo conexion.php se está incluyendo correctamente.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);


    $verificarCorreo = $conn->prepare("SELECT id FROM clientes WHERE correo = ?");
    $verificarCorreo->bind_param("s", $correo);
    $verificarCorreo->execute();
    $resultado = $verificarCorreo->get_result();

    if ($resultado->num_rows > 0) {
        echo "<script>alert('El correo ya está registrado.'); window.location.href='registro.php';</script>";
        exit();
    }

    $sql = $conn->prepare("INSERT INTO clientes (nombre, correo, contraseña) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $nombre, $correo, $contraseña);

    if ($sql->execute()) {
        echo "<script>alert('Registro exitoso. Ahora puedes iniciar sesión.'); window.location.href='inicioDeSesion.php';</script>";
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
    $verificarCorreo->close();
}

$conn->close();
?>
