<headernavmobile>
    <img class="three-lines" id="button-outside" src="assets/images/three-lines.svg">
    <div id="menu-overlay" class="menu-overlay">
        <img class="three-lines" id="button-inside" src="assets/images/three-lines.svg">
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
            const buttonOutside = document.getElementById('button-outside');
            const buttonInside = document.getElementById('button-inside');
            const menuOverlay = document.getElementById('menu-overlay');

            // Set up event listener for outside button
            buttonOutside.addEventListener('click', function () {
                menuOverlay.style.display = 'block';
                buttonOutside.style.display = 'none';
                buttonInside.style.display = 'block';
            });

            // Set up event listener for inside button
            buttonInside.addEventListener('click', function () {
                menuOverlay.style.display = 'none';
                buttonOutside.style.display = 'block';
                buttonInside.style.display = 'none';
            });
        });
    </script>


</headernavmobile>
