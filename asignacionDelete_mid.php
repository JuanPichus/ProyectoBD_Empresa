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

    if ($conexion->connect_error) {
        die("Error de conexion: " . $conexion->connect_error);
    }

    $asignacionID = $_REQUEST['IDdelete'];

    $asignacion = $conexion->prepare("SELECT * FROM asignacion WHERE ID = ?");
    $asignacion->bind_param("i", $asignacionID);
    $asignacion->execute();
    $asignacionEliminar = $asignacion->get_result();

    if ($asignacionEliminar->num_rows > 0) {
        $datos = $asignacionEliminar->fetch_assoc();

        echo "ID: " . $datos["ID"] . "<br>";
        echo "Fecha Inicio: " . $datos["Fecha_Inicio"] . "<br>";
        echo "Fecha Fin: " . $datos["Fecha_Fin"] . "<br>";
        echo "Nomina de Trabajador: " . $datos["TrabajadorFK"] . "<br>";
        echo "ID del proyecto: " . $datos["ProyectoFK"] . "<br>";
        echo "<br><br>";


        echo '<form action="asignacionDelete_recieve.php" method="post">';
        echo '<input type="hidden" name="asignacion" value="' . $asignacionID . '">';
        echo '<input type = "submit" name="Eliminar" value="Eliminar">';
        echo '<input type = "submit" name="Cancelar" value="Cancelar">';
        echo '</form>';
    }
    ?>
</body>

</html>