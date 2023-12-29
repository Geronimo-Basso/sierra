<?php
// DataBase connection
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "Sierra");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if(mysqli_connect_errno()) {
    die("La conexión con la BBDD ha fallado: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
    );
}

/**
 * Check if a user can log in. Also checks whether the user is a Donor or an Admin.
 *
 * @param $username
 * @param $password
 * @param $connection
 * @return array|false
 */
function login_user($username, $password, $connection) {
    // Prepare and execute the query
    $stmt = mysqli_prepare($connection, "SELECT *, IF(donor.id_donor IS NOT NULL, 'donor', IF(admin.id_admin IS NOT NULL, 'admin', 'user')) as type FROM user LEFT JOIN donor ON user.id_user = donor.id_user LEFT JOIN admin ON user.id_user = admin.id_user WHERE user.email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {
        // Verify the password
        if (password_verify($password, $user['password'])) {
            return $user;
        }
    }
    return false;
}

/**
 * @param $title
 * @param $description
 * @param $target
 * @param $image
 * @param $connection
 * @return bool
 */
function save_campaign($title, $description, $target, $image, $connection) {
    // Prepare the INSERT statement for campaign
    $stmt = mysqli_prepare($connection, "INSERT INTO `campaign` (`title`, `description`, `fund_target`) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssd', $title, $description, $target);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        return false;
    }

    // Get the last inserted id
    $campaign_id = mysqli_insert_id($connection);

    // Assuming $image is a path to the image or binary data
    // Handle the image data appropriately here

    // Prepare the INSERT statement for photo
    $stmt = mysqli_prepare($connection, "INSERT INTO `photo` (`id_campaign`, `image`) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, 'ib', $campaign_id, $image);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        return false;
    }

    return true;
}

function user_register($name, $lastname, $email, $password, $connection) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($connection, "INSERT INTO `user` (`email`, `password`, `name`, `lastname`) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssss', $email, $hashed_password, $name, $lastname);
    $result_insert_query = mysqli_stmt_execute($stmt);

    echo 'fail';

    if (!$result_insert_query) {
        echo 'fail1';
        return false;
    }

    return true;
}

function user_exists($email, $connection) {
    $stmt = mysqli_prepare($connection, "SELECT * FROM `user` WHERE email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    echo 'fail3';


    $result = mysqli_stmt_get_result($stmt);
    return mysqli_num_rows($result) > 0;
}
