<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'menu.php'; ?>
</head>

<body>
    <?php
    $servidor = "localhost";
    $usuario = "root";
    $pwd = "";
    $bd = "bd_enterprise";

    $conexion = new mysqli($servidor, $usuario, $pwd, $bd);

    if ($conexion->connect_error) {
        die("Error de conexion: " . $conexion->connect_error);
    }

    $usrID = $_REQUEST['Usuario'];

    $usr = $conexion->prepare("SELECT * FROM usuario WHERE ID_Usuario = ?");
    $usr->bind_param("i", $usrID);
    $usr->execute();
    $usrEliminar = $usr->get_result();

    if ($usrEliminar->num_rows > 0) {
        $datos = $usrEliminar->fetch_assoc();

        echo "ID: " . $datos["ID_Usuario"] . "<br>";
        echo "Nombre de Usuario: " . $datos["Usuario"] . "<br>";
        echo "Contraseña: " . $datos["Password"] . "<br>";
        echo "Tipo: " . $datos["Tipo"] . "<br>";
        echo "<br><br>";


        echo '<form action="usrDelete_recieve.php" method="post">';
        echo '<input type="hidden" name="usrID" value="' . $usrID . '">';
        echo '<input type = "submit" name="Eliminar" value="Eliminar">';
        echo '<input type = "submit" name="Cancelar" value="Cancelar">';
        echo '</form>';
    }
    ?>
</body>

</html>