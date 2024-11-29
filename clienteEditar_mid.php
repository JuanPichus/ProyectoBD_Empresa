<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menuJefe.php'; ?>
</head>

<body>
    <form action="clienteEditar_recieve.php" method="post">

        <?php
        $IDeditar = $_REQUEST['IDeditar'];

        $query = $mysqli->query("SELECT * FROM cliente WHERE ID_Cliente='$IDeditar'");
        while ($valores = mysqli_fetch_array($query)) {
            echo 'Cliente: <input type="number" name="editar" value="' . $IDeditar . '"><br><br>';
            echo 'ID: <input type="number" name="ID" value="' . $IDeditar . '"><br>';
            echo 'Nombre: <input type="text" name="nombre" value="' . $valores["Nombre"] . '"><br>';
            echo 'Apellido paterno: <input type="text" name="ape_paterno" value="' . $valores["Apellido_Paterno"] . '"><br>';
            echo 'Apellido materno: <input type="text" name="ape_materno" value="' . $valores["Apellido_Materno"] . '"><br>';
            echo 'Telefono: <input type="number" name="tel" value="' . $valores["Telefono"] . '"><br>';
            echo 'Correo: <input type="text" name="correo" value="' . $valores["Correo"] . '"><br>';
        }
        ?>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">

</body>

</html>