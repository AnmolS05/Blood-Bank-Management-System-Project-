<?php
$conn = new mysqli("localhost", "root", "", "bloodb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
