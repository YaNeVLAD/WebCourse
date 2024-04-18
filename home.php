<?php
require_once 'databaseFunctions.php';
var_dump($_POST);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@400&display=swap" rel="stylesheet">
  <link href="static/styles/styles-index.css" rel="stylesheet">
  <title>Home Page</title>
</head>

<body>
  <div class="banner">
    <header class="header">
      <img class="header__logo" src="static/logo-foot.svg" alt="Header Logo">
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
      </nav>
    </header>
    <div class="banner__title">
      <h1 class="banner__text">Let's do it together.</h1>
      <p class="banner__undertext">
        We travel the world in search of stories. Come along for the ride.</p>
      <button class="banner__title-button">View Latest Posts</button>
    </div>
  </div>
  <div class="menu">
    <ul class="menu__list">
      <li class="menu__item">
        <a class="menu__link" href="#">nature</a>
      </li>
      <li class="menu__item">
        <a class="menu__link" href="#">photography</a>
      </li>
      <li class="menu__item">
        <a class="menu__link" href="#">relaxation</a>
      </li>
      <li class="menu__item">
        <a class="menu__link" href="#">vacation</a>
      </li>
      <li class="menu__item">
        <a class="menu__link" href="#">travel</a>
      </li>
      <li class="menu__item">
        <a class="menu__link" href="#">adventure</a>
      </li>
    </ul>
  </div>

  <main class="posts">
    <div class="featured">
      <h2 class="featured__title">Featured Posts</h2>
      <div class="featured__posts-container">
        <?php
        $database = createDBConnection();
        $request = mysqli_query($database, "SELECT * FROM post WHERE featured = 1");
        while ($featured_post = mysqli_fetch_assoc($request)) {
          include 'featured-post_sample.php';
        }
        closeDBConnection($database);
        ?>
      </div>
    </div>
    <div class="most-recent">
      <h2 class="most-recent__title">Most Recent</h2>
      <div class="most-recent__posts-container">
        <?php
        $database = createDBConnection();
        $request = mysqli_query($database, "SELECT * FROM post WHERE featured = 0");
        while ($recent_post = mysqli_fetch_assoc($request)) {
          include 'post_sample.php';
        }
        closeDBConnection($database);
        ?>
      </div>
  </main>

  <footer class="footer_footer-background">
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
  </footer>
</body>

</html>