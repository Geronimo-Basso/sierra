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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>
<body>
<?php require 'includes/header.php'; ?>
<?php require 'includes/headernavmobile.php'; ?>
<main class="donation-main-content">
    <div class="donation-main-content-home">
        <h1>Ayuda a nuestros heroes</h1>
    </div>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php foreach ($campaigns as $campaign): ?>
                <div class="swiper-slide">
                    <a href="donation-single.php?campaign_id=<?php echo htmlspecialchars($campaign['id_campaign']); ?>">
                        <div class="donation-main-box">
                            <h3><?php echo htmlspecialchars($campaign['title']); ?></h3>
                            <img style="height: 300px;" src="<?php echo 'uploads/' . htmlspecialchars($campaign['image_url']);?>">
                            <p><?php echo htmlspecialchars($campaign['fund_target']); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</main>
<?php require 'includes/footer.php'; ?>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="assets/scripts/swiper.js"></script>
</body>
</html>
