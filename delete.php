<?php
session_start();

$id = $_POST["id"];

include __DIR__ . '/config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$data = array($id, session_id());
$sql = "DELETE FROM `items` WHERE `id` = ? AND `session` = ?";
$query = $conn->prepare($sql);
$query->execute($data);

?>