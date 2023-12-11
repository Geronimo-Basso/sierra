<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'?>
</head>
<body>
<?php require 'includes/header.php'; ?>
<div class="contact-main-content">
    <div class="contact-side-item">
        <h1>Contacto</h1>
        <p>Si tienes alguna duda o sugerencia puedes rellenar el siguiente formulario. Te responderemos lo más rápido que podamos.</p>
        <form class="contact-form">
            <input type="text" id="name" name="name" placeholder="Nombre"><br>
            <input type="text" id="lastname" name="lastname" placeholder="Apellidos"><br>
            <input type="text" id="email" name="email" placeholder="Email"><br>
            <input type="number" id="phone" name="phone" placeholder="Móvil"><br>
            <textarea></textarea>
        </form>
    </div>
</div>
<?php require 'includes/footer.php'; ?>
</body>
</html>