<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'?>
</head>
<body>
    <?php require 'includes/header.php'; ?>
    <?php require 'includes/headernavmobile.php'; ?>
    <div class="contact-main-content">
        <div class="contact-side-item">
            <h1>Contacto</h1>
            <p class="contact-form">Si tienes alguna duda o sugerencia puedes rellenar el siguiente formulario. Te responderemos lo más rápido que podamos.</p>
            <form class="contact-form">
                <input type="text" id="name" name="name" placeholder="Nombre"><br>
                <input type="text" id="lastname" name="lastname" placeholder="Apellidos"><br>
                <input type="text" id="email" name="email" placeholder="Email"><br>
                <input type="text" id="phone" name="phone" placeholder="Móvil"><br>
                <textarea id="contact-textarea" placeholder="Escribe tu mensaje..."></textarea>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
    <?php require 'includes/footer.php'; ?>
</body>
</html>