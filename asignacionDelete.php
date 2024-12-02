<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="asignacionDelete_recieve.php" method="post">

        ID de la asignación a eliminar: <select name="IDeditar"><br>
            <?php
            $query = $mysqli->query("SELECT * FROM asignacion");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["ID"] . '">' . $valores["ID"] . '</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Eliminar">

    </form>
</body>

</html>