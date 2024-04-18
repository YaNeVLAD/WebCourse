<?php
require_once 'databaseFunctions.php';

//  Вывод запроса 
$method = $_SERVER['REQUEST_METHOD'];
echo $method . '<br>';
//Сохранение поста
if ($method === 'POST') {
    $dataAsJson = file_get_contents("php://input");
    $dataAsArray = json_decode($dataAsJson, true);

    $database = createDBConnection();

    $createdPostId = savePost($database, $dataAsArray);
    if ($createdPostId) {
        echo "Успешно создан пост с id = " . $createdPostId;
    }
    // иначе не смогли передать в бд
    closeDBConnection($database);
}