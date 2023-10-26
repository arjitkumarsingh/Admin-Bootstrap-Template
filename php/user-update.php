<?php
session_start();
require_once "connection.php";
include_once "user-get.php";

if (!empty($user)) {
    if (empty($_POST['name'])) {
        $name = $user['name'];
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        $email = $user['email'];
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['password'])) {
        $password = $user['password'];
    } else {
        $password = $_POST['password'];
    }


    $stmt = mysqli_prepare($conn, "UPDATE users SET `name` = ?, `email` = ?, `password` = ?, `role` = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sssii", $name, $email, $password, $_POST['role'], $_GET['id']);

    if (mysqli_stmt_execute($stmt)) {
        echo "user updated successfully";
        unset($_SESSION['user']);
        $_SESSION['user'] = "User details updated successfully";
        header("location: ../template/page-dashboard-admin.php");
    } else {
        echo "Error: <br>" . mysqli_error($conn);
        unset($_SESSION['userErr']);
        $_SESSION['userErr'] = "User details didn't update";
        header("location: ../template/page-dashboard-admin.php");
    }
} else {
    echo "User not selected";
    unset($_SESSION['userErr']);
    $_SESSION['userErr'] = "Can't fetch user details";
}
?>