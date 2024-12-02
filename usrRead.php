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
    $query = $mysqli->query("SELECT * FROM usuario");
    while ($valores = mysqli_fetch_array($query)) {
        showProyecto($valores);
    }

    function showProyecto($datos)
    {
        echo "ID Usuario: " . $datos["ID_Usuario"] . "<br>";
        echo "Nombre de Usuario: " . $datos["Usuario"] . "<br>";
        echo "Contraseña Encriptada: " . $datos["Password"] . "<br>";
        echo "Tipo: " . $datos["Tipo"] . "<br>";
        echo "<br><br>";
    }
    ?>
</body>

</html>