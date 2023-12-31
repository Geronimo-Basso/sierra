<?php
/** @var mysqli $connection */
session_start();
require_once '../helper.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $id_campaign = $_POST['id_campaign'];

    $save_donation = save_donation($email,$id_campaign,$amount,date("Y-m-d H:i:s"),$connection);
}