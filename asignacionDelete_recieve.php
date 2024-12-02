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

    $ID = $_REQUEST['IDeditar'];

    $sql = "DELETE FROM asignacion WHERE ID = '$ID'";

    if ($conexion->query($sql) === TRUE) {
        echo "Asignacion eliminada correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>