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
}// Edit news
if (isset($_GET['edit_news_id'])) {
$id = $_GET['edit_news_id'];
// Your edit news logic here
}

$conn->close();
?>

