<?php

session_start();

require_once "db_connect.php";

$post_id = $_GET["post_id"];
$user_id = $_SESSION["id"];
$comment_content = $_POST["comment"];


$sql = "INSERT INTO comments(content, post_id, user_id) VALUES ('" . $comment_content . "', " . $post_id . ", " . $user_id . ")";

$result = $conn->query($sql);

// Check for errors
if (!$result) {
    die("Insert query failed: " . mysqli_error($conn));
} else {
    echo "Data inserted successfully!";
    // redirect to the class page
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
