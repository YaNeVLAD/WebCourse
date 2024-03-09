<!-- Дата: timestamp, конверуется в samplах с помощью функции с редактируемым форматом-->
<?php
$featured_posts = [
  [
    'link' => 'post',
    'background' => 'background-image: url(static/posts-images/the-road-ahead.png); background-position: center; background-size: cover;',
    'title' => 'The Road Ahead',
    'text' => 'The road ahead might be paved - it might not be.',
    'author-image' => 'static/posts-creators/mat-vogels-creator.png',
    'author-name' => 'Mat Vogels',
    'creation-date' => '1443171600',
  ],
  [
    'link' => '#',
    'background' => 'background-image: url(static/posts-images/from-top-down.png); background-position: center; background-size: cover;',
    'title' => 'From Top Down',
    'text' => 'Once a year, go someplace you`ve never been before.',
    'author-image' => 'static/posts-creators/william-wong-creator.png',
    'author-name' => 'William Wong',
    'creation-date' => '1443171600',
  ],
];
$recent_posts = [
  [
    'image' => 'static/posts-images/still-standing-tall.png',
    'title' => 'Still Standing Tall',
    'text' => 'Life begins at the end of your comfort zone.',
    'author-image' => 'static/posts-creators/william-wong-creator.png',
    'author-name' => 'William Wong',
    'creation-date' => '1443171600',
  ],
  [
    'image' => 'static/posts-images/sunny-side-up.png',
    'title' => 'Sunny Side Up',
    'text' => 'No place is ever as bad as they tell you it`s going to be.',
    'author-image' => 'static/posts-creators/mat-vogels-creator.png',
    'author-name' => 'Mat Vogels',
    'creation-date' => '1443171600',
  ],
  [
    'image' => 'static/posts-images/water-falls.png',
    'title' => 'Water Falls',
    'text' => 'We travel not to escape life, but for life not to escape us.',
    'author-image' => 'static/posts-creators/mat-vogels-creator.png',
    'author-name' => 'Mat Vogels',
    'creation-date' => '1443171600',
  ],
  [
    'image' => 'static/posts-images/throught-the-mist.png',
    'title' => 'Throught The Mist',
    'text' => 'Travel makes you see what a tiny place you occupy in the world.',
    'author-image' => 'static/posts-creators/william-wong-creator.png',
    'author-name' => 'William Wong',
    'creation-date' => '1443171600',
  ],
  [
    'image' => 'static/posts-images/awaken-early.png',
    'title' => 'Awaken Early',
    'text' => 'Not all those who wander are lost.',
    'author-image' => 'static/posts-creators/mat-vogels-creator.png',
    'author-name' => 'Mat Vogels',
    'creation-date' => '1443171600',
  ],
  [
    'image' => 'static/posts-images/try-it-always.png',
    'title' => 'Try it Always',
    'text' => 'The world is a book, and those who do not travel read only one page.',
    'author-image' => 'static/posts-creators/mat-vogels-creator.png',
    'author-name' => 'Mat Vogels',
    'creation-date' => '1443171600',
  ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="static/styles/styles-index.css" rel="stylesheet">
  <!--preconnect позволяет заранее отправить запрос на сервер для загрузки шрифтов, 
      таким образом их подгрузка на странице происходит быстрее.
      crossorigin позволяет выполнить загрузку шрифтов со второго сайта, если по
      каким-то причинам первый не доступен.
   -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@400&display=swap" rel="stylesheet">
  <title>Home Page</title>
</head>

<body>
  <div class="banner">
    <header class="header-container">
      <img src="static/LogoFoot.svg" class="header__logo" alt="No Header Logo">
      <nav class="header-navigation">
        <ul class="header-navigation__list">
          <li class="header-navigation__item">
            <a class="header-navigation__link" href="#">home</a>
          </li>
          <li class="header-navigation__item">
            <a class="header-navigation__link" href="#">categories</a>
          </li>
          <li class="header-navigation__item">
            <a class="header-navigation__link" href="#">about</a>
          </li>
          <li class="header-navigation__item">
            <a class="header-navigation__link" href="#">contact</a>
          </li>
        </ul>
      </nav>
    </header>
    <div class="banner__title">
      <h1 class="banner__text">Let's do it together.</h1>
      <p class="banner__undertext">
        We travel the world in search of stories. Come along for the ride.</p>
      <span class="banner__latest">View Latest Posts</span>
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
      <div class="featured-posts-container">
        <?php
        foreach ($featured_posts as $featured_post) {
          include 'featured-post_sample.php';
        }
        ?>
      </div>
    </div>
    <div class="most-recent-posts">
      <h2 class="most-recent-posts__title">Most Recent</h2>
      <div class="recent-posts-container">
        <?php
        foreach ($recent_posts as $recent_post) {
          include 'post_sample.php';
        }
        ?>
      </div>
  </main>

  <footer class="footer_footer-background">
    <div class="footer-container">
      <img src="static/LogoFoot.svg" class="footer__logo" alt="No Footer Logo">
      <nav class="footer-navigation">
        <ul class="footer-navigation__list">
          <li class="footer-navigation__item">
            <a class="footer-navigation__link" href="#">home</a>
          </li>
          <li class="footer-navigation__item">
            <a class="footer-navigation__link" href="#">categories</a>
          </li>
          <li class="footer-navigation__item">
            <a class="footer-navigation__link" href="#">about</a>
          </li>
          <li class="footer-navigation__item">
            <a class="footer-navigation__link" href="#">contact</a>
          </li>
        </ul>
      </nav>
    </div>
  </footer>
</body>

</html>