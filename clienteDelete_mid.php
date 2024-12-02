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

    $clienteID = $_REQUEST['ID'];

    $cliente = $conexion->prepare("SELECT * FROM cliente WHERE ID_Cliente = ?");
    $cliente->bind_param("i", $clienteID);
    $cliente->execute();
    $clienteEliminar = $cliente->get_result();

    if ($clienteEliminar->num_rows > 0) {
        $datos = $clienteEliminar->fetch_assoc();

        echo "ID: " . $datos["ID_Cliente"] . "<br>";
        echo "Nombre: " . $datos["Nombre"] . "<br>";
        echo "Apellido Paterno: " . $datos["Apellido_Paterno"] . "<br>";
        echo "Apellido Materno: " . $datos["Apellido_Materno"] . "<br>";
        echo "Telefono: " . $datos["Telefono"] . "<br>";
        echo "Correo: " . $datos["Correo"] . "<br>";
        echo "<br><br>";


        echo '<form action="clienteDelete_recieve.php" method="post">';
        echo '<input type="hidden" name="cliente" value="' . $clienteID . '">';
        echo '<input type = "submit" name="Eliminar" value="Eliminar">';
        echo '<input type = "submit" name="Cancelar" value="Cancelar">';
        echo '</form>';
    }
    ?>
</body>

</html>