<html>

<head>
    <?php include 'menuJefe.php'; ?>
</head>

<body>
    <?php
    $servidor = "localhost";
    $usuario = "root";
    $pwd = "";
    $bd = "bd_enterprise";

    $conexion = new mysqli($servidor, $usuario, $pwd, $bd);

    $ID = $_REQUEST['ID'];

    $sql = "DELETE FROM cliente WHERE ID_Cliente = '$ID'";

    if ($conexion->query($sql) === TRUE) {
        echo "Trabajador eliminado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>