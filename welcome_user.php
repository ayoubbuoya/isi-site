<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['email'])) {
    // The user is logged in
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
    $title = "";
    if ($role ===  "admin") {
        header("Location: admin.php");
    } else {
        header("Location: cours.php");
    }
} else {
    // The user is not logged in
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome User</title>
</head>

<body>

</body>

</html>