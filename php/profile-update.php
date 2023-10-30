<?php
session_start();
require_once "connection.php";
// include_once "user-get.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name'])) {
        $name = $_SESSION['name'];
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        $email = $_SESSION['email'];
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['password'])) {
        $password = $_SESSION['password'];
    } else {
        $password = $_POST['password'];
    }


    $stmt = mysqli_prepare($conn, "UPDATE users SET `name` = ?, `email` = ?, `password` = ?, `status` = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sssii", $name, $email, $password, $_POST['status'], $_SESSION['id']);

    if (mysqli_stmt_execute($stmt)) {
        echo "user updated successfully";
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        unset($_SESSION['user']);
        if ($_POST['status'] == 0) {
            $_SESSION['user'] = "Profile is marked for deactivation. You will not be able to signin after signout.";
        } else {
            $_SESSION['user'] = "User profile updated successfully";
        }
        header("location: ../template/page-dashboard-admin.php");
    } else {
        echo "Error: <br>" . mysqli_error($conn);
        unset($_SESSION['userErr']);
        $_SESSION['userErr'] = "User profile didn't update";
        header("location: ../template/page-profile.php");
    }
}
