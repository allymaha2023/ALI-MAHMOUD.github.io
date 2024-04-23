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

// Upload event
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$title = $_POST["title"];
$description = $_POST["description"];
$event_date = $_POST["event_date"];
$location = $_POST["location"];
$organizer = $_POST["organizer"];
$sql = "INSERT INTO events (title, description, event_date, location, organizer) VALUES ('$title',
'$description', '$event_date', '$location', '$organizer')";
if ($conn->query($sql) === TRUE) {
echo "Event uploaded successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>
