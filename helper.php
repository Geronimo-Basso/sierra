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
