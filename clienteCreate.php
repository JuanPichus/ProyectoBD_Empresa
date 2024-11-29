<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menuJefe.php'; ?>
</head>

<body>
    <form action="clienteCreate_recieve.php" method="post">

        ID: <input type="number" name="ID"><br>
        Nombre: <input type="text" name="nombre"><br>
        Apellido Paterno: <input type="text" name="ape_paterno" required><br>
        Apellido Materno: <input type="text" name="ape_materno" required><br>
        Teléfono: <input type="number" name="tel" required><br>
        Correo: <input type="text" name="correo"><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">

    </form>
</body>

</html>