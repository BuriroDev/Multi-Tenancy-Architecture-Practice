<?php
session_start();
require './connectDB.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $tableName = $_POST['tableName'];

    $sql = "CREATE TABLE $tableName (id INT PRIMARY KEY)";
    if(mysqli_query($conn, $sql)){
        echo "table created";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>You have successfully Logged in!</h1>

    <form method="post">
        <label>Table Name:</label>
        <input type="text" name="tableName">
        <button type="submit">Create Table</button>
    </form>
</body>

</html>