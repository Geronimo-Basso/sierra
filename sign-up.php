<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require 'head.php'?>
    </head>
    <body>
        <div class="sign-up-main-content">
            <div class="sign-up-flex-up">
                <img id="login-logo" src="assets/images/logo-header.svg">
                <h1 id="create-account-h1">Crea una cuenta</h1>
                <h2 id="already-account-h2">¿Ya tienes cuenta? <a href="login.php"><u>Inicia sesión</u></a></h2>
            </div>
            <div class="sign-up-container-form">
                <form class="sign-up-form" action="process/process-sign-up.php" method="post">
                    <div class="tab" style="display:block;">
                        <input type="text" name="name" placeholder="Nombre" required><br>
                        <input type="text" name="lastname" placeholder="Apellidos" required><br>
                        <button type="button" onclick="showTab(1)">Next</button>
                    </div>
                    <div class="tab" style="display:none;">
                        <input type="text" id="email" name="email" placeholder="Email" required><br>
                        <input type="password" id="password" name="password" placeholder="Contraseña" required><br>
                        <button type="button" onclick="showTab(0)">Previous</button>
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <?php require 'includes/footer.php'; ?>
        <script>
            function showTab(n) {
                var tabs = document.getElementsByClassName("tab");
                for (var i = 0; i < tabs.length; i++) {
                    tabs[i].style.display = "none";
                }
                tabs[n].style.display = "block";
            }
        </script>
    </body>
</html>