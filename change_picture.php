<?php
session_start();

require_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    echo $file;
    $file = $_POST["file"];
    $user_id = $_SESSION["id"];

    // move the uploaded file to the specified directory
    $target_dir = "db_imgs/"; // specify the directory where you want to save the file
    $target_file = $target_dir . strtolower($_SESSION["name"]) . ".png"; // get the file name

    // move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
        $sql = "UPDATE users SET account_image = '" . $target_file . "' WHERE id = " . $user_id;
        $result = $conn->query($sql);
        if ($result) {
            $_SESSION["account-img"] = $target_file;
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "There was an error uploading your file.";
    }
}
