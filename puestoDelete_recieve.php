<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <?php
    $servidor = "localhost";
    $usuario = "root";
    $pwd = "";
    $bd = "bd_enterprise";

    $conexion = new mysqli($servidor, $usuario, $pwd, $bd);

    $ID_Puesto = $_REQUEST['Puesto'];

    $sql = "DELETE FROM puesto WHERE ID_Puesto = '$ID_Puesto'";

    if ($conexion->query($sql) === TRUE) {
        echo "Puesto eliminado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>