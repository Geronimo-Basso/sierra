<?php
require_once 'helper.php';
/** @var mysqli $connection */
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
                <div class="donation-main-box">
                    <h3><?php echo htmlspecialchars($campaign['title']); ?></h3>
                    <img style="width: 240px;" src="assets/images/flying-cazas.png">
                    <p><?php echo htmlspecialchars($campaign['fund_target']); ?></p>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?>
</body>
</html>