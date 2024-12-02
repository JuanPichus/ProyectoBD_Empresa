<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <form action="trabDelete_mid.php" method="post">

        Nomina del trabajador a eliminar: <input type="number" name="nomina"><br><br>

        <input type="submit" value="Eliminar">

    </form>
</body>

</html>