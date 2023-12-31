<?php
/** @var mysqli $connection */
require_once 'helper.php';
session_start();
// Get campaign info
$campaign_id = $_GET['campaign_id'];
$campaign = get_single_campaign($campaign_id,$connection);

//Get user info
$user_email = $_SESSION['donor_email'];
$user= user_information($user_email, $connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'?>
</head>
<body>
    <main class="donate-main-content">
        <form class="donate-form" action="process/process-donation.php" method="post">
            <h1>Gracias por lo que haces.</h1>
            <input type="text" value="<?php echo htmlspecialchars($user['email']); ?>" name="email" readonly>
            <input type="text" value="<?php echo htmlspecialchars($user['name']); ?>" readonly>
            <input type="text" value="<?php echo htmlspecialchars($user['lastname']); ?>" readonly>
            <input type="text" value="<?php echo htmlspecialchars($campaign['title']); ?>" readonly>
            <input type="text" value="<?php echo htmlspecialchars($campaign['description']); ?>" readonly>
            <input type="number" name="amount" >
            <input type="submit" name="Enviar Donación" >
        </form>
    </main>
    <?php require 'includes/footer.php'; ?>
</body>
</html>