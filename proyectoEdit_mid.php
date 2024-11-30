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
    <form action="proyectoEdit_recieve.php" method="post">

        <?php
        $id_proyecto = $_REQUEST['id_proyecto'];
        $nombre_proyecto = $_REQUEST['nombre_proyecto'];

        $query = $mysqli->query("SELECT * FROM proyecto WHERE ID_Proyecto='$id_proyecto'");
        while ($valores = mysqli_fetch_array($query)) {
            echo 'Proyecto: <a>' . $nombre_proyecto . '<a><br><br>';
            echo '<input type="hidden" name = "id_proyecto" value = ' . $id_proyecto . '>';
            echo 'Fecha de Fin: <input type="date" name="fecha_fin" value="' . $valores["Fecha_Fin"] . '"><br>';
        }
        ?>
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">
    </form>
</body>

</html>