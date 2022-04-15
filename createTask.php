<?php
session_start();

$text = $_POST["text"];
//$type = $_POST["type"];

include __DIR__ . '/config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//НАДО ЛИ.. НА СЛУЧАЙ КОГДА ИЗ УДАЛЕННЫХ ИЛИ ЗАВЕРШ ОБРАТНО
$type = "progr";

// Собираем данные для запроса
$data = array($text, $type, session_id());
// Подготавливаем SQL-запрос
$query = $conn->prepare("INSERT INTO items (text, type, session) values (?, ?, ?)");
// Выполняем запрос с данными
$query->execute($data);

?>