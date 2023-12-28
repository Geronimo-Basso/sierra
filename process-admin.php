<?php
session_start();
require_once 'helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];


    mysqli_close($connection);
}
