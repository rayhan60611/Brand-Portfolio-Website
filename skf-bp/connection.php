<?php


$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'skfbp';

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Connection Failed" . $conn->connect_error);
}


?>
