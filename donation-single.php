<?php
/** @var mysqli $connection */
require_once 'helper.php';
session_start();
$campaign_id = $_GET['campaign_id'];
$campaign = get_single_campaign($campaign_id,$connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'?>
</head>
<body>
<?php require 'includes/header.php'; ?>
<?php require 'includes/headernavmobile.php'; ?>
<main class="donation-single-main-content">
    <div class="donation-single-main-left">
        <h1><?php echo htmlspecialchars($campaign['title']); ?> </h1>
        <p><?php echo htmlspecialchars($campaign['description']); ?></p>
        <button>Haz una donación</button>
    </div>
    <div class="donation-single-main-right">
        <img style="width: 500px; margin-top: 40px;" src="assets/images/flying-cazas.png" id="donation-single-main-image">
    </div>
</main>
<?php require 'includes/footer.php'; ?>
</body>
</html>