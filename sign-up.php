<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'?>
</head>
<body>
<div class="sign-up-main-content">
    <div>
        <img style='height: 270px' src="assets/images/logo-header.svg">
        <h1>Crea una cuenta</h1>
        <h2>¿Ya tienes cuenta? <a href="login.php"><u>Inicia sesión</u></a></h2>
    </div>
    <div class="sign-up-container-form">
        <form class="login-in-form">
            <input type="text" id="name" name="name" placeholder="Nombre"><br>
            <input type="text" id="lastname" name="lastname" placeholder="Apellidos"><br>
            <input type="text" id="email" name="email" placeholder="Email"><br>
            <input type="text" id="email_confirm" name="email" placeholder="Confirmar email"><br>
            <input type="password" id="password" name="password" placeholder="Contraseña"><br>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirmar contraseña"><br>
            <div class="sign-up-password-requirments">
                Tu contraseña debe tener almenos:
                <ul>
                    <li>Entre 8 y 20 caracteres</li>
                    <li>1 letra mayscula</li>
                    <li>1 letra minuscula</li>
                    <li>1 número</li>
                    <li>1 símbolo</li>

                </ul>
            </div>
            <input type="submit" value="Registrarse">
            <p>Al registrarte aceptas <a><u>terminos y condiciones.</u> </a></p>
        </form>
    </div>
</div>
<?php require 'includes/footer.php'; ?>
</body>
</html>