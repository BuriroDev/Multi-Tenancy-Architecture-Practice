<?php
session_start();

$emp_DB = $_SESSION['db_name'];

$servername = "localhost";
$username = "root"; 
$password = "root";
 
$dbname = $emp_DB;

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE $dbname";

if ($conn->query($sql) === TRUE) {
    echo "Database '$dbname' created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

header("location: index.php");
?>

