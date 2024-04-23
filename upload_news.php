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
}// Upload news
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$title = $_POST["title"];
$content = $_POST["content"];
$author = $_POST["author"];
$publication_date = $_POST["publication_date"];
$sql = "INSERT INTO news (title, content, author, publication_date) VALUES ('$title', '$content',
'$author', '$publication_date')";
if ($conn->query($sql) === TRUE) {
echo "News uploaded successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>

