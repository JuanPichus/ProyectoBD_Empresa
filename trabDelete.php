<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="trabDelete_mid.php" method="post">

        Nombre del trabajador a eliminar:
        <select name="nomina"><br>
            <?php
            $query = $mysqli->query("SELECT Nomina FROM trabajador");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["Nomina"] . '">' . $valores["Nomina"] . '</option>';
            }
            ?>
        </select>
        <br><br>

        <input type="submit" value="Eliminar">

    </form>
</body>

</html>