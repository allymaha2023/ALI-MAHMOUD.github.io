<?php
session_start();
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uvccm";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$electronicNo = $_POST['electronicNo'];
$password = $_POST['password'];
// Check if username and password match
$sql = "SELECT id FROM users WHERE electronicNo='$electronicNo' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
// Username and password are correct, log in the user
$_SESSION['electronicNo'] = $electronicNo;
header("Location: normalUser.html"); // Redirect to dashboard page
} else {
// Username or password is incorrect
$error = "Invalid username or password";
}
}
// Close connection
$conn->close();
?>