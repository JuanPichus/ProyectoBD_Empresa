<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form method="post">

        Nombre: <input type="text" name="nombre"><br>
        Descripcion: <input type="text" name="descripcion" required><br>
        Fecha de Inicio: <input type="date" name="fecha_ini" required><br>
        Fecha de Fin: <input type="date" name="fecha_fin" required><br>
        Presupuesto: <input type="number" name="presupuesto" required><br>

        Encargado: <select name="encargado"><br>
            <?php
            $query = $mysqli->query("SELECT Nomina, Nombre, Apellido_Paterno FROM trabajador");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["Nomina"] . '">' . $valores["Nombre"] . " " . $valores["Apellido_Paterno"] . '</option>';
            }
            ?>
        </select><br><br>

        Cliente: <select name="cliente"><br>
            <?php
            $query = $mysqli->query("SELECT ID_Cliente, Nombre, Apellido_Paterno FROM cliente");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["ID_Cliente"] . '">' . $valores["Nombre"] . " " . $valores["Apellido_Paterno"] . '</option>';
            }
            ?>
        </select><br><br>
        <input type="submit" value="Agregar">
        <input type="reset" value="Limpiar">

    </form>

    <?php
    $servidor = "localhost";
    $usuario = "root";
    $pwd = "";
    $bd = "bd_enterprise";

    $conexion = new mysqli($servidor, $usuario, $pwd, $bd);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_REQUEST['nombre'];
        $descripcion = $_REQUEST['descripcion'];
        $fecha_ini = $_REQUEST['fecha_ini'];
        $fecha_fin = $_REQUEST['fecha_fin'];
        $presupuesto = $_REQUEST['presupuesto'];
        $encargado = $_REQUEST['encargado'];
        $cliente = $_REQUEST['cliente'];

        $insertProyecto = "INSERT INTO proyecto (Nombre_Proyecto, Descripcion, Fecha_Inicio, Fecha_Fin, Presupuesto, TrabajadorFK) 
        VALUES ('$nombre', '$descripcion', '$fecha_ini', '$fecha_fin', '$presupuesto', '$encargado')";

        if ($conexion->query($insertProyecto) === TRUE) {
            $idProy = $conexion->insert_id;

            $actualDate = date("Y-m-d");
            $cobroEmpresa = ($presupuesto * 0.16) + 10000;
            $cobroTotal = $cobroEmpresa + $presupuesto;

            $insertFactura = "INSERT INTO factura (Fecha_Emicion, Monto, ProyectoFK, ClienteFK) VALUES ('$actualDate', '$cobroTotal', '$idProy', '$cliente')";

            if ($conexion->query($insertFactura) === TRUE) {
                echo "\nProyecto y factura generados correctamente.";
            } else {
                echo "\nError: " . $sql . "<br>" . $conexion->error;
            }
        }

        $conexion->close();
    }
    ?>
</body>

</html>