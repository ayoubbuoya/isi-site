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
    header("Location: login.php?found=false");
    exit;
}
