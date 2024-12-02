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

    $trabajadorID = $_REQUEST['nomina'];

    $trab = $conexion->prepare("SELECT * FROM trabajador WHERE Nomina = ?");
    $trab->bind_param("i", $trabajadorID);
    $trab->execute();
    $trabEliminar = $trab->get_result();

    if ($trabEliminar->num_rows > 0) {
        $datos = $trabEliminar->fetch_assoc();

        echo "Nomina: " . $datos["Nomina"] . "<br>";
        echo "Nombre: " . $datos["Nombre"] . "<br>";
        echo "Apellido Paterno: " . $datos["Apellido_Paterno"] . "<br>";
        echo "Apellido Materno: " . $datos["Apellido_Materno"] . "<br>";
        echo "Fecha de Nacimiento: " . $datos["Fecha_Nacimiento"] . "<br>";
        echo "Sueldo: " . $datos["Sueldo"] . "<br>";
        echo "Sexo: " . $datos["Sexo"] . "<br>";
        echo "Telefono: " . $datos["Telefono"] . "<br>";
        echo "<br><br>";


        echo '<form action="trabDelete_recieve.php" method="post">';
        echo '<input type="hidden" name="trabajador" value="' . $trabajadorID . '">';
        echo '<input type = "submit" name="Eliminar" value="Eliminar">';
        echo '<input type = "submit" name="Cancelar" value="Cancelar">';
        echo '</form>';
    } else {
        echo "ERROR";
    }
    ?>
</body>

</html>