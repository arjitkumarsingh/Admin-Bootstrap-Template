<?php
require_once "connection.php";
// Fetch.
$stmt = mysqli_prepare($conn, "SELECT COUNT(*) FROM users");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($result != false) {
    http_response_code(200);
    $total_records = mysqli_fetch_column($result);
} else {
    http_response_code(422);
    echo "Error in getting list of users";
}
?>