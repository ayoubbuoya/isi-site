<?php

session_start();

require_once "db_connect.php";

$class_id = $_GET["class_id"];
$user_id = $_SESSION["id"];
$post_content = $_POST["post-content"];

$sql = "INSERT INTO posts(content, class_id, user_id) VALUES ('" . $post_content . "', " . $class_id . ", " . $user_id . ")";

$result = $conn->query($sql);

// Check for errors
if (!$result) {
    die("Insert query failed: " . mysqli_error($conn));
} else {
    echo "Data inserted successfully!";
    // redirect to the class page
    header("Location: class.php?id=" . $class_id);
}
