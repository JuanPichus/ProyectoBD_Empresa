<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>

    <?php
    $query = $mysqli->query("SELECT * FROM trabajador");
    while ($valores = mysqli_fetch_array($query)) {
        echo "Nomina: " . $valores["Nomina"] . "<br>";
        echo "Nombre: " . $valores["Nombre"] . "<br>";
        echo "Apellido Paterno: " . $valores["Apellido_Paterno"] . "<br>";
        echo "Apellido Materno: " . $valores["Apellido_Materno"] . "<br>";
        echo "Fecha de Nacimiento: " . $valores["Fecha_Nacimiento"] . "<br>";
        echo "Sueldo: " . $valores["Sueldo"] . "<br>";
        echo "Sexo: " . $valores["Sexo"] . "<br>";
        echo "Teléfono : " . $valores["Telefono"] . "<br>";
        echo "Puesto: " . $valores["PuestoFK"] . "<br><br>";
    }
    ?>
    <br>
</body>

</html>