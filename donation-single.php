<?php
/** @var mysqli $connection */
require_once 'helper.php';
session_start();
$campaign_id = $_GET['campaign_id'];
$campaign = get_single_campaign($campaign_id,$connection);

// Check if the session has started or not to show different buttons.
$sessionActive = isset($_SESSION['donor_email']);
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
            <?php if ($sessionActive): ?>
                <a href="donate.php?campaign_id=<?php echo htmlspecialchars($campaign_id); ?>">Haz una donación </a>
            <?php else: ?>
                <a href='login.php'>Haz una donación</a>
            <?php endif; ?>
        </div>
        <div class="donation-single-main-right">
            <img style="width: 500px; margin-top: 40px;" src="assets/images/flying-cazas.png" id="donation-single-main-image">
        </div>
    </main>
    <?php require 'includes/footer.php'; ?>
    </body>
</html>