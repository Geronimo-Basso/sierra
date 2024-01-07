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

if (!$_SESSION['donor_email']) {
    header("Location: login.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'?>
</head>
<body>
    <main class="donate-main-content">
        <form class="donate-form" action="process/process-donation.php" method="post">
            <h1>Gracias por lo que haces</h1>
            <label>Email</label>
            <input type="text" value="<?php echo htmlspecialchars($user['email']); ?>" name="email" readonly>
            <label>Nombre</label>
            <input type="text" value="<?php echo htmlspecialchars($user['name']);?>" name="name" readonly>
            <label>Apellidos</label>
            <input type="text" value="<?php echo htmlspecialchars($user['lastname']); ?>" name="lastname" readonly>
            <label>Titulo</label>
            <input type="text" value="<?php echo htmlspecialchars($campaign['title']); ?>" name="title" readonly>
            <label>Cantidad a donar (€)</label>
            <input type="number" name="amount" min="1" step="1" required>
            <input style="display: none;" type="text" value="<?php echo htmlspecialchars($campaign['id_campaign']); ?>" name="id_campaign" readonly>
            <input type="submit" name="Enviar Donación">
        </form>
    </main>
    <?php require 'includes/footer.php'; ?>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const donationStatus = urlParams.get('donation_status');

        if (donationStatus === 'success') {
            alert('Gracias por su donación!');
        } else if (donationStatus === 'failure') {
            alert('Error, vuelve a internalo nuevamente más tarde.');
        }
    });
</script>

