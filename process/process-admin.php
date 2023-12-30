<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $target = $_POST['target'];
    $image = $_FILES['image'];

    /** @var mysqli $connection */
    $saved_campaing = save_campaign($title,$description,$target,$image,$connection);

    if ($saved_campaing){
        $_SESSION['saved'] = 'Campaña guardada con exito';
    } else {
        $_SESSION['error'] = 'ERROR, la campaña no se guardo';
    }
    header("Location: ../admin.php");
    mysqli_close($connection);
    exit();
}
