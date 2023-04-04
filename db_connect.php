<?php

$dbservername = "localhost";
$dbusername = "ayoub";
$dbpassword =  "ayoub2002";
$dbname = "isi_site_db";

// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 