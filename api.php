<?php
require_once 'databaseFunctions.php';
require_once 'postFunctions.php';
require_once 'sessionFunctions.php';

if (!authBySession()) {
    header('Location: home');
    die();
}

//  Вывод запроса 
$method = $_SERVER['REQUEST_METHOD'];
echo $method . '<br>';
//Сохранение поста
if ($method === 'POST') {
    $dataAsJson = file_get_contents("php://input");
    $dataAsArray = json_decode($dataAsJson, true);

    $database = createDBConnection();

    try {
        preparePostParams($dataAsArray);
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
    $createdPostId = savePost($database, $dataAsArray);
    if ($createdPostId) {
        echo '<br>' . "Успешно создан пост с id = " . $createdPostId . '<br>';
    }
    // иначе не смогли передать в бд
    closeDBConnection($database);
}