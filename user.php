<?php
/** @var mysqli $connection */
require_once 'helper.php';
session_start();
//Get user info
$user_email = $_SESSION['donor_email'];
$user = user_information($user_email, $connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php' ?>
</head>
<body>
    <?php require 'includes/header.php'; ?>
    <?php require 'includes/headernavmobile.php'; ?>
    <main class="user-content">
        <form class="user-form" method="post">
            <label>Email</label>
            <input type="text" value="<?php echo htmlspecialchars($user['email']); ?>" name="email" readonly>
            <label>Nombre</label>
            <input type="text" value="<?php echo htmlspecialchars($user['name']);?>" name="name" readonly>
            <label>Apellidos</label>
            <input type="text" value="<?php echo htmlspecialchars($user['lastname']); ?>" name="lastname" readonly>
            <label>Donaciones realizadas:</label>
            <?php
                $donations = donation_by_user($user_email,$connection);
                foreach ($donations as $donation):
                    $campaign = campaign_by_id($donation['id_campaign'],$connection);
                ?>
                    <p><?php echo htmlspecialchars($campaign['title']); ?></p>
                    <p><?php echo htmlspecialchars($donation['amount']); ?></p>
                    <p><?php echo htmlspecialchars($donation['datetime']); ?></p>
                <?php endforeach;?>
        </form>
        <form action="includes/close-session.php" method="post">
            <input type="submit" value="Cerrar Sesión">
        </form>
    </main>
    <?php require 'includes/footer.php'; ?>
</body>
</html>