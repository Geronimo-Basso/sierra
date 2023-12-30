<?php
session_start();
if (!$_SESSION['admin_email']) {
    header("Location: index.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'?>
</head>
<body>
    <?php require 'includes/header-admin.php'; ?>
    <?php require 'includes/headernavmobile.php'; ?>
    <div class="contact-main-content" id="admin-form-campaing">
        <h1>Crear nueva campaña</h1>
        <form action="process/process-admin.php" method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Titulo" required>
            <textarea name="description" placeholder="Describe porque quieres juntar dinero" required></textarea>
            <input type="number" name="target" placeholder="Cantidad a recaudar" required>
            <input type="file" name="image" accept="image/png" required>
            <input type="submit" value="Enviar">
        </form>
    </div>
    <?php require 'includes/footer.php'; ?>
</body>
</html>