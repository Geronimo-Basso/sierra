<?php
session_start();
if ($_SESSION['donor_email']) {
    header("Location: index.php");
} ?>
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
                // Validation for the first tab before moving to the second
                if (n === 1 && !validateFirstTab()) {
                    return; // Stop the function if validation fails
                }

                var tabs = document.getElementsByClassName("tab");
                for (var i = 0; i < tabs.length; i++) {
                    tabs[i].style.display = "none";
                }
                tabs[n].style.display = "block";
            }

            function validateFirstTab() {
                var name = document.querySelector('input[name="name"]').value;
                var lastname = document.querySelector('input[name="lastname"]').value;

                if (name === "" || lastname === "") {
                    alert("Rellene los campos de Nombre y Apellidos");
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>