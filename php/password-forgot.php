<?php
session_start();
include_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION['emailErr']);
    unset($_SESSION['id']);
    unset($_SESSION['name']);

    if (empty($_POST["email"])) {
        $_SESSION['emailErr'] = "Email is required";
    } else {
        $email = testInput($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr'] = "Invalid email format";
        }
    }


    if (empty($_SESSION['emailErr'])) {
        $stmt = mysqli_prepare($conn, "SELECT `name`, `email` FROM users WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        // use either two according to your need
        // $result = mysqli_stmt_get_result($stmt);
        // $user = mysqli_fetch_assoc($result);

        // OR
        mysqli_stmt_bind_result($stmt, $_SESSION['name'], $_SESSION['email']);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_free_result($stmt);

        if ($email == $_SESSION['email']) {
            require_once "password-update.php";
            header("location: ../template/page-signin.php");
        } else {
            $_SESSION['emailErr'] = "Email not found";
            print_r(mysqli_error($conn));
            header("location: ../template/page-password-forgot.php");
        }
    }
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// mysqli_close($conn);
?>