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

    $sql = "INSERT INTO cliente (Nombre, Apellido_Paterno, Apellido_Materno, Telefono, Correo) VALUES ('$nombre', '$ape_paterno', '$ape_materno', '$telefono', '$correo')";

    if ($conexion->query($sql) === TRUE) {
        echo "Cliente registrado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>