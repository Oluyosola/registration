<?php
$servername = "localhost";
$username ="root";
$password ="";
$dbname = "registration";
$conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error){
//     die ("connection failed" . $conn->connect_error);
// }else{
//     echo "connected successfully";
// }
$sql = "CREATE DATABASE Registration";
if($conn->query($sql) === true){
    echo "database created successfully";
}else{
    echo "Database not created". $conn->error;
}

// $sql = "CREATE TABLE users(
//     id INT(6) AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(100) NOT NULL,
//     email VARCHAR(100) NOT NULL,
//     password VARCHAR(100) NOT NULL
// )";
// if($conn->query($sql) === true){
//     echo "Users Table created";
// }else{
//     echo "Users Table not created" . $conn->error;
// }

?>