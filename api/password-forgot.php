<?php
session_start();
include_once "../php/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION['emailErr']);
    unset($_SESSION['id']);
    unset($_SESSION['name']);

    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->email)) {
        $email = $data->email;
    } else if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    if (empty($email)) {
        http_response_code(400);
        $_SESSION['emailErr'] = "Email is required";
        echo $_SESSION['emailErr'];
    } else {
        $email = testInput($email);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            $_SESSION['emailErr'] = "Invalid email format";
            echo $_SESSION['emailErr'];
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
            http_response_code(200);
            require_once "../php/password-update.php";
            // header("location: ../template/page-signin.php");
        } else {
            http_response_code(404);
            $_SESSION['emailErr'] = "Email not found";
            echo $_SESSION['emailErr'];
            print_r(mysqli_error($conn));
            // header("location: ../template/page-password-forgot.php");
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
    $data = htmlspecialchars($data);
    return $data;
}
// mysqli_close($conn);
?>