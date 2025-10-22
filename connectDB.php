<?php
$dbName = $_SESSION['db_code'];

$servername = '127.0.0.1';
$username = 'root';
$password = 'root';
$db_name = $dbName;

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Connection Failed" . $conn->connect_error);
}
?>