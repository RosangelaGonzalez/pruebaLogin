<?php

require "manejadores/ManejadorUsuarios.php";

session_start();
$error ="";

if(isset($_POST["registro"])) {

    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];

    if (ManejadorUsuarios::comprobarDuplicados($correo) == false) {
    ManejadorUsuarios::registrar($nombre, $correo, $password);
    header("Location: index.php");
    } else {
        $error = "El usuario ya existe";
    }

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles-log.css">
    <title>Login KRID</title>
</head>

<body>
    <h1>--KRID--</h1>
    <div class="container">
        <div class="signin-signup">
            <!-- Sign-in Form -->
            <form action="" class="sign-in-form">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" id="nombreLogin" name="nombreLogin">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" id="passwordLogin" name="passwordLogin">
                </div>
                <a href="#" class="forgot-password">Forgot password?</a>
                <input type="submit" value="Login" class="btn" id="login" name="login">
                <p>Don't have an account? <a href="#" class="account-text" id="sign-up-link">Sign up</a></p>
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                    <i class="fab fa-facebook"></i></a>
                    <a href="" class="social-icon">
                    <i class="fab fa-google"></i></a>
                    <a href="" class="social-icon">
                    <i class="fab fa-linkedin"></i></a>
                </div>
            </form>
            <!-- Sign-up Form -->
            <form action="" class="sign-up-form" method="post" name="formularioRegistro" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" id="nombre" name="nombre">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email" id="correo" name="correo">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" id="password" name="password">
                </div>
                <input type="submit" value="Sign up" class="btn" id="registro" name="registro">
                <p>Already have an account? <a href="index.php" class="account-text" id="sign-in-link">Sign in</a></p>
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                    <i class="fab fa-facebook"></i></a>
                    <a href="" class="social-icon">
                    <i class="fab fa-google"></i></a>
                    <a href="" class="social-icon">
                    <i class="fab fa-linkedin"></i></a>
                </div>
            </form>
            <?php echo "<p style='color: red;'>" . $error . "</p>" ?>

        </div>
    </div>
    <script src="app.js"></script>
</body>

</html>
