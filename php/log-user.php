<?php
require_once "connection.php";

if ($_SESSION['role'] != 1) {
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
    $date = date("Y-m-d H:i:s");

    $stmt = mysqli_prepare($conn, "INSERT INTO user_log (`ip`, `login_time`, `user_id`) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssi", $_SERVER['REMOTE_ADDR'], $date, $_SESSION['id']);

    if (mysqli_stmt_execute($stmt)) {
        echo "user activity logged successfully";
    } else {
        echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
    }
}
// mysqli_close($conn);
