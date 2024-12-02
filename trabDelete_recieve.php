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
        $trabID = $_REQUEST['trabajador'];

        $deleteTrab = $conexion->prepare("DELETE FROM trabajador WHERE Nomina = ?");
        $deleteTrab->bind_param("i", $trabID);

        if ($deleteTrab->execute()) {
            if ($deleteTrab->affected_rows > 0) {
                echo "Trabajador eliminado correctamente.";
            } else {
                echo "Error al eliminar al trabajador o no existe.";
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