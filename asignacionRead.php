<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>

    <?php
    $query = $mysqli->query("SELECT * FROM asignacion");
    while ($valores = mysqli_fetch_array($query)) {
        echo "ID: " . $valores["ID"] . "<br>";
        echo "Fecha de inicio: " . $valores["Fecha_Inicio"] . "<br>";
        echo "Fecha de finalización: " . $valores["Fecha_Fin"] . "<br>";
        echo "Trabajador: " . $valores["TrabajadorFK"] . "<br>";
        echo "Proyecto: " . $valores["ProyectoFK"] . "<br><br>";
    }
    ?>
    <br>

    </form>
</body>

</html>