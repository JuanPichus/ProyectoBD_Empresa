<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="puestoEdit_mid.php" method="post" required>

        Nombre del puesto a editar: <select name="puesto_nom"><br>
            <?php
            $query = $mysqli->query("SELECT * FROM puesto");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["ID_Puesto"] . '">' . $valores["Nombre_Puesto"] . '</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Enviar">

    </form>
</body>

</html>