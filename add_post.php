<?php

session_start();

require_once "db_connect.php";

$class_id = $_GET["class_id"];
$user_id = $_SESSION["id"];
$post_content = $_POST["post-content"];
$post_file = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
$file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

// move the uploaded file to the specified directory
$target_file = "db_files/" . strtolower($post_file) . "." . $file_ext;

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "The file " . $post_file . " has been uploaded.";
    $sql = "INSERT INTO posts(content, class_id, user_id, file) VALUES ('" . $post_content . "', " . $class_id . ", " . $user_id . ", '" . $target_file . "')";

    $result = $conn->query($sql);
    // Check for errors
    if (!$result) {
        die("Insert query failed: " . mysqli_error($conn));
    } else {
        echo "Data inserted successfully!";
        // redirect to the class page
        header("Location: class.php?id=" . $class_id);
    }
} else {
    echo "There was an error uploading your file.";
    echo "<br>" . $target_file; 
}
