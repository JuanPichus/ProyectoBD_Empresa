<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="clienteDelete_mid.php" method="post">

        ID del cliente a eliminar: <select name="ID"><br>
            <?php
            $query = $mysqli->query("SELECT * FROM cliente");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["ID_Cliente"] . '">' . $valores["ID_Cliente"] . '</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Eliminar">

    </form>
</body>

</html>