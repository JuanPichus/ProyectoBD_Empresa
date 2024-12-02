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
        $puestoID = $_REQUEST['puesto'];

        $deletePuesto = $conexion->prepare("DELETE FROM puesto WHERE ID_Puesto = ?");
        $deletePuesto->bind_param("i", $puestoID);

        if ($deletePuesto->execute()) {
            if ($deletePuesto->affected_rows > 0) {
                echo "Puesto eliminado correctamente.";
            } else {
                echo "Error al eliminar el puesto, o no existe.";
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