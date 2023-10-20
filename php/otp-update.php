<?php
session_start();
require_once "connection.php";

$_SESSION['otp'] = rand(99999, 999999);
$stmt = mysqli_prepare($conn, "UPDATE users SET otp = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, "ii", $_SESSION['otp'], $_SESSION['id']);

if (mysqli_stmt_execute($stmt)) {
    echo "OTP updated successfully";
    require_once "otp-send.php";
    header("location: ../template/page-otp-verify.php");
} else {
    echo "Error: <br>" . mysqli_error($conn);
}
?>