<headernavmobile>
    <img class="three-lines" id="button-outside" src="assets/images/hamburger-menu-black.svg">
    <div id="menu-overlay" class="menu-overlay">
        <!--<img class="three-lines" id="button-inside" src="assets/images/three-lines.svg">-->
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
            //const buttonInside = document.getElementById('button-inside');
            const menuOverlay = document.getElementById('menu-overlay');

            // Set up event listener for outside button
            buttonOutside.addEventListener('click', function () {
                if (menuOverlay.style.display === 'block') {
                    // If the overlay is currently shown, hide it
                    menuOverlay.style.display = 'none';
                    buttonOutside.style.zIndex = '0'; // Reset z-index to a lower value
                    updateThreeLinesStyle();
                } else {
                    // If the overlay is hidden, show it
                    menuOverlay.style.display = 'block';
                    buttonOutside.style.zIndex = '2';
                    updateThreeLinesStyle();
                }
            });

            // Function to update image based on dark mode preference
            function updateImageForDarkMode() {
                const prefersDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                buttonOutside.src = prefersDarkMode ? 'assets/images/hamburger-menu-white.svg' : 'assets/images/hamburger-menu-black.svg';
            }

            function updateThreeLinesStyle() {
                var width = window.innerWidth;

                if (width <= 1200) {
                    buttonOutside.style.display = 'block';
                    buttonOutside.style.height = '30px';
                    buttonOutside.style.top = '0';
                    buttonOutside.style.right = '0';
                    buttonOutside.style.margin = '5%';
                    if(menuOverlay.style.display === 'block') {
                        buttonOutside.style.position = 'fixed';
                    } else {
                        buttonOutside.style.position = 'absolute';
                    }
                } else {
                    buttonOutside.style.display = 'none';
                    menuOverlay.style.display = 'none';
                }
            }

            updateImageForDarkMode();
            updateThreeLinesStyle();
            window.addEventListener('resize', updateThreeLinesStyle);

            // Add listener for system dark mode changes
            window.matchMedia('(prefers-color-scheme: dark)').addListener(e => {
                updateImageForDarkMode();
            });
        });
    </script>


</headernavmobile>
