<?php
session_start();
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Change to your database password if set
$dbname = "uvccm";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Process update form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$uvccmNo = $_POST['uvccmNo'];
$ccmNo = $_POST['ccmNo'];
// Add more variables for other fields as needed
// Update information in the database
$sql = "UPDATE users SET firstName='$firstName', middleName='$middleName', lastName='$lastName', uvccmNo='$uvccmNo', ccmNo='$ccmNo' WHERE
electronicNo='{$_SESSION['electronicNo']}'";
if ($conn->query($sql) === TRUE) {
echo "Information updated successfully";
} else {
echo "Error updating information: " . $conn->error;
}
}
// Close connection
$conn->close();
?>