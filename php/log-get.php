<?php
require_once 'connection.php';

// Fetch.
$stmt = mysqli_prepare($conn, "SELECT `id`, DATE_FORMAT(`login_time`, '%d-%m-%Y') AS `date`, DATE_FORMAT(`login_time`, '%r') AS `time`, `ip` FROM user_log WHERE user_id = ?");
mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($result != false) {
    http_response_code(200);
    $logs = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    http_response_code(422);
    echo "Error in getting user logs";
}
