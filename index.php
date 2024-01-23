<?php
session_start();
if (isset($_SESSION['admin_email'])) {
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
    <div class="home-main-content">
        <div class="home-left-content">
            <h1>En Sierra recaudamos donaciones <br> para veteranos españoles</h1>
            <a href="donation-main.php">
                <button>Haz una donación</button>
            </a>
        </div>
        <aside class="home-grid-logos-army">
            <img src="assets/images/army-logo-1.svg">
            <img src="assets/images/army-logo-2.svg">
            <img src="assets/images/army-logo-3.svg">
            <img src="assets/images/army-logo-4.svg">
        </aside>
    </div>
    <?php require 'includes/footer.php'; ?>
</body>
</html>