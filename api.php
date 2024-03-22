<?php
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
    saveFile("static/image.{$imgExtention}", $imageDecoded);
}
//  Вывод запроса 
$method = $_SERVER['REQUEST_METHOD'];
echo $method . '<br>';
// //  Печать массива
// $dataAsJson = file_get_contents("php://input");
// $dataAsArray = json_decode($dataAsJson, true);
// print_r($dataAsArray);
// // //  Сохранение массива в data.json
//  $dataAsJson = file_get_contents("php://input");
//  $dataAsArray = json_decode($dataAsJson, true);
//  saveFile('data.json', $dataAsJson);
//  Сохранение картинки как image.jpeg
if ($method == 'POST'){
$dataAsJson = file_get_contents("php://input");
$dataAsArray = json_decode($dataAsJson, true);
saveImage($dataAsArray['image']);
}