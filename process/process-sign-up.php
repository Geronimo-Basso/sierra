<?php
/**
 * Process the content of the sign-up.php form.
 *
 * @var mysqli $connection
 *
 */
session_start();
require_once '../helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user_exists = user_exists($email, $connection);

    if ($user_exists) {
        $_SESSION['user_exists'] = 'Ya existe un usuario registrado con ese email';
        header("Location: ../sign-up.php");
    } else {
        $user_register = user_register($name, $lastname, $email, $password, $connection);
        $user_register ? $_SESSION['user_succeed'] = 'Usuario registrado con éxito' : $_SESSION['user_error'] = 'No pudimos registrarlo, intente nuevamente más tarde';
        header("Location: ../index.php");
    }
    mysqli_close($connection);
    exit();
}
