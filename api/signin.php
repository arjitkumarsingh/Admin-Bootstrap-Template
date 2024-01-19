<?php
session_start();
header("Content-Type:application/json");
require_once "../php/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION['id']);
    unset($_SESSION['emailErr']);
    unset($_SESSION['passwordErr']);
    unset($_SESSION['userErr']);
    unset($_SESSION['activeErr']);
    unset($_SESSION['user_id']);

    $data = json_decode(file_get_contents("php://input"));

    if (empty($data->email)) {
        $_SESSION['emailErr'] = "Email is required";
    } else {
        $email = testInput($data->email);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr'] = "Invalid email format";
        }
    }

    if (empty($data -> password)) {
        $_SESSION['passwordErr'] = "Password is required";
    } else {
        $password = testInput($data -> password);
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

        if (isset($_SESSION['user_id'])) {
            $response['id'] = $_SESSION['user_id'];
            $response['name'] = $_SESSION['name'];
            $response['email'] = $_SESSION['email'];
            $response['password'] = $_SESSION['password'];
            $response['status'] = $_SESSION['status'];
            $response['role'] = $_SESSION['role'];
            if ($_SESSION['status'] != 0) {
                http_response_code(200);
                echo json_encode($response);
                // require_once "otp-update.php";
            } else {
                http_response_code(403);
                $_SESSION['activeErr'] = "Can not signin at the moment. Please contact administration";
                echo $_SESSION['activeErr'];
                // header("location: ../template/page-signin.php");
            }
        } else {
            http_response_code(404);
            $_SESSION['userErr'] = "Invalid User Credentials";
            echo $_SESSION['userErr'];
            print_r(mysqli_error($conn));
            // header("location: ../template/page-signin.php");
        }
    }
} else {
    http_response_code(405);
    echo "Unsupported request method";
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
// mysqli_close($conn);
?>