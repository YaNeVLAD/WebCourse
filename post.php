<?php
require_once 'postFunctions.php';
require_once 'databaseFunctions.php';

if (array_key_exists('id', $_GET)) {
  $postId = (int) $_GET['id'];
} else {
  die('Не передан GET параметр id.');
}
$database = createDBConnection();

$result = mysqli_query($database, "SELECT * FROM post WHERE id = $postId");
$post = mysqli_fetch_assoc($result);
if ($post == null) {
  die('Значение GET параметра id передано неверно.');
}
closeDBConnection($database);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@400&display=swap" rel="stylesheet">
  <link href="static/styles/styles-post.css" rel="stylesheet">
  <title>
    <?= $post['title'] ?>
  </title>
</head>

<body>
  <header class="header">
    <div class="header-content">
      <img class="header-content__logo" src="static/logo-head.svg" alt="<?= $post['title'] ?>">
      <nav class="navigation">
        <a class="navigation__link home" href="home"> HOME </a>
        <a class="navigation__link about"> ABOUT </a>
        <a class="navigation__link contact"> CONTACT </a>
        <a class="navigation__link categories"> CATEGORIES </a>
      </nav>
    </div>
  </header>

  <main>
    <div class="title-block">
      <h1 class="title-block__title">
        <?= $post['title'] ?>
      </h1>
      <p class="title-block__undertitle">
        <?= $post['subtitle'] ?>
      </p>
    </div>

    <img class="banner" src="<?= $post['image_url'] ?>">
    <div class="text">
      <div class="text__content">
        <p>
          <?= $post['content'] ?>
        </p>
      </div>
    </div>
  </main>

  <footer class="footer">
    <div class="footer-content">
      <img class="footer-content__footer-logo" src="static/logo-foot.svg" alt="<?= $post['title'] ?>">
      <nav class="footer-navigation">
        <a class="footer-links__link footer-home" href="home"> HOME </a>
        <a class="footer-links__link footer-about"> ABOUT </a>
        <a class="footer-links__link footer-contact"> CONTACT </a>
        <a class="footer-links__link footer-categories"> CATEGORIES </a>
      </nav>
    </div>
  </footer>
</body>

</html>