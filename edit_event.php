<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uvccm";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: ".$conn->connect_error);
}


/ Edit event
if (isset($_GET['edit_event_id'])) {
$id = $_GET['edit_event_id'];
// Your edit event logic here
}

$conn->close();
?>

