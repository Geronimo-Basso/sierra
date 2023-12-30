<?php
require 'helper.php';
session_start();


if (!isset($_SESSION['admin_email'])) {
    header("Location: index.php");
    exit();
}


if (isset($_POST['save_changes'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $fund_target = $_POST['fund_target'];

    /** @var mysqli $connection */
    if (update_campaign($id, $title, $description, $fund_target, $connection)) {
        header("Location: admin-table.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
?>

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
            <th>Title</th>
            <th>Description</th>
            <th>Fund Target</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody class="admin-table-body">
        <?php
        $campaigns = fetch_all_campaigns($connection);
        foreach ($campaigns as $campaign) {
            ?>
            <tr>
                <form method="post">
                    <td><?php echo htmlspecialchars($campaign['id_campaign']); ?><input type="hidden" name="id" value="<?php echo htmlspecialchars($campaign['id_campaign']); ?>"></td>
                    <td><input type="text" name="title" value="<?php echo htmlspecialchars($campaign['title']); ?>"></td>
                    <td><input type="text" name="description" value="<?php echo htmlspecialchars($campaign['description']); ?>"></td>
                    <td><input type="number" name="fund_target" value="<?php echo htmlspecialchars($campaign['fund_target']); ?>"></td>
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
