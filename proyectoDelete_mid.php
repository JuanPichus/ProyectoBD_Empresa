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

    $proyectoID = $_REQUEST['proyecto'];

    $proyecto = $conexion->prepare("SELECT * FROM proyecto WHERE ID_Proyecto = ?");
    $proyecto->bind_param("i", $proyectoID);
    $proyecto->execute();
    $proyectoEliminar = $proyecto->get_result();

    if ($proyectoEliminar->num_rows > 0) {
        $datos = $proyectoEliminar->fetch_assoc();

        echo "Nombre: " . $datos["Nombre_Proyecto"] . "<br>";
        echo "Fecha Inicio: " . $datos["Fecha_Inicio"] . "<br>";
        echo "Fecha Fin: " . $datos["Fecha_Fin"] . "<br>";
        echo "Presupuesto: " . $datos["Presupuesto"] . "<br>";
        echo "Descripcion: " . $datos["Descripcion"] . "<br>";
        echo "<br><br>";


        echo '<form action="proyectoDelete_recieve.php" method="post">';
        echo '<input type="hidden" name="proyecto" value="' . $proyectoID . '">';
        echo '<input type = "submit" name="Eliminar" value="Eliminar">';
        echo '<input type = "submit" name="Cancelar" value="Cancelar">';
        echo '</form>';
    }
    ?>
</body>

</html>