<?php
/** @var mysqli $connection */
session_start();
require_once '../helper.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $id_campaign = $_POST['id_campaign'];
    $amount = $_POST['amount'];

    $save_donation = save_donation($email,$id_campaign,$amount,date("Y-m-d H:i:s"),$connection);

    $redirectUrl = "../donate.php"; // Modify this URL as needed

    if ($save_donation) {
        header("Location: " . $redirectUrl . "?donation_status=success");
    } else {
        header("Location: " . $redirectUrl . "?donation_status=failure");
    }
}