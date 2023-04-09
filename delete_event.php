<?php
require_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $event_id = $_POST["event_id"];
  $sql = "DELETE FROM events WHERE id = $event_id";
  if ($conn->query($sql) === TRUE) {
    echo "Event deleted successfully";
  } else {
    echo "Error deleting event: " . $conn->error;
  }
}
$conn->close();
