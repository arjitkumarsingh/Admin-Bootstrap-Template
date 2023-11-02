<?php
require_once 'connection.php';

//pagination
require_once "users-count.php";
$result_per_page = 3;
$total_pages = ceil($total_records / $result_per_page);
if(isset($_GET['page'])) {
    $page_number = $_GET['page'];
} else {
    $page_number = 1;
}
$start_exclusive = ($page_number - 1) * $result_per_page;
$stmt = mysqli_prepare($conn, "SELECT * FROM users LIMIT $start_exclusive, $result_per_page");


// Fetch.
// $stmt = mysqli_prepare($conn, "SELECT * FROM users");
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