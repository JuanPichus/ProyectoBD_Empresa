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

    $nombre = $_REQUEST['nombre'];
    $ape_paterno = $_REQUEST['ape_paterno'];
    $ape_materno = $_REQUEST['ape_materno'];
    $fecha_nac = $_REQUEST['fecha_nac'];
    $sueldo = $_REQUEST['sueldo'];
    $sexo = $_REQUEST['sexo'];
    $telefono = $_REQUEST['tel'];
    $puesto = $_REQUEST['puesto'];
    $trabajador = $_REQUEST['trabajador'];

    $sql = "UPDATE trabajador SET Nombre='$nombre', Apellido_Paterno='$ape_paterno', Apellido_Materno='$ape_materno', 
        Fecha_Nacimiento='$fecha_nac', Sueldo='$sueldo', Sexo='$sexo', Telefono='$telefono', PuestoFK='$puesto' WHERE Nomina = '$trabajador'";

    if ($conexion->query($sql) === TRUE) {
        echo "Trabajador modificado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>