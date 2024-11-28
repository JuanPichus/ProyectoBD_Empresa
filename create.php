<?php
 $mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>
<body>
    <form action="create_recieve.php" method="post">

    Nomina: <input type="number" name="nomina"><br>
    Nombre(s): <input type="text" name="nombre"><br>
    Apellido Paterno: <input type="text" name="ape_paterno"><br>
    Apellido Materno: <input type="text" name="ape_materno"><br>
    Fecha de Nacimiento: <input type="date" name="fecha_nac"><br>
    Sueldo: <input type="number" name="sueldo"><br>
    Sexo: <input type="radio" name="sexo" value="M" checked>Mujer
    <input type="radio" name="sexo" value="H">Hombre<br>
    Teléfono: <input type="number" name="tel"><br>

    Puesto: <select name="puesto"><br>
        <?php
        $query = $mysqli -> query ("SELECT * FROM puesto");
        while ($valores = mysqli_fetch_array($query)) {
        echo '<option value="'.$valores["ID_Puesto"].'">'.$valores["Nombre_Puesto"].'</option>';
        }
        ?>
        </select><br><br>

    <input type="submit" value="Enviar">
    <input type="reset" value="Limpiar">

</form>
</body>
</html>