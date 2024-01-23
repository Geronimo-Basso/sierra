<?php
session_start();
if ($_SESSION['admin_email']) {
    header("Location: admin.php");
}
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
            <form class="contact-form" action="process/process-contact.php" method="post">
                <input type="text" id="name" name="name" placeholder="Nombre" required><br>
                <input type="text" id="lastname" name="lastname" placeholder="Apellidos" required><br>
                <input type="text" id="email" name="email" placeholder="Email" required><br>
                <input type="text" id="phone" name="phone" placeholder="Móvil" required><br>
                <textarea id="contact-textarea" name="message" placeholder="Escribe tu mensaje..." required></textarea>
                <input type="submit" value="Enviar">
                <?php
                if (!empty($_SESSION['error_message_saved'])) {
                    echo "<div style='color: red;'>" . $_SESSION['error_message_saved'] . "</div>";
                    unset($_SESSION['error_message_saved']);
                }
                ?>
            </form>
        </div>
    </div>
    <?php require 'includes/footer.php'; ?>
</body>
</html>