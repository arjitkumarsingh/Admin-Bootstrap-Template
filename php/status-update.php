<?php
session_start();
require_once "connection.php";

if ($_GET['status'] != 0) {
    $status = 0;
} else {
    $status = 1;
}


$stmt = mysqli_prepare($conn, "UPDATE users SET `status` = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, "ii", $status, $_GET['id']);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['user']);
    $_SESSION['user'] = "User status updated";
} else {
    unset($_SESSION['userErr']);
    $_SESSION['userErr'] = "Error in updating user status";
    echo "Error: <br>" . mysqli_error($conn);
}
header("location: ../template/page-dashboard-admin.php");
?>