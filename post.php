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
    <img class="header__logo" src="static/logo-head.svg" alt="Header Logo">
    <nav class="header__navigation">
      <ul class="header__list">
        <li class="header__item">
          <a class="header__link" href="home">home</a>
        </li>
        <li class="header__item">
          <a class="header__link" href="#">categories</a>
        </li>
        <li class="header__item">
          <a class="header__link" href="#">about</a>
        </li>
        <li class="header__item">
          <a class="header__link" href="#">contact</a>
        </li>
      </ul>
      <div class="header__burger-menu">
        <input class="header__burger-toggle" id="header__burger-toggle" type="checkbox" />
        <label class="header__burger-button" for="header__burger-toggle">
          <span></span>
        </label>
        <ul class="header__burger-box">
          <li><a class="header__burger__item" href="home">Home</a></li>
          <li><a class="header__burger__item" href="#">Categories</a></li>
          <li><a class="header__burger__item" href="#">About</a></li>
          <li><a class="header__burger__item" href="#">Contact</a></li>
        </ul>
      </div>
    </nav>
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

    <img class="banner" src="<?= $post['image_url'] ?>" style="background-image: url('<?= $post['image_url'] ?>');">
    <div class="text">
      <div class="text__block">
        <p class="text__content">
          <?= $post['content'] ?>
        </p>
      </div>
    </div>
  </main>

  <footer class="footer_footer-background">
    <div class="footer__stay-in-touch">
      <h2 class="footer__form-title">Stay In Touch</h2>
      <form class="footer__form">
        <input class="footer__email-input" name="touch-email" placeholder="Enter your email address" type="email">
        <button class="footer__submit-button">Submit</button>
      </form>
    </div>
    <div class="footer__block">
      <div class="footer__content">
        <img class="footer__logo" src="static/logo-foot.svg" alt="Footer Logo">
        <nav class="footer__navigation">
          <ul class="footer__list">
            <li class="footer__item">
              <a class="footer__link" href="home">home</a>
            </li>
            <li class="footer__item">
              <a class="footer__link" href="#">categories</a>
            </li>
            <li class="footer__item">
              <a class="footer__link" href="#">about</a>
            </li>
            <li class="footer__item">
              <a class="footer__link" href="#">contact</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </footer>
</body>

</html>