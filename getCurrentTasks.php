<?php
session_start();

include __DIR__ . '/config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = session_id();
$sql = "SELECT id, text FROM items WHERE type='progr' AND session='$id'";

$inProgr = mysqli_query($conn, $sql);


$myArr = array();
while ($row = mysqli_fetch_assoc($inProgr)) {
    array_push($myArr, $row);
}

header('Content-Type: application/json');
echo json_encode($myArr);
?>