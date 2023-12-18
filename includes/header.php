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
                <a href="login.php">
                    <li>Iniciar Sesión</li>
                </a>
                <a href="sign-up.php">
                    <li>Registrarse</li>
                </a>
            </ul>
        </nav>
    </div>


    <script src = "https://cdnjs.cloudflare.com/ajax/libs/howler/2.1.1/howler.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let clickCount = 0;
            const imageElement = document.getElementById('logo-image');
            const audioContainer = document.getElementById("audioContainer");

            imageElement.addEventListener('mouseover', function() {
                clickCount++;
                console.log('Image clicked' + clickCount + ' times');
                if (clickCount > 10) {
                    imageElement.src = 'assets/images/doge.png';
                    imageElement.style.width = '38px';
                    imageElement.style.height = '38px'
                    imageElement.style.alignSelf = 'center';
                    imageElement.style.marginTop = '5px';

                    var audio = new Audio('assets/audio/fart-03.mp3');

                    var promise = audio.play();

                    if (promise !== undefined) {
                        promise.then(_ => {
                            console.log('Autoplay started');
                        }).catch(error => {
                            console.log('Autoplay prevented');
                        });
                    }
                }
            });
        });
    </script>

</header>