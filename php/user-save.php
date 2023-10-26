<?php
session_start();
include_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION['user']);
    unset($_SESSION['userErr']);
    unset($_SESSION['nameErr']);
    unset($_SESSION['emailErr']);
    unset($_SESSION['passwordErr']);

    if (empty($_POST["name"])) {
        $_SESSION['nameErr'] = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $_SESSION['nameErr'] = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $_SESSION['emailErr'] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr'] = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $_SESSION['passwordErr'] = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {
            $_SESSION['passwordErr'] = "Password must be a combination of symbol(!@#$%^&*), number, upper & lower case letter and minimum 8 characters long";
        }
    }

    if (empty($_POST["role"])) {
        $role = 2;
    } else {
        $role = $_POST["role"];
    }

    if (empty($_SESSION['nameErr']) && empty($_SESSION['emailErr']) && empty($_SESSION['passwordErr']) && empty($_SESSION['phoneErr'])) {
        // $otp = rand(99999, 999999);
    // }

    // if (!empty($otp)) {
        $stmt = mysqli_prepare($conn, "INSERT INTO users (`name`, `email`, `password`, `role`) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $password, $role);

        if (mysqli_stmt_execute($stmt)) {
            echo "New user saved successfully";
            $_SESSION['user'] = "New user saved successfully";
        } else {
            $_SESSION['userErr'] = "Error in saving new user";
            echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
        }
        header("location: ../template/page-dashboard-admin.php");
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