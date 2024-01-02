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
 * @param $password
 * @param $connection
 * @return array|false
 */
function login_user($email, $password, $connection) {
    // Prepare and execute the query
    $stmt = mysqli_prepare($connection, "SELECT * FROM user  WHERE email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $email);
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
function save_campaign($title, $description, $target, $imageUrl, $connection) {
    // Prepare the INSERT statement for campaign
    $stmt = mysqli_prepare($connection, "INSERT INTO `campaign` (`title`, `description`, `fund_target`, `image_url`) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssds', $title, $description, $target, $imageUrl);
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
    if (!$result_insert_query) {
        return false;
    }

    return true;
}

function user_exists($email, $connection) {
    $stmt = mysqli_prepare($connection, "SELECT * FROM `user` WHERE email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_num_rows($result) > 0;
}

function user_information($email, $connection) {
    $stmt = mysqli_prepare($connection, "SELECT * FROM user  WHERE email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {
        return $user;
    }
    return false;
}

function fetch_all_campaigns($connection) {
    $query = "SELECT * FROM campaign";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Database query failed.");
    }

    $campaigns = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $campaigns;
}

function get_single_campaign($id_campaign, $connection) {
    // Prepare the statement
    $stmt = mysqli_prepare($connection, "SELECT * FROM campaign WHERE id_campaign=?");

    // Bind the input parameter
    mysqli_stmt_bind_param($stmt, 's', $id_campaign);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Bind the result variables
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the data
    $campaign = mysqli_fetch_assoc($result);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Return the fetched data
    return $campaign;
}

function update_campaign($id, $title, $description, $fund_target, $connection) {
    $stmt = mysqli_prepare($connection, "UPDATE campaign SET title=?, description=?, fund_target=? WHERE id_campaign=?");
    mysqli_stmt_bind_param($stmt, 'ssdi', $title, $description, $fund_target, $id);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function save_donation($email,$id_campaign,$amount,$date,$connection) {
    $user = user_information($email,$connection);

    $stmt = mysqli_prepare($connection, "INSERT INTO `donate` (`id_user`, `id_campaign`, `amount`, `datetime`) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'iiis', $user['id_user'], $id_campaign, $amount,$date);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        return false;
    }

    return true;
}

function donation_by_user($email, $connection) {
    $user = user_information($email, $connection);

    // Prepare the SQL statement
    $stmt = mysqli_prepare($connection, "SELECT * FROM `donate` WHERE id_user = ?");
    mysqli_stmt_bind_param($stmt, 'i', $user['id_user']);

    // Execute the statement
    if (!mysqli_stmt_execute($stmt)) {
        return false;  // Return false if execution fails
    }

    // Get the result set from the statement
    $result = mysqli_stmt_get_result($stmt);

    // Fetch all rows at once
    $donations = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Check if donations were found
    if (!empty($donations)) {
        return $donations;  // Return all rows
    } else {
        return false;  // Return false if no rows found
    }
}

function campaign_by_id($campaign_id,$connection) {
    $stmt = mysqli_prepare($connection, "SELECT * FROM campaign  WHERE id_campaign = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 'i', $campaign_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($campaign = mysqli_fetch_assoc($result)) {
        return $campaign;
    }
    return false;
}
