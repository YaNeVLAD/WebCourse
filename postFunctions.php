<?php

const MAX_STR_LEN = 255;
const AUTHOR = 1;

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

function saveImage(?string $imageBase64, ?string $imageName, ?int $author): ?string
{
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);
  $imageName = strtolower($imageName);
  $imageName = str_replace(' ', '-', $imageName);
  if ($author === 1) {
    saveFile("static/posts-creators/{$imageName}.{$imgExtention}", $imageDecoded);
    return "static/posts-creators/{$imageName}.{$imgExtention}";
  }
  saveFile("static/posts-images/{$imageName}.{$imgExtention}", $imageDecoded);
  return "static/posts-images/{$imageName}.{$imgExtention}";

}

function convertStringToDBFormat(?string &$str): ?string
{
  (!isset($str) or $str === null or strlen($str) > MAX_STR_LEN)
    ? throw new Exception("Failed to convert string to DB Format")
    : $str = htmlentities($str, ENT_QUOTES, "UTF-8");
  return $str;
}

function convertFlag(?string &$featured): ?int
{
  switch ($featured) {
    case "1":
      return 1;
    default:
      return 0;
  }
}

function convertImageToDBFormat(?string &$imageUrl, ?string $imageName, ?int $author): ?string
{
  if (empty($imageUrl) or empty($imageName)) {
    throw new Exception("Failed To ADD IMAGE");
  } else {
    return $imageUrl = saveImage($imageUrl, $imageName, $author);
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

    $postParams['title'] = convertStringToDBFormat($postParams['title']);

    $postParams['subtitle'] = convertStringToDBFormat($postParams['subtitle']);

    $postParams['content'] = htmlentities($postParams['content'], ENT_QUOTES, "UTF-8");

    $postParams['author_name'] = convertStringToDBFormat($postParams['author_name']);

    $postParams['author_url'] = convertImageToDBFormat($postParams['author_url'], $postParams['author_name'], AUTHOR) ?? null;

    $postParams['creation_date'] = strtotime($postParams['publish_date']);

    $postParams['image_url'] = convertImageToDBFormat($postParams['image_url'], $postParams['title'], null);

    $postParams['small_image_url'] = convertImageToDBFormat($postParams['small_image_url'], $postParams['title'], null);

    $postParams['categorie'] = convertCategorie($postParams['categorie']);

    $postParams['featured'] = convertFlag($postParams['featured']);

  } catch (Exception $e) {
    echo '<br>' . $e . '<br>';
    return null;
  }
  return $postParams;
}