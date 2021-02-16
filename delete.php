<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

$todoName = $_POST['todo_name'];
$json = file_get_contents('todo.json');
$jsonArray = json_decode($json, true);

unset($jsonArray[$todoName]);
file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
header('Location: index.php');