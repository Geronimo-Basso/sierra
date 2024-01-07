<?php
/** @var mysqli $connection */
require 'helper.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: index.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'; ?>
    <title>Admin Dashboard</title>
</head>
<body>
    <?php require 'includes/header-admin.php'; ?>
    <?php require 'includes/headernavmobile.php'; ?>
    <div class="admin-table-main-content">
        <h2>Campaigns</h2>
        <table class="campaing-admin-table-list">
            <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Cantidad a recaudar</th>
                <th>Imagen</th>
            </tr>
            </thead>
            <tbody class="admin-table-body">
            <?php
            $campaigns = fetch_all_campaigns($connection);
            foreach ($campaigns as $campaign) {
                ?>
                <tr>
                    <form action="process/process-admin-table.php" method="post" enctype="multipart/form-data">
                        <td><?php echo htmlspecialchars($campaign['id_campaign']); ?><input type="hidden" name="id" value="<?php echo htmlspecialchars($campaign['id_campaign']); ?>"></td>
                        <td><input type="text" name="title" value="<?php echo htmlspecialchars($campaign['title']); ?>"></td>
                        <td><input type="text" name="description" value="<?php echo htmlspecialchars($campaign['description']); ?>"></td>
                        <td><input type="number" name="fund_target" value="<?php echo htmlspecialchars($campaign['fund_target']); ?>"></td>
                        <td><input type="file" name="image" accept="image/png"></td>
                        <td><input type="submit" name="save_changes" value="Save"></td>
                    </form>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php require 'includes/footer.php'; ?>
</body>
</html>
