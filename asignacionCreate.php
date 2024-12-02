<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="asignacionCreate_recieve.php" method="post">

        Fecha de inicio: <input type="date" name="fechainicio"><br>
        Fecha de finalización: <input type="date" name="fechafin" required><br><br>

        Trabajador: <select name="trabajador"><br>
            <?php
            $query = $mysqli->query("SELECT * FROM trabajador");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["Nomina"] . '">' . $valores["Nombre"] . " " . $valores["Apellido_Paterno"] . '</option>';
            }
            ?>
        </select><br><br>

        Proyecto: <select name="proy"><br>
            <?php
            $query = $mysqli->query("SELECT * FROM proyecto");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["ID_Proyecto"] . '">' . $valores["Nombre_Proyecto"] . '</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">

    </form>
</body>

</html>