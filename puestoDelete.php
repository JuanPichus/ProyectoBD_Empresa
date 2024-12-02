<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="puestoDelete_mid.php" method="post">

        Nombre del Puesto:
        <select name="Puesto">
            <?php
            $query = $mysqli->query("SELECT Nombre_Puesto, ID_Puesto FROM puesto");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores['ID_Puesto'] . '">' . $valores['Nombre_Puesto'] . '</option>';
            }
            ?>
        </select>

        <input type="submit" value="Eliminar">

    </form>
</body>

</html>