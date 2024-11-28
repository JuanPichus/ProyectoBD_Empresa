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
    $resultado = $query->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $tipoUsuario = $usuario['Tipo'];

        switch ($tipoUsuario) {
            case "jefe":
                redirect("mainJefe.php");
                break;
            case "administrador":
                redirect("mainAdmin.php");
                break;
            case "trabajador":
                redirect("mainTrabajador.php");
                break;
            default:
                redirect("LogIn.php");
                break;
        }
    } else {
        redirect("LogIn.php");
    }

    $query->close();
}

$conexion->close();

function redirect($url)
{
    header('Location: ' . $url);
    exit();
}
