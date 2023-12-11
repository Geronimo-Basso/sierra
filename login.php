<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'?>
</head>
<body>
<div class="login-in-flexbox-main-content">
    <div class="login-in-flexbox-item-1">
        <img style='height: 270px' src="assets/images/logo-header.svg">
        <h1>Te damos la bienvenida</h1>
    </div>
    <div class="login-in-flexbox-item-2">
        <h2>Inicia sesión en Sierra</h2>
        <p>¿No tiene cuenta? <a href="sign-up.php"><u>Registrate</u></a></p>
        <form class="login-in-form">
            <input type="text" id="email" name="email" placeholder="Email"><br>
            <input type="password" id="password" name="password" placeholder="Contraseña"><br>
            <p><a><u>¿Olvidaste tu contraseña?</u> </a></p>
            <input type="submit" value="Iniciar sesión">
            <p>Al iniciar sesión aceptas <a> <u>terminos y condiciones.</u> </a></p>
        </form>
    </div>
</div>
<?php require 'includes/footer.php'; ?>
</body>
</html>