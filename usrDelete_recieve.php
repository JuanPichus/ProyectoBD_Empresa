<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'menu.php'; ?>
</head>

<body>
    <?php
    $servidor = "localhost";
    $usuario = "root";
    $pwd = "";
    $bd = "bd_enterprise";

    $conexion = new mysqli($servidor, $usuario, $pwd, $bd);

    if ($conexion->connect_error) {
        die("Error de conexion: " . $conexion->connect_error);
    }

    if (isset($_POST['Eliminar'])) {
        $usrID = $_REQUEST['usrID'];

        $deleteUsuario = $conexion->prepare("DELETE FROM usuario WHERE ID_Usuario = ?");
        $deleteUsuario->bind_param("i", $usrID);

        if ($deleteUsuario->execute()) {
            if ($deleteUsuario->affected_rows > 0) {
                echo "Usuario eliminado correctamente.";
            } else {
                echo "Error al eliminar al Usuario o no existe.";
            }
        } else {
            echo "ERROR";
        }
    } else {
        echo "Accion cancelada";
    }
    $conexion->close();
    ?>
</body>

</html>