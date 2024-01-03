<?php
/** @var mysqli $connection */
session_start();
require_once '../helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $target = $_POST['target'];
    $image = $_FILES['image'];

    // Get the file extension
    $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));

    // Generate a unique file name
    $newFileName = uniqid('image_', true) . '.' . $imageFileType;
    $targetFile = __DIR__ . '/../uploads/' . $newFileName;

    // Move the uploaded file to the target path
    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        echo "The file has been uploaded with a new name: " . $newFileName;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Save the campaign with the new image name
    $saved_campaign = save_campaign($title, $description, $target, $newFileName, $connection);

    if ($saved_campaign) {
        $_SESSION['saved'] = 'Campaña guardada con exito';
    } else {
        $_SESSION['error'] = 'ERROR, la campaña no se guardo';
    }
    header("Location: ../admin.php");
    exit();
}
mysqli_close($connection);
?>
