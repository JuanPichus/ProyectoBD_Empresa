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
    <form action="proyectoEdit_mid.php" method="post" required>

        Nombre del Proyecto: <select name="id_proyecto"><br>
            <?php
            $query = $mysqli->query("SELECT ID_Proyecto, Nombre_Proyecto FROM proyecto");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["ID_Proyecto"] . '">' . $valores["Nombre_Proyecto"] . '</option>';
            }
            ?>
        </select><br><br>

        <?php
        $query->data_seek(0); // Regresar al primer resultado
        $primer_valor = $query->fetch_assoc();
        echo '<input type="hidden" name="nombre_proyecto" value="' . $primer_valor["Nombre_Proyecto"] . '">';
        ?>

        <input type="submit" value="Editar">

    </form>
</body>

</html>