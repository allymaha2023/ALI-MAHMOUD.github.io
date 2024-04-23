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

// Delete event
if (isset($_GET['delete_event_id'])) {
$id = $_GET['delete_event_id'];
$sql = "DELETE FROM events WHERE id=$id";
if ($conn->query($sql) === TRUE) {
echo "Event deleted successfully";
} else {
echo "Error deleting record: " . $conn->error;
}
}

$conn->close();
?>
