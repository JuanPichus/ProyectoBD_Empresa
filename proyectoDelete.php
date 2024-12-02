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
    <form action="proyectoDelete_mid.php" method="post">

        Nombre del proyecto a eliminar:
        <select name="proyecto"><br>
            <?php
            $query = $mysqli->query("SELECT ID_Proyecto, Nombre_Proyecto FROM proyecto");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores["ID_Proyecto"] . '">' . $valores["Nombre_Proyecto"] . '</option>';
            }
            ?>
        </select>
        <br><br>

        <input type="submit" value="Eliminar">

    </form>
</body>

</html>