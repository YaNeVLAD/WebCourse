<?php

const HOST = 'localhost';
const USERNAME = 'admin';
const PASSWORD = '12345';
const DATABASE = 'blog';
const MAX_STR_LEN = 255;

function createDBConnection(): mysqli
{
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function closeDBConnection(mysqli $conn): void
{
  $conn->close();
}
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
function saveImage(?string $imageBase64, ?string $imageName): ?string
{
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);
  $imageName = strtolower($imageName);
  $imageName = str_replace(' ', '-', $imageName);
  saveFile("static/posts-images/{$imageName}.{$imgExtention}", $imageDecoded);
  return "static/posts-images/{$imageName}.{$imgExtention}";
}

function convertStringToDBFormat(?string &$str): ?string
{
  (!isset($str) or $str === null or strlen($str) > MAX_STR_LEN)
    ? throw new Exception("Element DataType Does not fit Database DataType")
    : $str = htmlentities($str, ENT_QUOTES, "UTF-8");
  return $str;
}

function convertFlag(?string &$featured): ?int
{
  switch ($featured) {
    case "1":
      return 1;
    case "0":
      return 0;
    default:
      throw new Exception("Featured Field must be 0 or 1");
  }
}
function convertImageToDBFormat(?string &$imageUrl, ?string $imageName): ?string
{
  if (empty($imageUrl) or empty($imageName)) {
    throw new Exception("Failed To ADD IMAGE");
  } else {
    return $imageUrl = saveImage($imageUrl, $imageName);
  }
}
function convertCategorie(?string &$categorie): string
{
  if (empty($categorie)) {
    return "";
  }
  return $categorie;
}
function preparePostParams(&$postParams): ?array
{
  if ($postParams === null) {
    return null;
  }
  try {
    $postParams['creation_date'] = date_timestamp_get(date_create());

    $postParams['image_url'] = convertImageToDBFormat($postParams['image_url'], $postParams['title']);

    $postParams['author_url'] = convertImageToDBFormat($postParams['author_url'], $postParams['author_name']);

    $postParams['featured'] = convertFlag($postParams['featured']);

    $postParams['categorie'] = convertCategorie($postParams['categorie']);

    foreach ($postParams as $postParam) {
      convertStringToDBFormat($postParam);
    }
  } catch (Exception $e) {
    echo '<br>' . $e . '<br>';
    return null;
  }
  return $postParams;
}

function savePost(mysqli $database, ?array $jsonDecoded): ?int
{
  try {
    (preparePostParams($jsonDecoded))
      ?? throw new Exception("Failed to ADD POST");
  } catch (Exception $e) {
    echo '<br>' . $e . '<br>';
    return null;
  }
  //реализовать универсальную вставку с помощью добавления элементов в массив
  //нам приходит парсированный из Json'a массив со своими ключами
  //мы проходим по каждому ключу и сохраняем его вместе со значением в другой массив
  //отправляем в бд
  $result = $database->query(
    " INSERT INTO `post` 
    (
    `title`, 
    `subtitle`,
    `content`, 
    `author_name`, 
    `author_url`,
    `creation_date`,
    `image_url`,
    `categorie`,
    `featured`
    )
    VALUES (
    '{$jsonDecoded['title']}', 
    '{$jsonDecoded['subtitle']}',
    '{$jsonDecoded['content']}', 
    '{$jsonDecoded['author_name']}', 
    '{$jsonDecoded['author_url']}', 
    '{$jsonDecoded['creation_date']}', 
    '{$jsonDecoded['image_url']}',
    '{$jsonDecoded['categorie']}',
    '{$jsonDecoded['featured']}'
    );"
  );

  if ($result === false) {
    return null;
  }

  return mysqli_insert_id($database);
}