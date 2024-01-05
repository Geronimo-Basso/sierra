<?php
/** @var mysqli $connection */
session_start();
require_once '../helper.php';
// Report all PHP errors
error_reporting(E_ALL);

// Display errors on the page
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $fund_target = $_POST['fund_target'];
    $image = $_FILES['image'];

    // Get the file extension
    $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));

    // Generate a unique file name
    $newFileName = uniqid('image_', true) . '.' . $imageFileType;
    $targetFile = __DIR__ . '/../uploads/' . $newFileName;

    // Move the uploaded file to the target path
    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        echo "The file has been uploaded with a new name: " . $newFileName;
        echo 'query done';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    /** @var mysqli $connection */
    if (update_campaign($id, $title, $description, $fund_target,$newFileName,$connection)) {
        header("Location: ../admin-table.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

    header("Location: ../admin.php");
    exit();
}

mysqli_close($connection);