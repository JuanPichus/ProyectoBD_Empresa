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
        $asignacionID = $_REQUEST['asignacion'];

        $deleteAsig = $conexion->prepare("DELETE FROM asignacion WHERE ID = ?");
        $deleteAsig->bind_param("i", $asignacionID);
        $deleteAsig->execute();

        if ($deleteAsig->affected_rows > 0) {
            echo "Asignacion eliminada correctamente.";
        } else {
            echo "Error al eliminar la asignacion o no existe.";
        }
    } else {
        echo "Accion cancelada";
    }
    $conexion->close();
    ?>
</body>

</html>