<?php
 $mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>
<body>
    <form action="edit_mid.php" method="post">

    Nomina del trabajador a editar: <input type="number" name="nominaeditar"><br>
   
    <input type="submit" value="Enviar">

</form>
</body>
</html>