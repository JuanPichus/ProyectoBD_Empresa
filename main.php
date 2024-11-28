<?php
$conexion = new mysqli('localhost', 'root', /*contrasena*/ '', 'bd_enterprise') or die("Fallo en la Conexion");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise</title>
</head>

<body>
    <?php
    $sql_query = $conexion->query("SELECT * FROM trabajador_puesto");
    while ($valores = mysqli_fetch_array($sql_query)) {
        echo $valores['Nombre'];
    }
    ?>

</body>

</html>