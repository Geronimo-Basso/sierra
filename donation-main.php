<?php
/** @var mysqli $connection */
require_once 'helper.php';
session_start();
$campaigns = fetch_all_campaigns($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'?>
</head>
<body>
    <?php require 'includes/header.php'; ?>
    <?php require 'includes/headernavmobile.php'; ?>
    <main class="donation-main-content">
        <div class="donation-main-content-home">
            <h1>Ayuda a nuestros heroes</h1>
        </div>
        <div class="donation-main-boxes">
            <?php foreach ($campaigns as $campaign):?>
            <a href="donation-single.php?campaign_id=<?php echo htmlspecialchars($campaign['id_campaign']); ?>">
                <div class="donation-main-box">
                    <h3><?php echo htmlspecialchars($campaign['title']); ?></h3>
                    <p><?php echo htmlspecialchars($campaign['fund_target']); ?></p>
                </div>
            </a>
            <?php
            endforeach;
            ?>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?>
</body>
</html>