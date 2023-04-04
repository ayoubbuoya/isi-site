<?php
require_once "db_connect.php";

session_start();


echo "<br> " . $_SESSION["account_img_path"] . "<br>";


$sql = "SELECT name, description FROM classes";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name : " .  $row["name"] . "<br>Description : " . $row["description"] . "<br>" . $row["color"];
    };
}
