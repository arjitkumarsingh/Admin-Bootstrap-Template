<?php
require_once 'connection.php';

// Fetch.
$stmt = mysqli_prepare($conn, "SELECT * FROM users");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($result != false) {
    http_response_code(200);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    http_response_code(422);
    echo "Error in getting list of users";
}
?>