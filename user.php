<?php
session_start();

if (!isset($_SESSION['donor_email'])) {
    header("Location: " . "index.php");
    exit();
}

/** @var mysqli $connection */
require_once 'helper.php';
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
        <h1>Información personal:</h1>
        <div class="user-info">
            <div class="user-about-lane">
                <label class="user-about-label">Email</label>
                <span><?php echo htmlspecialchars($user['email']); ?></span>
            </div>
            <div class="user-about-lane">
                <label class="user-about-label">Nombre</label>
                <span><?php echo htmlspecialchars($user['name']); ?></span>
            </div>
            <div class="user-about-lane">
                <label class="user-about-label">Apellidos</label>
                <span><?php echo htmlspecialchars($user['lastname']); ?></span>
            </div>
            <p class="user-about-p">Donaciones realizadas:<br></p>
            <table>
                <thead>
                <tr>
                    <th>Titulo de campaña</th>
                    <th>Cantidad donada</th>
                    <th>Fecha donación</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $donations = donation_by_user($user_email, $connection);
                foreach ($donations as $donation):
                    $campaign = campaign_by_id($donation['id_campaign'], $connection);
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($campaign['title']); ?></td>
                        <td><?php echo htmlspecialchars($donation['amount']) . '€'; ?></td>
                        <td><?php echo htmlspecialchars($donation['datetime']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <form class="user-form" action="includes/close-session.php" method="post">
            <input id="user-close-session" type="submit" value="Cerrar Sesión">
        </form>
    </main>
    <?php require 'includes/footer.php'; ?>
</body>
</html>