<?php
session_start();
include_once "../php/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->name)) {
        $name = $data->name;
    } else if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }

    if (isset($data->email)) {
        $email = $data->email;
    } else if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    if (isset($data->password)) {
        $password = $data->password;
    } else if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    if (empty($name)) {
        http_response_code(400);
        $_SESSION['nameErr'] = "Name is required";
        echo json_encode($_SESSION['nameErr']);
    } else {
        unset($_SESSION['nameErr']);
        $name = test_input($name);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            http_response_code(400);
            $_SESSION['nameErr'] = "Only letters and white space allowed in name";
            echo json_encode($_SESSION['nameErr']);
        }
    }

    if (empty($email)) {
        http_response_code(400);
        $_SESSION['emailErr'] = "Email is required";
        echo json_encode($_SESSION['emailErr']);
    } else {
        unset($_SESSION['emailErr']);
        $email = test_input($email);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            $_SESSION['emailErr'] = "Invalid email format";
            echo json_encode($_SESSION['emailErr']);
        }
    }

    if (empty($password)) {
        http_response_code(400);
        $_SESSION['passwordErr'] = "Password is required";
        echo json_encode($_SESSION['passwordErr']);
    } else {
        unset($_SESSION['passwordErr']);
        $password = test_input($password);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {
            http_response_code(400);
            $_SESSION['passwordErr'] = "Password must be a combination of symbol(!@#$%^&*), number, upper & lower case letter and minimum 8 characters long";
            echo json_encode($_SESSION['passwordErr']);
        }
    }

    if (empty($_SESSION['nameErr']) && empty($_SESSION['emailErr']) && empty($_SESSION['passwordErr']) && empty($_SESSION['phoneErr'])) {
        $role = 2;
        $stmt = mysqli_prepare($conn, "INSERT INTO users (`name`, `email`, `password`, `role`) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $password, $role);

        if (mysqli_stmt_execute($stmt)) {
            http_response_code(201);
            echo "New record created successfully";
            header("location: ../template/page-signin.php");
        } else {
            http_response_code(500);
            echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
        }
    }
} else {
    http_response_code(405);
    echo "Unsupported request method";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// mysqli_close($conn);
?>