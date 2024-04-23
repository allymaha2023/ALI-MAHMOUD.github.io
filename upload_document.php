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

// Upload document
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
$name = $_FILES["file"]["name"];
$file_path = "uploads/" . basename($_FILES["file"]["name"]);
$uploader = "John Doe"; // Example uploader name, you can change this
$upload_date = date("Y-m-d");
move_uploaded_file($_FILES["file"]["tmp_name"], $file_path);
$sql = "INSERT INTO documents (name, file_path, uploader, upload_date) VALUES ('$name',
'$file_path', '$uploader', '$upload_date')";
if ($conn->query($sql) === TRUE) {
echo "Document uploaded successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>