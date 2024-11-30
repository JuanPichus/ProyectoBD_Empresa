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

    $nombre = $_REQUEST['nombre'];
    $salario = $_REQUEST['salario'];
    $descripcion = $_REQUEST['descripcion'];
    $puestoEditar = $_REQUEST['puesto'];

    $sql = "UPDATE puesto SET Nombre_Puesto='$nombre', Salario_Base='$salario', Descripcion='$descripcion' WHERE ID_Puesto = '$puestoEditar'";

    if ($conexion->query($sql) === TRUE) {
        echo "Puesto modificado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>