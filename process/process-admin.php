<?php
/** @var mysqli $connection */
session_start();
require_once '../helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $target = $_POST['target'];
    $image = $_FILES['image'];

    // Define the target directory and file
    $targetDir = __DIR__ . '/../uploads/'; // Directory where files will be saved
    $targetFile = $targetDir . basename($image["name"]); // Path of the file to be uploaded

    // Move the uploaded file to the target path
    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        echo "The file has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $saved_campaing = save_campaign($title,$description,$target,$image,$connection);

    if ($saved_campaing) {
        $_SESSION['saved'] = 'Campaña guardada con exito';
    } else {
        $_SESSION['error'] = 'ERROR, la campaña no se guardo';
    }
    header("Location: ../admin.php");
    exit();
}

mysqli_close($connection);