<html>
    <body>
        <?php
        $servidor = "localhost";
        $usuario = "root";
        $pwd = "";
        $bd = "bd_enterprise";

        $conexion = new mysqli($servidor, $usuario, $pwd, $bd);
        
        $nomina = $_REQUEST['nomina'];
        $nombre = $_REQUEST['nombre'];
        $ape_paterno = $_REQUEST['ape_paterno'];
        $ape_materno = $_REQUEST['ape_materno'];
        $fecha_nac = $_REQUEST['fecha_nac'];
        $sueldo = $_REQUEST['sueldo'];
        $sexo = $_REQUEST['sexo'];
        $telefono = $_REQUEST['tel'];
        $puesto = $_REQUEST['puesto'];
        $nominaeditar2 = $_REQUEST['editar'];

        $sql = "UPDATE trabajador SET Nomina='$nomina', Nombre='$nombre', Apellido_Paterno='$ape_paterno', Apellido_Materno='$ape_materno', 
        Fecha_Nacimiento='$fecha_nac', Sueldo='$sueldo', Sexo='$sexo', Telefono='$telefono', PuestoFK='$puesto' WHERE Nomina = '$nominaeditar2'";

        if ($conexion->query($sql) === TRUE) {
            echo "Trabajador modificado correctamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }

        $conexion->close();
        ?>
    </body>
</html>