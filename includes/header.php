<?php
session_start();
?>
<header>
    <div class="flexbox-container-header">
        <a href="index.php">
            <div class="flexbox-container-logo">
                <img id="logo-image" src="assets/images/logo-header.svg" alt="sierra-logo">
                <p id="header-title">Sierra</p>
            </div>
        </a>
        <nav>
            <ul>
                <a href="index.php">
                    <li>Inicio</li>
                </a>
                <a href="donation-main.php">
                    <li>Donación</li>
                </a>
                <a href="contact.php">
                    <li>Contacto</li>
                </a>
                <a href="about-us.php">
                    <li>Sobre nosotros</li>
                </a>
            </ul>
        </nav>
        <div class="flexbox-spacer"></div>
        <nav>
            <ul>
                <?php if (isset($_SESSION['donor_name'])): ?>
                    <a href="user.php"><span>Bienvenido, <?php echo htmlspecialchars($_SESSION['donor_name']); ?></span></a>
                    <img src="assets/images/user-logo.svg" style="height: 20px;">
                <?php else: ?>
                    <a href="login.php"><li>Iniciar Sesión</li></a>
                    <a href="sign-up.php"><li>Registrarse</li></a>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>