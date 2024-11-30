<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="puestoEdit_recieve.php" method="post">

        <?php
        $puestoEdit = $_REQUEST['puesto_nom'];

        $query = $mysqli->query("SELECT * FROM puesto WHERE ID_Puesto ='$puestoEdit'");
        while ($valores = mysqli_fetch_array($query)) {
            echo 'Puesto: <a>' . $puestoEdit . '<a><br><br>';
            echo '<input type="hidden" name="puesto" value="' . $puestoEdit . '"><br><br>';
            echo 'Nombre: <input type="text" name="nombre" value="' . $valores["Nombre_Puesto"] . '"><br>';
            echo 'Salario Base: <input type="text" name="salario" value="' . $valores["Salario_Base"] . '"><br>';
            echo 'Descripcion: <input type="text" name="descripcion" value="' . $valores["Descripcion"] . '"><br>';
        }
        ?>

        <input type="submit" value="Editar">
        <input type="reset" value="Limpiar">

</body>

</html>