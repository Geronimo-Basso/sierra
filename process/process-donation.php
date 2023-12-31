<?php
/** @var mysqli $connection */
session_start();
require_once '../helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $target = $_POST['target'];
    $image = $_FILES['image'];
}