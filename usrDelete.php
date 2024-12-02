<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="usrDelete_mid.php" method="post">

        ID Usuario:
        <select name="Usuario">
            <?php
            $query = $mysqli->query("SELECT * FROM usuario");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores['ID_Usuario'] . '">' . $valores['Usuario'] . "@" .  $valores['Tipo'] . '</option>';
            }
            ?>
        </select>

        <input type="submit" value="Eliminar">

    </form>
</body>

</html>