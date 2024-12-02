<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="usrCreate_recieve.php" method="post">

        Nombre Usuario: <input type="text" name="usr" required><br>
        Contraseña: <input type="text" name="pwd" required><br>
        Tipo:
        <input type="radio" name="tipo" value="jefe" checked required>Jefe
        <input type="radio" name="tipo" value="administrador" checked required>Administrador
        <input type="radio" name="tipo" value="trabajador" required>Trabajador<br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">

    </form>
</body>

</html>