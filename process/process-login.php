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
            $_SESSION['donor_email'] = $email;
            header("Location: ../index.php");
            exit();
        }
    } else {
        // User not found or password incorrect
        $_SESSION['error_message'] = 'Usuario o password incorrecto';
        header("Location: ../index.php");
        exit();
    }
    mysqli_close($connection);
}
