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
// Initialize error messages array
$errors = [];
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Retrieve form data
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$uvccmNo = $_POST['uvccmNo'];
$ccmNo = $_POST['ccmNo'];
$electronicNo = $_POST['electronicNo'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$degree = $_POST['degree'];
$duration = $_POST['duration'];
$branch = $_POST['branch'];
// $photo = $_FILES['photo']['name'];
// $photo_tmp = $_FILES['photo']['tmp_name'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
// Check if electronicNo matches the format C000X-XXXX-XXX-X
if (!preg_match('/^C000\d-\d{4}-\d{3}-\d$/', $electronicNo)) {
$errors['electronicNo'] = "<span style='color:red;font-weight:bold; font-size:25px;font-family:calibri'>Sorry, Electronic number not found. ";
}
// Check if electronicNo already exists in the database
$check_query = "SELECT * FROM users WHERE electronicNo='$electronicNo'";
$result = $conn->query($check_query);
if ($result->num_rows > 0) {
$errors['electronicNo'] = "<span style='color:red;font-weight:bold; font-size:25px;font-family:calibri'>Sorry, a user with the same electronic number already exists.</span>";
}
// Check if password matches the confirm password
if ($password !== $confirmPassword) {
$errors['confirmPassword'] = "<span style='color:red;font-weight:bold; font-size:25px;font-family:calibri'>Passwords do not match.</span>";
}
// If there are no errors, proceed with database insertion
if (empty($errors)) {
// Insert data into database
$sql = "INSERT INTO users (firstName, middleName, lastName, uvccmNo, ccmNo, electronicNo, gender, email, degree, duration, branch, photo, password) VALUES ('$firstName',
'$middleName', '$lastName', '$uvccmNo', '$ccmNo', '$electronicNo', '$gender', '$email', '$degree',
'$duration', '$branch', '$photo', '$password')";
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: ".$sql. "<br>".$conn->error;
}
} else {
// Print error messages
foreach ($errors as $error) {
echo $error . "<br>";
}
}
}
// Close connection
$conn->close();
?>