<?php
<<<<<<< HEAD
require_once 'postFunctions.php';
require_once 'databaseFunctions.php';
=======
require_once 'database-connections.php';
>>>>>>> 9eddfbd732b3616be3f0cccef27ee367cd5ba148
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<<<<<<< HEAD
  <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen&family=Roboto&display=swap" rel="stylesheet">
=======
  <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@400&display=swap" rel="stylesheet">
>>>>>>> 9eddfbd732b3616be3f0cccef27ee367cd5ba148
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
          <li class="header__item">
            <a class="header__link" href="login">login</a>
          </li>
        </ul>
        <div class="header__burger-menu">
          <input id="header__burger-toggle" type="checkbox" />
          <label class="header__burger-button" for="header__burger-toggle">
            <span></span>
          </label>
            
          <ul class="header__burger-box">
            <li><a class="menu__item" href="#">Home</a></li>
            <li><a class="menu__item" href="#">Categories</a></li>
            <li><a class="menu__item" href="#">About</a></li>
            <li><a class="menu__item" href="#">Contact</a></li>
            <li><a class="menu__item" href="login">Login</a></li>
          </ul>
        </div>
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
<<<<<<< HEAD
        $request = mysqli_query($database, "SELECT * FROM post WHERE featured = 1");
=======
        $request = mysqli_query($database, "SELECT  *FROM post WHERE featured = 1");
>>>>>>> 9eddfbd732b3616be3f0cccef27ee367cd5ba148
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
<<<<<<< HEAD
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
=======
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
>>>>>>> 9eddfbd732b3616be3f0cccef27ee367cd5ba148
    </div>
  </footer>
</body>

</html>