<?php
require_once "connection.php";

$stmt = mysqli_prepare($conn, "SELECT * FROM `users` WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
mysqli_stmt_execute($stmt);
// use either two according to your need
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
?>