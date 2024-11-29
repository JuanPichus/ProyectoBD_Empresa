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
    $salario_base = $_REQUEST['salario_base'];
    $descripcion = $_REQUEST['descripcion'];

    $sql = "INSERT INTO puesto (Nombre_Puesto, Salario_Base, Descripcion) 
        VALUES ('$nombre', '$salario_base', '$descripcion')";

    if ($conexion->query($sql) === TRUE) {
        echo "Nuevo trabajador registrado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>