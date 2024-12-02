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
    $ape_paterno = $_REQUEST['ape_paterno'];
    $ape_materno = $_REQUEST['ape_materno'];
    $telefono = $_REQUEST['tel'];
    $correo = $_REQUEST['correo'];
    $IDeditar = $_REQUEST['IDeditar'];

    $sql = "UPDATE cliente SET Nombre='$nombre', Apellido_Paterno='$ape_paterno', Apellido_Materno='$ape_materno', 
        Telefono='$telefono', Correo='$correo' WHERE ID_Cliente = '$IDeditar'";

    if ($conexion->query($sql) === TRUE) {
        echo "Trabajador modificado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>