<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="puestoCreate_recieve.php" method="post">

        Nombre del Puesto: <input type="text" name="nombre"><br>
        Salario Base: <input type="number" name="salario_base"><br>
        Descripcion: <input type="text" name="descripcion"><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">
    </form>
</body>

</html>