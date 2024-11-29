<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menuJefe.php'; ?>
</head>

<body>

    <?php
    $query = $mysqli->query("SELECT * FROM cliente");
    while ($valores = mysqli_fetch_array($query)) {
        echo "ID: " . $valores["ID_Cliente"] . "<br>";
        echo "Nombre: " . $valores["Nombre"] . "<br>";
        echo "Apellido Materno: " . $valores["Apellido_Paterno"] . "<br>";
        echo "Apellido Paterno: " . $valores["Apellido_Materno"] . "<br>";
        echo "Teléfono: " . $valores["Telefono"] . "<br>";
        echo "Correo: " . $valores["Correo"] . "<br><br>";
    }
    ?>
    <br>

    </form>
</body>

</html>