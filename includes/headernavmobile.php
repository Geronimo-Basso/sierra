<headernavmobile>
    <img class="three-lines" src="assets/images/three-lines.svg">
    <div id="menu-overlay" class="menu-overlay">
        <div class="menu-content">
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
                    <a href="login.php">
                        <li>Iniciar Sesión</li>
                    </a>
                    <a href="sign-up.php">
                        <li>Registrarse</li>
                    </a>
                </ul>
            </nav>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const threeLinesIcon = document.querySelector('.three-lines');
            const menuOverlay = document.getElementById('menu-overlay');

            threeLinesIcon.addEventListener('click', function () {
                if (menuOverlay.style.display === 'none' || menuOverlay.style.display === '') {
                    menuOverlay.style.display = 'block';
                    threeLinesIcon.style.zIndex = '1000';
                    threeLinesIcon.style.position = 'fixed';
                    threeLinesIcon.style.marginTop = '-200px';
                } else {
                    menuOverlay.style.display = 'none';
                    threeLinesIcon.style.zIndex = '';
                    threeLinesIcon.style.position = '';
                    threeLinesIcon.style.marginTop = '';
                }
            });
        });

    </script>

</headernavmobile>
