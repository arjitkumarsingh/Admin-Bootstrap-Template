<?php
session_start();
require_once "connection.php";

unset($_SESSION['user']);
unset($_SESSION['userErr']);

$sql = "DELETE FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
mysqli_stmt_execute($stmt);

if (mysqli_affected_rows($conn) > 0) {
    http_response_code(200);
    $_SESSION['user'] = "User deleted successfully";
} else {
    http_response_code(422);
    $_SESSION['userErr'] = "Error in deleting user";
}

header("Location: ../template/page-dashboard-admin.php");
?>