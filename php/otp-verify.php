<?php
session_start();
require_once "connection.php";

echo "<pre>";
print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION['otpErr']);
    $otp = filter_var($_POST["otp"], FILTER_SANITIZE_NUMBER_INT);

    if (!$otp) {
        $_SESSION['otpErr'] = "OTP is required";
        header("location: ../template/page-otp-verify.php");
    } else if (strlen($otp) != 6) {
        // check if OTP is 6 digits long
        // if (!preg_match("/^\d{10}$/", $otp)) {
        $_SESSION['otpErr'] = "OTP must be 6 digit long";
        header("location: ../template/page-otp-verify.php");
    } else if ($otp == $_SESSION['otp']) {
        echo "OTP matched";
        header("location: ../template/index.html");
    } else {
        $_SESSION['otpErr'] = "OTP did not match";
        header("location: ../template/page-otp-verify.php");
    }
}
?>