<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>

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
    $query = $mysqli->query("SELECT * FROM factura");
    while ($valores = mysqli_fetch_array($query)) {
        echo "Registro: " . $valores["ID_Factura"] . "<br>";
        echo "Fecha de Emicion: " . $valores["Fecha_Emicion"] . "<br>";
        echo "Monto total: " . $valores["Monto"] . "<br>";
        show_cliente($valores['ClienteFK'], $mysqli);
        show_proyecto($valores['ProyectoFK'], $mysqli);
        echo "<br><br>";
    }

    function show_cliente($cliente, $mysqli)
    {
        $query_cliente = $mysqli->prepare("SELECT Nombre, Apellido_Paterno FROM cliente WHERE ID_Cliente = ?");
        $query_cliente->bind_param("i", $cliente);
        $query_cliente->execute();
        $clienteResultado = $query_cliente->get_result();

        if ($clienteResultado->num_rows > 0)
            $nombreCliente = $clienteResultado->fetch_assoc();
        echo "Cliente: " . $nombreCliente['Nombre'] . " " . $nombreCliente['Apellido_Paterno'] . "<br>";
    }

    function show_proyecto($proyecto, $mysqli)
    {
        $query_proyecto = $mysqli->prepare("SELECT Nombre_Proyecto FROM proyecto WHERE ID_Proyecto = ?");
        $query_proyecto->bind_param("i", $proyecto);
        $query_proyecto->execute();
        $proyectoResultado = $query_proyecto->get_result();

        if ($proyectoResultado->num_rows > 0)
            $nombreProyecto = $proyectoResultado->fetch_assoc();
        echo "Proyecto: " . $nombreProyecto['Nombre_Proyecto'] . "<br>";
    }

    ?>
</body>

</html>