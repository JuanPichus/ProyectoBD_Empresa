<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menuJefe.php'; ?>
</head>

<body>
    <form action="clienteEditar_mid.php" method="post" required>

        ID del cliente a editar: <select name="IDeditar"><br>
            <?php
            $query = $mysqli->query("SELECT * FROM cliente");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["ID_Cliente"] . '">' . $valores["ID_Cliente"] . '</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Enviar">

    </form>
</body>

</html>