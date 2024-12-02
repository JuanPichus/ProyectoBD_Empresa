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
        $clienteID = $_REQUEST['cliente'];

        $deleteClie = $conexion->prepare("DELETE FROM cliente WHERE ID_Cliente = ?");
        $deleteClie->bind_param("i", $clienteID);

        if ($deleteClie->execute()) {
            if ($deleteClie->affected_rows > 0) {
                echo "Cliente eliminado correctamente.";
            } else {
                echo "Error al eliminar al cliente o no existe.";
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