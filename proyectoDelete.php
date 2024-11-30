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

        Nombre del proyecto a eliminar: <select name="proyecto"><br>
            <?php
            $query = $mysqli->query("SELECT ID_Proyecto, Nombre_Proyecto FROM proyecto");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["ID_Proyecto"] . '">' . $valores["Nombre_Proyecto"] . '</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Eliminar">

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proyectoID = $_POST['proyecto'];

            $deleteFac = $mysqli->prepare("DELETE FROM factura WHERE ProyectoFK = ?");
            $deleteFac->bind_param("i", $proyectoID);
            $deleteFac->execute();

            if ($deleteFac->affected_rows > 0) {
                echo "Facturas asociadas eliminadas correctamente.<br>";
            } else {
                echo "No se encontraron facturas asociadas al proyecto o no se eliminaron.<br>";
            }

            $deleteProy = $mysqli->prepare("DELETE FROM proyecto WHERE ID_Proyecto = ?");
            $deleteProy->bind_param("i", $proyectoID);
            $deleteProy->execute();

            if ($deleteProy->affected_rows > 0) {
                echo "Proyecto eliminado correctamente.";
            } else {
                echo "Error al eliminar el proyecto o no existe.";
            }

            if ($deleteFac->error) {
                echo "Error en la eliminación de facturas: " . $deleteFac->error;
            }
            if ($deleteProy->error) {
                echo "Error en la eliminación del proyecto: " . $deleteProy->error;
            }
        }

        ?>

    </form>
</body>

</html>