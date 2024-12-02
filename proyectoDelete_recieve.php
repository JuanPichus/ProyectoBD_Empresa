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
        $proyectoID = $_REQUEST['proyecto'];

        $deleteProy = $conexion->prepare("DELETE FROM proyecto WHERE ID_Proyecto = ?");
        $deleteProy->bind_param("i", $proyectoID);
        $deleteProy->execute();

        if ($deleteProy->affected_rows > 0) {
            echo "Proyecto eliminado correctamente.";
        } else {
            echo "Error al eliminar el proyecto o no existe.";
        }
    } else {
        echo "Accion cancelada";
    }
    $conexion->close();
    ?>
</body>

</html>