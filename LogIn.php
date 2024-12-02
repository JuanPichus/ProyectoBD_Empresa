<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>

<body>
    <form method="post">
        <p>Usuario:
            <input type="text" name="Usr" required>
        </p>
        <p>Contraseña:
            <input type="text" name="Pwd" required>
        </p>
        <input type="submit" name="Login" value="Login">
    </form>

    <?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $server = "localhost";
        $usr = "root";
        $pwd = "";
        $bd = "bd_enterprise";

        $conexion = new mysqli($server, $usr, $pwd, $bd);

        if ($conexion->connect_error) {
            die("Conexion fallida: " . $conexion->connect_error . "<br>");
        }

        $Usuario = $_REQUEST['Usr'];
        $Password = sha1($_REQUEST['Pwd']);

        $query = $conexion->prepare("SELECT * FROM usuario WHERE Usuario = ? AND Password = ?");
        $query->bind_param("ss", $Usuario, $Password);
        $query->execute();
        $resultado = $query->get_result();

        if ($resultado->num_rows > 0) {
            // Usuario encontrado
            $usuario = $resultado->fetch_assoc();
            $_SESSION['tipoUsuario'] = $usuario['Tipo']; // Guarda el tipo de usuario en la sesión
            $_SESSION['nombreUsuario'] = $usuario['Usuario']; // (Opcional) Guarda el nombre del usuario

            // Redirige al menú principal
            header('Location: menu.php');
            exit();
        } else {
            // Usuario o contraseña incorrectos
            header('Location: LogIn.php');
            echo "Usuario o contraseña incorrectos";
            exit();
        }

        $query->close();
        $conexion->close();
    }
    ?>
</body>

</html>