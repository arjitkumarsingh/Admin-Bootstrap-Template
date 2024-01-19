<?php
session_start();
require_once "../php/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION['otpErr']);
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->otp)) {
        $otp = $data->otp;
    } else {
        $otp = filter_var($_POST["otp"], FILTER_SANITIZE_NUMBER_INT);
    }

    if (!$otp) {
        http_response_code(400);
        $_SESSION['otpErr'] = "OTP is required";
        echo $_SESSION['otpErr'];
        // header("location: ../template/page-otp-verify.php");

        // check if OTP is 6 digits long
    } else if (strlen($otp) != 6) {
        http_response_code(400);
        $_SESSION['otpErr'] = "OTP is 6 digit long";
        echo $_SESSION['otpErr'];
        // header("location: ../template/page-otp-verify.php");
    } else if ($otp == $_SESSION['otp']) {
        http_response_code(200);
        echo "OTP matched";
        $_SESSION['id'] = $_SESSION['user_id'];
        // unset($_SESSION['user_id']);
        require_once "../php/log-user.php";
        // header("location: ../template/page-dashboard-admin.php");
    } else {
        http_response_code(400);
        $_SESSION['otpErr'] = "OTP did not match";
        echo $_SESSION['otpErr'];
        // header("location: ../template/page-otp-verify.php");
    }
} else {
    http_response_code(405);
    echo "Unsupported request method";
}
?>