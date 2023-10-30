<?php
session_start();
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION['otpErr']);
    $otp = filter_var($_POST["otp"], FILTER_SANITIZE_NUMBER_INT);

    if (!$otp) {
        $_SESSION['otpErr'] = "OTP is required";
        header("location: ../template/page-otp-verify.php");
        
        // check if OTP is 6 digits long
    } else if (strlen($otp) != 6) {
        $_SESSION['otpErr'] = "OTP is 6 digit long";
        header("location: ../template/page-otp-verify.php");
    } else if ($otp == $_SESSION['otp']) {
        echo "OTP matched";
        $_SESSION['id'] = $_SESSION['user_id'];
        unset($_SESSION['user_id']);
        require_once "log-user.php";
        header("location: ../template/page-dashboard-admin.php");
    } else {
        $_SESSION['otpErr'] = "OTP did not match";
        header("location: ../template/page-otp-verify.php");
    }
}
?>