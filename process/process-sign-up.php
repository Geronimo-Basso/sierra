<?php
session_start();
require '../helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    /** @var mysqli $connection */
    $user_exists = user_exists($email,$connection);

    if ($user_exists){
        $_SESSION['user_exists'] = 'Ya existe un usuario registrado con ese email';
    } else {
        $user_register = user_register($name,$lastname,$email,$password,$connection);
        $user_register ? $_SESSION['user_succeed'] = 'Usuario registrado con éxito' : $_SESSION['user_error'] = 'No pudimos registrarlo, intente nuevamente más tarde';
    }
    mysqli_close($connection);
}
