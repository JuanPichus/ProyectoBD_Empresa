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

    $id = $_REQUEST['ID'];
    $nombre = $_REQUEST['nombre'];
    $ape_paterno = $_REQUEST['ape_paterno'];
    $ape_materno = $_REQUEST['ape_materno'];
    $telefono = $_REQUEST['tel'];
    $correo = $_REQUEST['correo'];
    $IDeditar2 = $_REQUEST['editar'];

    $sql = "UPDATE cliente SET ID_Cliente='$id', Nombre='$nombre', Apellido_Paterno='$ape_paterno', Apellido_Materno='$ape_materno', 
        Telefono='$telefono', Correo='$correo' WHERE ID_Cliente = '$IDeditar2'";

    if ($conexion->query($sql) === TRUE) {
        echo "Trabajador modificado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>