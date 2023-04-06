<?php

session_start();

require_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_name = $_POST["class-name"];
    $class_description = $_POST["class-description"];
    $user_id = $_SESSION["id"];

    // generate new class code and check if it is already on use or no
    function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    // t 
    while (true) {
        # code...
        $class_code = generateRandomString(rand(5, 7));
        if ($conn->query("SELECT * FROM classes WHERE code = '" . $class_code . "'")->num_rows === 0) {
            break;
        }
    }

    $colors = array("gr-1", "gr-2", "gr-3", "gr-4", "gr-5", "gr-6");

    $class_color = $colors[array_rand($colors)];
    $class_image = "./db_imgs/default_class.png";

    echo $class_code . "<br>";
    echo $class_name . "<br>";
    echo $class_description . "<br>";
    echo $class_color . "<br>";
    echo $class_image . "<br>";

    $sql = 'INSERT INTO classes(code, name, description, image, color) VALUES ("' . $class_code . '", "' . $class_name . '", "' . $class_description . '", "' . $class_image . '", "' . $class_color . '")';
    echo $sql;

    if ($conn->query($sql)) {
        echo "<br>Data Inserted<br>";
        // check if class code exists
        $result = $conn->query("SELECT id FROM classes WHERE code = '" . $class_code . "'");
        $row = $result->fetch_assoc();
        $class_id = $row["id"];
        // class fund now give acces to that user
        $conn->query("INSERT INTO enrollments(class_id, user_id) VALUES (" . $class_id . ", " . $user_id . ")");
        header("Location:  cours.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
