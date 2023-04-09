<?php
session_start();

require_once "db_connect.php";

// Retrieve the event data from the database
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

$events = array();

if ($result->num_rows > 0) {
    // Loop through each row and add the event data to the $events array
    while ($row = $result->fetch_assoc()) {
        $day = date("d", strtotime($row["date"]));
        $month = date("m", strtotime($row["date"]));
        $year = date("Y", strtotime($row["date"]));
        $event = array(
            "name" => $row["name"],
            "description" => $row["description"],
            "day" => $day,
            "month" => $month,
            "year" => $year,
        );
        array_push($events, $event);
    }
}

// Close the database connection
$conn->close();

// Return the event data in JSON format
header('Content-Type: application/json');
echo json_encode(array("events" => $events));
