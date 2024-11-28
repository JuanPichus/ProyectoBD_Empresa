<?php
$server = "localhost";
$usr = "root";
$pwd = "";
$bd = "bd_enterprise";

$conexion = new mysqli($server, $usr, $pwd, $bd);

if ($conexion->connect_error) {
    die("Conexion fallida: " . $conexion->connect_error . "<br>");
} else {
    echo "Conexion exitosa <br>";
}

$Login = $_REQUEST['Login'];

if ($Login) {
    $Usuario = $_REQUEST['Usr'];
    $Password = $_REQUEST['Pwd'];

    $query = $conexion->prepare("SELECT * FROM usuario WHERE Usuario = ? AND Password = ?");
    $query->bind_param("ss", $Usuario, $Password);

    $query->execute();
    $credenciales = $query->get_result();

    if ($credenciales->num_rows > 0) {
        echo "Credencial correcta <br>";
    } else {
        echo "Credencial incorrecta <br>";
    }

    $query->close();
}

$conexion->close();
