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
//НАДО ЛИ.. НА СЛУЧАЙ КОГДА ИЗ УДАЛЕННЫХ ИЛИ ЗАВЕРШ ОБРАТНО
$type = "progr";

// Собираем данные для запроса
$data = array($type, $id, session_id());
// Подготавливаем SQL-запрос
$query = $conn->prepare("UPDATE `items` SET `type` = ? WHERE `id` = ? AND `session` = ?");
// Выполняем запрос с данными
$query->execute($data);

?>