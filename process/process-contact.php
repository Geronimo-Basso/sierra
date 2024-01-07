<?php
/** @var mysqli $connection */
session_start();
require_once '../helper.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $saved_message = save_contact_message($name, $lastname, $email, $phone, $message, $connection);

    if ($saved_message) {
        $_SESSION['message_saved'] = 'Mensaje enviado';
    } else {
        $_SESSION['error_message_saved'] = 'Error, intentelo denuevo más tarde';
    }
    header("Location: ../contact.php");
    mysqli_close($connection);
    exit();
}