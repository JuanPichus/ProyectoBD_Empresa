<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'menu.php'; ?>
</head>

<body>
    <?php
    $servidor = "localhost";
    $usuario = "root";
    $pwd = "";
    $bd = "bd_enterprise";

    $conexion = new mysqli($servidor, $usuario, $pwd, $bd);

    $fecha_fin = $_REQUEST['fecha_fin'];
    $id_proyecto = $_REQUEST['id_proyecto'];

    $sql = "UPDATE proyecto SET Fecha_Fin='$fecha_fin' WHERE ID_Proyecto = '$id_proyecto'";

    if ($conexion->query($sql) === TRUE) {
        echo "Proyecto modificado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>