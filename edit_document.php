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

// Edit document
if (isset($_GET['edit_document_id'])) {
$id = $_GET['edit_document_id'];
// Your edit document logic here
}

$conn->close();
?>

