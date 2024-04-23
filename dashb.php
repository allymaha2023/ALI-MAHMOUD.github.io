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
// Retrieve user data from the database
$electronicNo = $_SESSION['electronicNo'];
$sql = "SELECT * FROM users WHERE electronicNo='$electronicNo'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile</title>
<link rel="stylesheet" href="loginAndRegStyles.css"> <!-- Link to your external CSS file -->
</head>
<body>
<div class="container">
<?php
if ($result->num_rows > 0) {
// Output data of each row
while($row = $result->fetch_assoc()) {
echo "<h2>Welcome " . $row["firstName"] . " " . $row["lastName"] . "</h2>";
echo "<p>First Name: " . $row["firstName"] . "</p>";
echo "<p>Middle Name: " . $row["middleName"] . "</p>";
echo "<p>Last Name: " . $row["lastName"] . "</p>";
echo "<p>UVCCM No: " . $row["uvccmNo"] . "</p>";
echo "<p>CCM No: " . $row["ccmNo"] . "</p>";
echo "<p>Electronic No: " . $row["electronicNo"] . "</p>";
echo "<p>Gender: " . $row["gender"] . "</p>";
echo "<p>Email: " . $row["email"] . "</p>";
echo "<p>My program: " . $row["degree"] . "</p>";
echo "<p>Duration for my studies: " . $row["duration"] . "</p>";
echo "<p>My Branch: " . $row["branch"] . "</p>";


// Add more fields as needed
}
} else {
echo "No user data found.";
}
?>
</div>
</body>
</html>
<?php
// Close connection
$conn->close();
?>