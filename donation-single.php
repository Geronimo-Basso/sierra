<?php
/** @var mysqli $connection */
require_once 'helper.php';
session_start();
$campaign_id = $_GET['campaign_id'];
$campaign = get_single_campaign($campaign_id,$connection);

// Check if the session has started or not to show different buttons.
$sessionActive = isset($_SESSION['donor_email']);
if (isset($_SESSION['admin_email'])) {
    header("Location: admin.php");
}
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
            <h3>Donaciones recibidas <?php echo donations_in_campaign($campaign['id_campaign'], $connection) . '€';?></h3>
            <h3>Cantidad a recuadrar: <?php echo $campaign['fund_target'] . '€'?> </h3>
            <p><?php echo htmlspecialchars($campaign['description']); ?></p>
            <?php if ($sessionActive): ?>
                <a class="donation-single-button" href="donate.php?campaign_id=<?php echo htmlspecialchars($campaign_id); ?>">
                    <button>Haz una donación</button>
                </a>
            <?php else: ?>
                <a class="donation-single-button" href='login.php'>
                    <button>Haz una donación</button>
                </a>
            <?php endif; ?>
        </div>
        <div class="donation-single-main-right">
            <img class="donation-single-main-right-image" src="<?php echo 'uploads/' . htmlspecialchars($campaign['image_url']);?>">
        </div>
    </main>
    <?php require 'includes/footer.php'; ?>
    </body>
</html>