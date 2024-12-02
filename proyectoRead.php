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
    <a href="Reporte_Proy.php">
        <button>Descargar Reporte</button>
        <br><br>
    </a>

    <?php
    $query = $mysqli->query("SELECT * FROM proyecto");
    while ($valores = mysqli_fetch_array($query)) {
        showProyecto($valores);
    }

    function showProyecto($datosProyecto)
    {
        echo "Nombre: " . $datosProyecto["Nombre_Proyecto"] . "<br>";
        echo "Fecha Inicio: " . $datosProyecto["Fecha_Inicio"] . "<br>";
        echo "Fecha Fin: " . $datosProyecto["Fecha_Fin"] . "<br>";
        echo "Presupuesto: " . $datosProyecto["Presupuesto"] . "<br>";
        echo "Descripcion: " . $datosProyecto["Descripcion"] . "<br>";
        echo "<br><br>";
    }
    ?>
</body>

</html>