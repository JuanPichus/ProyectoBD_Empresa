<?php
 $mysqli = new mysqli('localhost', 'root', '', 'bd_enterprise') or die("Ocurrió un fallo en la conexión")
?>
<html>
<body>
    <form action="delete_recieve.php" method="post">

    Nomina del trabajador a eliminar: <input type="number" name="nomina"><br><br>
   
    <input type="submit" value="Eliminar">

</form>
</body>
</html>