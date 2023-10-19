<?php
session_start();
include_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $_SESSION['emailErr'] = "Email is required";
    } else {
        unset($_SESSION['emailErr']);
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr'] = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $_SESSION['passwordErr'] = "Password is required";
    } else {
        unset($_SESSION['passwordErr']);
        $password = test_input($_POST["password"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {
            $_SESSION['passwordErr'] = "Password must be a combination of symbol(!@#$%^&*), number, upper & lower case letter and minimum 8 characters long";
        }
    }

    // if (empty($_SESSION['nameErr']) && empty($_SESSION['emailErr']) && empty($_SESSION['passwordErr']) && empty($_SESSION['phoneErr'])) {
    //     $otp = rand(99999, 999999);
    // }
    echo "<pre>";

    if (empty($_SESSION['emailErr']) && empty($_SESSION['passwordErr'])) {
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ? AND `password` = ?");
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);

        if (mysqli_stmt_execute($stmt)) {
            echo "User found";

            // use either one of the set according to your need
            // $result = mysqli_stmt_get_result($stmt);        OR        mysqli_stmt_bind_result($stmt, $id, $name, $email, $password, $otp);
            // $user = mysqli_fetch_assoc($result);            OR        mysqli_stmt_fetch($stmt);
            
            mysqli_stmt_bind_result($stmt, $id, $name, $email, $password, $otp);
            mysqli_stmt_fetch($stmt);
            header("location: ../template/page-otp-validate.php");
        } else {
            echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// mysqli_close($conn);
?>