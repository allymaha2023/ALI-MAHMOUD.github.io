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

// Delete document
if (isset($_GET['delete_document_id'])) {
$id = $_GET['delete_document_id'];
$sql = "DELETE FROM documents WHERE id=$id";
if ($conn->query($sql) === TRUE) {
echo "Document deleted successfully";
} else {
echo "Error deleting record: " . $conn->error;
}
}
$conn->close();
?>









