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

    $puestoID = $_REQUEST['Puesto'];

    $puesto = $conexion->prepare("SELECT * FROM puesto WHERE ID_Puesto = ?");
    $puesto->bind_param("i", $puestoID);
    $puesto->execute();
    $puestoEliminar = $puesto->get_result();

    if ($puestoEliminar->num_rows > 0) {
        $datos = $puestoEliminar->fetch_assoc();

        echo "ID: " . $datos["ID_Puesto"] . "<br>";
        echo "Nombre: " . $datos["Nombre_Puesto"] . "<br>";
        echo "Salario Base: " . $datos["Salario_Base"] . "<br>";
        echo "Descripcion: " . $datos["Descripcion"] . "<br>";
        echo "<br><br>";


        echo '<form action="puestoDelete_recieve.php" method="post">';
        echo '<input type="hidden" name="puesto" value="' . $puestoID . '">';
        echo '<input type = "submit" name="Eliminar" value="Eliminar">';
        echo '<input type = "submit" name="Cancelar" value="Cancelar">';
        echo '</form>';
    }
    ?>
</body>

</html>