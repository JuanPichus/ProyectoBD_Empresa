<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="trabCreate_recieve.php" method="post">

        Nomina: <input type="number" name="nomina" required><br>
        Nombre(s): <input type="text" name="nombre" required><br>
        Apellido Paterno: <input type="text" name="ape_paterno" required><br>
        Apellido Materno: <input type="text" name="ape_materno" required><br>
        Fecha de Nacimiento: <input type="date" name="fecha_nac" required><br>
        Sueldo: <input type="number" name="sueldo" required><br>
        Sexo: <input type="radio" name="sexo" value="M" checked required>Mujer
        <input type="radio" name="sexo" value="H" required>Hombre<br>
        Teléfono: <input type="number" name="tel" required><br>

        Puesto: <select name="puesto" required><br>
            <?php
            $query = $mysqli->query("SELECT * FROM puesto");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["ID_Puesto"] . '">' . $valores["Nombre_Puesto"] . '</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">

    </form>
</body>

</html>