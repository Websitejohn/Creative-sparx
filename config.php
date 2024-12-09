<?php
$host = 'localhost';
$db = 'blog'; // Your database name
$user = 'new_username'; // Replace with your actual database username
$pass = 'new_password'; // Replace with your actual database password

// Create connection
$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>