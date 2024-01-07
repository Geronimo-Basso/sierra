<?php
/** @var mysqli $connection */
require 'helper.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'; ?>
    <title>Mensajes de Contacto</title>
</head>
<body>
<?php require 'includes/header-admin.php'; ?>
<?php require 'includes/headernavmobile.php'; ?>
<div class="admin-table-main-content">
    <h2>Contact Messages</h2>
    <table class="campaing-admin-table-list">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Mensaje</th>
        </tr>
        </thead>
        <tbody class="admin-table-body">
        <?php
        $contacts = fetch_all_contacts($connection);
        foreach ($contacts as $contact) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($contact['id_contact']) . "</td>";
            echo "<td>" . htmlspecialchars($contact['name']) . "</td>";
            echo "<td>" . htmlspecialchars($contact['lastname']) . "</td>";
            echo "<td>" . htmlspecialchars($contact['email']) . "</td>";
            echo "<td>" . htmlspecialchars($contact['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($contact['message']) . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<?php require 'includes/footer.php'; ?>
</body>
</html>
