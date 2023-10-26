<?php
session_start();
include_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION['id']);
    unset($_SESSION['emailErr']);
    unset($_SESSION['passwordErr']);
    unset($_SESSION['userErr']);
    unset($_SESSION['activeErr']);

    if (empty($_POST["email"])) {
        $_SESSION['emailErr'] = "Email is required";
    } else {
        $email = testInput($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr'] = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $_SESSION['passwordErr'] = "Password is required";
    } else {
        $password = testInput($_POST["password"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {
            $_SESSION['passwordErr'] = "Password must be a combination of symbol(!@#$%^&*), number, upper & lower case letter and minimum 8 characters long";
        }
    }

    if (empty($_SESSION['emailErr']) && empty($_SESSION['passwordErr'])) {    
        $stmt = mysqli_prepare($conn, "SELECT * FROM `users` WHERE `email` = ? AND `password` = ?");
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        // use either two according to your need
        // $result = mysqli_stmt_get_result($stmt);
        // $user = mysqli_fetch_assoc($result);

        // OR
        mysqli_stmt_bind_result($stmt, $_SESSION['user_id'], $_SESSION['name'], $_SESSION['email'], $_SESSION['password'], $_SESSION['status'], $_SESSION['role'], $_SESSION['otp']);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_free_result($stmt);

        print_r($_SESSION);
        
        if (isset($_SESSION['user_id'])) {
            if($_SESSION['status'] != 0) {
            require_once "otp-update.php";
            } else {
                $_SESSION['activeErr'] = "Can not signin at the moment. Please contact administration";
                header("location: ../template/page-signin.php");
            }
        } else {
            $_SESSION['userErr'] = "Invalid User Credentials";
            print_r(mysqli_error($conn));
            header("location: ../template/page-signin.php");
        }
    }
}

function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    // echo "<br>before: ".$data."<br>after: ";
    // $data = htmlspecialchars($data);
    // echo $data . "<br>";
    return $data;
}
// mysqli_close($conn);
?>