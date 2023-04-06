<?php


session_start();

require_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_code = $_POST["class-code"];
    $user_id = $_SESSION["id"];

    // check if class code exists
    $result = $conn->query("SELECT id FROM classes WHERE code = '" . $class_code . "'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $class_id = $row["id"];
        // class fund now give acces to that user
        $conn->query("INSERT INTO enrollments(class_id, user_id) VALUES (" . $class_id . ", " . $user_id . ")");
        header("Location: cours.php");
    } else {
        echo "Class code not found";
        header("Location: join_class.php?found=false");
    }
}
