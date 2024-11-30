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
    $query = $mysqli->query("SELECT * FROM proyecto");
    while ($valores = mysqli_fetch_array($query)) {
        echo "Nombre: " . $valores["Nombre_Proyecto"] . "<br>";
        echo "Fecha Inicio: " . $valores["Fecha_Inicio"] . "<br>";
        echo "Fecha Fin: " . $valores["Fecha_Fin"] . "<br>";
        echo "Presupuesto: " . $valores["Presupuesto"] . "<br>";
        echo "Descripcion: " . $valores["Descripcion"] . "<br>";
        echo "<br><br>";
    }
    ?>
</body>

</html>