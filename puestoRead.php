<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>

    <?php
    $query = $mysqli->query("SELECT * FROM puesto");
    while ($valores = mysqli_fetch_array($query)) {
        echo "ID: " . $valores["ID_Puesto"] . "<br>";
        echo "Nombre: " . $valores["Nombre_Puesto"] . "<br>";
        echo "Salario base: " . $valores["Salario_Base"] . "<br>";
        echo "Descripción: " . $valores["Descripcion"] . "<br><br>";
    }
    ?>
    <br>

    </form>
</body>

</html>