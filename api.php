<?php
<<<<<<< HEAD
require_once 'databaseFunctions.php';
require_once 'postFunctions.php';
require_once 'sessionFunctions.php';

if (!authBySession()) {
    header('Location: home');
    die();
=======
function saveFile(string $file, string $data): void
{
    $myFile = fopen($file, 'w');
    if ($myFile) {
        $result = fwrite($myFile, $data);
        if ($result) {
            echo '<br>' . 'Данные успешно сохранены в файл' . '<br>';
        } else {
            echo '<br>' . 'Произошла ошибка при сохранении данных в файл' . '<br>';
        }
        fclose($myFile);
    } else {
        echo '<br>' . 'Произошла ошибка при открытии файла' . '<br>';
    }
}
function saveImage(string $imageBase64)
{
    $imageBase64Array = explode(';base64,', $imageBase64);
    $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
    $imageDecoded = base64_decode($imageBase64Array[1]);
    saveFile("static/post-images/image.{$imgExtention}", $imageDecoded);
>>>>>>> 9eddfbd732b3616be3f0cccef27ee367cd5ba148
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