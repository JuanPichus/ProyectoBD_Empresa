<?php
 $mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>
<body>
    <form action="edit_recieve.php" method="post">
        
    <?php
        $nominaeditar = $_REQUEST['nominaeditar'];

        $query = $mysqli -> query ("SELECT * FROM trabajador WHERE Nomina='$nominaeditar'");
        while ($valores = mysqli_fetch_array($query)) {
           //echo 'Trabajador <b>'.$valores["Nomina"].'</b><br>';
           echo 'Trabajador: <input type="number" name="editar" value="'.$nominaeditar.'"><br><br>';
           echo 'Nomina: <input type="number" name="nomina" value="'.$valores["Nomina"].'"><br>';
           echo 'Nombre: <input type="text" name="nombre" value="'.$valores["Nombre"].'"><br>';
           echo 'Apellido paterno: <input type="text" name="ape_paterno" value="'.$valores["Apellido_Paterno"].'"><br>';
           echo 'Apellido materno: <input type="text" name="ape_materno" value="'.$valores["Apellido_Materno"].'"><br>';
           echo 'Fecha de Nacimiento: <input type="date" name="fecha_nac" value="'.$valores["Fecha_Nacimiento"].'"><br>';
           echo 'Sueldo: <input type="number" name="sueldo" value="'.$valores["Sueldo"].'"><br>';
           echo 'Sexo: <input type="text" name="sexo" value="'.$valores["Sexo"].'"><br>';
           echo 'Teléfono: <input type="number" name="tel" value="'.$valores["Telefono"].'"><br><br>';
           
        }
    ?>

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

</body>
</html>