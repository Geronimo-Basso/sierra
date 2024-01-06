<?php
session_start();
require_once '../helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    /** @var mysqli $connection */
    $user = login_user($email, $password, $connection);

    if ($user) {
        if ($user['is_admin']) {
            $_SESSION['admin_email'] = $email;
            header("Location: ../admin.php");
            exit();
        } elseif (!$user['is_admin']) {
            $user_information = user_information($email,$connection);
            $_SESSION['donor_email'] = $email;
            $_SESSION['donor_name'] = $user_information['name'];
            header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = 'Email o Contraseña incorrecto';
        header("Location: ../login.php");
        exit();
    }
    mysqli_close($connection);
}
