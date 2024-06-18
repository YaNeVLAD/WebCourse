<?php

const HOST = 'localhost';
const USERNAME = 'admin';
const PASSWORD = '12345';
const DATABASE = 'blog';
const FEATURED = 1;
const RECENT = 0;

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

function getPosts(mysqli $database, int $featured): array
{
  $request = mysqli_query($database, "SELECT * FROM post WHERE featured = {$featured}");
  $posts = [];
  while ($post = mysqli_fetch_assoc($request)) {
    $posts[] = $post;
  }
  return $posts;
}

function findUserByEmail(mysqli $database, string $email): ?array
{
  $result = $database->query(
    "SELECT `user_id`, `password` FROM `user` WHERE `email` = '{$email}';"
  );
  if ($result->num_rows > 0) {
    return $result->fetch_assoc() + ['user_id' => mysqli_insert_id($database)];
  } else {
    return null;
  }
}

function findUserById(mysqli $database, int $id): ?array
{
  $result = $database->query("SELECT `user_id`, `email` FROM `user` WHERE `user_id` = '{$id}';");
  if ($result->num_rows > 0) {
    return $result->fetch_assoc() + ['user_id' => mysqli_insert_id($database)];
  } else {
    return null;
  }
}

function savePost(mysqli $database, ?array $jsonDecoded): ?int
{
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

function saveUser(mysqli $database, $email, $password): ?int
{
  $result = $database->query(
    "INSERT INTO `user` (`email`, `password`)
     VALUES('{$email}', '{$password}');"
  );
  if ($result === false) {
    return null;
  }
  return mysqli_insert_id($database);
}