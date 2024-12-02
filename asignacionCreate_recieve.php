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

    $fechain = $_REQUEST['fechainicio'];
    $fechafin = $_REQUEST['fechafin'];
    $trabajador = $_REQUEST['trabajador'];
    $proyecto = $_REQUEST['proy'];

    $sql = "INSERT INTO asignacion (Fecha_Inicio, Fecha_Fin, TrabajadorFK, ProyectoFK) 
        VALUES ('$fechain', '$fechafin', '$trabajador', '$proyecto')";

    if ($conexion->query($sql) === TRUE) {
        echo "Asignacion creada correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>