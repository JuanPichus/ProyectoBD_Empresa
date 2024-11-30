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
    $nombre = $_REQUEST['nombre'];
    $ape_paterno = $_REQUEST['ape_paterno'];
    $ape_materno = $_REQUEST['ape_materno'];
    $fecha_nac = $_REQUEST['fecha_nac'];
    $sueldo = $_REQUEST['sueldo'];
    $sexo = $_REQUEST['sexo'];
    $telefono = $_REQUEST['tel'];
    $puesto = $_REQUEST['puesto'];

    $sql = "INSERT INTO trabajador (Nomina, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Sueldo, Sexo, Telefono, PuestoFK) 
        VALUES ('$nomina', '$nombre', '$ape_paterno', '$ape_materno', '$fecha_nac', '$sueldo', '$sexo', '$telefono', '$puesto')";

    if ($conexion->query($sql) === TRUE) {
        echo "Nuevo trabajador registrado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>