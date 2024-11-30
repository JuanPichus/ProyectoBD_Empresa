<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="trabEdit_mid.php" method="post" required>

        Nomina trabajador: <select name="trabajador"><br>
            <?php
            $query = $mysqli->query("SELECT * FROM trabajador");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["Nomina"] . '">' . $valores["Nomina"] . '</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Editar">

    </form>
</body>

</html>