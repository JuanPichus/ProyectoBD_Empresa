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

    $nomina = $_REQUEST['nomina'];

    $sql = "DELETE FROM trabajador WHERE Nomina = '$nomina'";

    if ($conexion->query($sql) === TRUE) {
        echo "Trabajador eliminado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>