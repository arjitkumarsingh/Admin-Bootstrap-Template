<?php
// session_start();
require_once "connection.php";

$newPassword = genratePassWord();
unset($_SESSION['mail']);

$stmt = mysqli_prepare($conn, "UPDATE users SET `password` = ? WHERE email = ?");
mysqli_stmt_bind_param($stmt, "ss", $newPassword, $email);

if (mysqli_stmt_execute($stmt)) {
    $subject = "New password for Admin Bootstrap Template";
    $body = "<h3>Admin Bootstrap Template Password</h3>
            Your new password for login is: <strong>" . $newPassword . "</strong><br>
            <br>
            Thanks & Regards!<br>
            Admin Bootstrap Template";
    require_once "send-email.php";
    $_SESSION['mail'] = "New password sent to the email";
} else {
    echo "Error: <br>" . mysqli_error($conn);
}

function genratePassword() {
    $digits    = array_flip(range('0', '9'));
    $lowercase = array_flip(range('a', 'z'));
    $uppercase = array_flip(range('A', 'Z'));
    $special   = array_flip(str_split('!@#$%^&*'));
    $combined  = array_merge($digits, $lowercase, $uppercase, $special);

    $password  = str_shuffle(array_rand($digits)
        . array_rand($lowercase)
        . array_rand($uppercase)
        . array_rand($special)
        . implode(array_rand($combined, rand(4, 8))));
        
    return $password;
}
?>