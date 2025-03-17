<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $server = "localhost";
    $usr = "root";
    $pwd = "";
    $bd = "bd_enterprise";

    $conexion = new mysqli($server, $usr, $pwd, $bd);

    if ($conexion->connect_error) {
        die("Conexion fallida: " . $conexion->connect_error);
    }

    $Usuario = $_POST['Usr'];
    $Password = sha1($_POST['Pwd']);

    $query = $conexion->prepare("SELECT * FROM usuario WHERE Usuario = ? AND Password = ?");
    $query->bind_param("ss", $Usuario, $Password);
    $query->execute();
    $resultado = $query->get_result();

    if ($resultado->num_rows > 0) {
        // Usuario encontrado
        $usuario = $resultado->fetch_assoc();
        $_SESSION['tipoUsuario'] = $usuario['Tipo']; // Guarda el tipo de usuario en la sesión
        $_SESSION['nombreUsuario'] = $usuario['Usuario']; // Guarda el nombre del usuario

        // Redirige al menú principal
        header('Location: menu.php');
        exit();
    } else {
        // Usuario o contraseña incorrectos
        echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href='login.html';</script>";
        exit();
    }

    $query->close();
    $conexion->close();
}
