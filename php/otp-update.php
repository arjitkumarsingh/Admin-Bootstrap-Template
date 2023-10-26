<?php
session_start();
require_once "connection.php";

$_SESSION['otp'] = rand(99999, 999999);
unset($_SESSION['mail']);

$stmt = mysqli_prepare($conn, "UPDATE users SET otp = ? WHERE email = ?");
mysqli_stmt_bind_param($stmt, "is", $_SESSION['otp'], $_SESSION['email']);

if (mysqli_stmt_execute($stmt)) {
    echo "OTP updated successfully";
    $subject = "OTP for Admin Bootstrap Template";
    $body = "<h3>DO NOT SHARE OTP WITH ANYONE</h3>
            Your OTP for login is: <strong>" . $_SESSION['otp'] . "</strong><br>
            <br>
            Thanks & Regards!<br>
            Admin Bootstrap Template";
    require_once "email-send.php";
    $_SESSION['mail'] = "OTP sent to the email";
    header("location: ../template/page-otp-verify.php");
} else {
    echo "Error: <br>" . mysqli_error($conn);
}
?>