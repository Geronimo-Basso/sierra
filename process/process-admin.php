<?php
/** @var mysqli $connection */
session_start();
require_once '../helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $target = $_POST['target'];
    $image = $_FILES['image'];

    $saved_campaing = save_campaign($title,$description,$target,$image,$connection);

    if ($saved_campaing){
        $_SESSION['saved'] = 'Campaña guardada con exito';
    } else {
        $_SESSION['error'] = 'ERROR, la campaña no se guardo';
    }
    header("Location: ../admin.php");
    exit();
}
mysqli_close($connection);