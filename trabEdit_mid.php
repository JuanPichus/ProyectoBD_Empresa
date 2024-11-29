<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menuJefe.php'; ?>
</head>

<body>
    <form action="trabEdit_recieve.php" method="post">

        <?php
        $trabajador = $_REQUEST['trabajador'];

        $query = $mysqli->query("SELECT * FROM trabajador WHERE Nomina='$trabajador'");
        while ($valores = mysqli_fetch_array($query)) {
            //echo 'Trabajador <b>'.$valores["Nomina"].'</b><br>';
            echo 'Trabajador: <a>' . $trabajador . '<a><br><br>';
            echo '<input type="hidden" name = "trabajador" value = ' . $trabajador . '>';
            echo 'Nombre: <input type="text" name="nombre" value="' . $valores["Nombre"] . '"><br>';
            echo 'Apellido paterno: <input type="text" name="ape_paterno" value="' . $valores["Apellido_Paterno"] . '"><br>';
            echo 'Apellido materno: <input type="text" name="ape_materno" value="' . $valores["Apellido_Materno"] . '"><br>';
            echo 'Fecha de Nacimiento: <input type="date" name="fecha_nac" value="' . $valores["Fecha_Nacimiento"] . '"><br>';
            echo 'Sueldo: <input type="number" name="sueldo" value="' . $valores["Sueldo"] . '"><br>';
            echo 'Sexo: <input type="text" name="sexo" value="' . $valores["Sexo"] . '"><br>';
            echo 'Teléfono: <input type="number" name="tel" value="' . $valores["Telefono"] . '"><br><br>';
        }
        ?>

        Puesto: <select name="puesto"><br>
            <?php
            $query = $mysqli->query("SELECT * FROM puesto");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["ID_Puesto"] . '">' . $valores["Nombre_Puesto"] . '</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">

</body>

</html>