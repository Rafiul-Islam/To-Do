<?php
//print_r($_POST);
$todo_name = trim($_POST['todo_name'] ?? '');

if ($todo_name) {
    if (file_exists('todo.json')) {
        $json = file_get_contents('todo.json');
        $jsonArray = json_decode($json, true);
    } else {
        $jsonArray = [];
    }
    $jsonArray[$todo_name] = ['completed' => false];
//    echo "<pre>";
//    echo print_r($jsonArray);
//    echo "</pre>";
    file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header('Location: index.php');