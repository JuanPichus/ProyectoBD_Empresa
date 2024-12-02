<html>

<head>
    <?php include 'menu.php'; ?>

<body>
    <?php
    $servidor = "localhost";
    $usuario = "root";
    $pwd = "";
    $bd = "bd_enterprise";

    $conexion = new mysqli($servidor, $usuario, $pwd, $bd);

    //codigo para checar si agluna factura esta relacionada al cliente buscando entre los ClienteFK de las facturas, y si se encuentra al que se quiere eliminar, que no deje, en cambio que lo borre

    $ID = $_REQUEST['ID'];

    $verificarFactura = $conexion->prepare("SELECT COUNT(*) AS total FROM factura WHERE ClienteFK = ?");
    $verificarFactura->bind_param("i", $ID);
    $verificarFactura->execute();
    $resultado = $verificarFactura->get_result();
    $datos = $resultado->fetch_assoc();

    if ($datos['total'] > 0) {
        // El cliente está relacionado con una factura
        echo "No se puede eliminar el cliente porque está relacionado con " . $datos['total'] . " factura(s).";
    } else {
        // Eliminar el cliente si no está relacionado con ninguna factura
        $sql = $conexion->prepare("DELETE FROM cliente WHERE ID_Cliente = ?");
        $sql->bind_param("i", $ID);

        if ($sql->execute()) {
            echo "Cliente eliminado correctamente.";
        } else {
            echo "Error al eliminar el cliente: " . $conexion->error;
        }
    }

    $conexion->close();
    ?>
</body>

</html>