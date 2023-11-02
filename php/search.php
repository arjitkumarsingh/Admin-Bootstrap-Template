<?php
require_once "connection.php";

if (isset($_POST['search'])) {
    $query = "SELECT * FROM `users` WHERE LOWER(`name`) LIKE LOWER('%$_POST[search]%') OR LOWER(`email`) LIKE LOWER('%$_POST[search]%') OR `password` LIKE '%$_POST[search]%'";

    // Fetch.
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result != false) {
        http_response_code(200);
        $searchResult = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo json_encode($searchResult);
    } else {
        http_response_code(422);
        echo "Error in getting list of users";
    }
}
?>