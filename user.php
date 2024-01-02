<?php
session_start();

if (!$_SESSION['donor_email']) {
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
        <form class="user-form" method="post">
            <label>Email</label>
            <input type="text" value="<?php echo htmlspecialchars($user['email']); ?>" name="email" readonly>
            <label>Nombre</label>
            <input type="text" value="<?php echo htmlspecialchars($user['name']);?>" name="name" readonly>
            <label>Apellidos</label>
            <input type="text" value="<?php echo htmlspecialchars($user['lastname']); ?>" name="lastname" readonly>
            <p>Donaciones realizadas:<br></p>
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
                        <td><?php echo htmlspecialchars($donation['amount']) . '€' ; ?></td>
                        <td><?php echo htmlspecialchars($donation['datetime']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </form>
        <form action="includes/close-session.php" method="post">
            <input type="submit" value="Cerrar Sesión">
        </form>
    </main>
    <?php require 'includes/footer.php'; ?>
</body>
</html>