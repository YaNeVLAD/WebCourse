<!-- новое поле для проверки adventure в массиве -->
<?php
$featured_posts = [
  [
    'id' => 1,
    'button-categorie' => '',
    'image' => 'https://localhost/static/posts-images/the-road-ahead.png',
    'title' => 'The Road Ahead',
    'text' => 'The road ahead might be paved - it might not be.',
    'author-image' => 'static/posts-creators/mat-vogels-creator.png',
    'author-name' => 'Mat Vogels',
    'creation-date' => 1443171600,
  ],
  [
    'id' => 2,
    'button-categorie' => 'adventure',
    'image' => 'https://localhost/static/posts-images/from-top-down.png',
    'title' => 'From Top Down',
    'text' => 'Once a year, go someplace you`ve never been before.',
    'author-image' => 'static/posts-creators/william-wong-creator.png',
    'author-name' => 'William Wong',
    'creation-date' => 1443171600,
  ],
];
$recent_posts = [
  [
    'id' => 3,
    'image' => 'https://localhost/static/posts-images/still-standing-tall.png',
    'title' => 'Still Standing Tall',
    'text' => 'Life begins at the end of your comfort zone.',
    'author-image' => 'static/posts-creators/william-wong-creator.png',
    'author-name' => 'William Wong',
    'creation-date' => 1443171600,
  ],
  [
    'id' => 4,
    'image' => 'https://localhost/static/posts-images/sunny-side-up.png',
    'title' => 'Sunny Side Up',
    'text' => 'No place is ever as bad as they tell you it`s going to be.',
    'author-image' => 'static/posts-creators/mat-vogels-creator.png',
    'author-name' => 'Mat Vogels',
    'creation-date' => 1443171600,
  ],
  [
    'id' => 5,
    'image' => 'https://localhost/static/posts-images/water-falls.png',
    'title' => 'Water Falls',
    'text' => 'We travel not to escape life, but for life not to escape us.',
    'author-image' => 'static/posts-creators/mat-vogels-creator.png',
    'author-name' => 'Mat Vogels',
    'creation-date' => 1443171600,
  ],
  [
    'id' => 6,
    'image' => 'https://localhost/static/posts-images/throught-the-mist.png',
    'title' => 'Throught The Mist',
    'text' => 'Travel makes you see what a tiny place you occupy in the world.',
    'author-image' => 'static/posts-creators/william-wong-creator.png',
    'author-name' => 'William Wong',
    'creation-date' => 1443171600,
  ],
  [
    'id' => 7,
    'image' => 'https://localhost/static/posts-images/awaken-early.png',
    'title' => 'Awaken Early',
    'text' => 'Not all those who wander are lost.',
    'author-image' => 'static/posts-creators/mat-vogels-creator.png',
    'author-name' => 'Mat Vogels',
    'creation-date' => 1443171600,
  ],
  [
    'id' => 8,
    'image' => 'https://localhost/static/posts-images/try-it-always.png',
    'title' => 'Try it Always',
    'text' => 'The world is a book, and those who do not travel read only one page.',
    'author-image' => 'static/posts-creators/mat-vogels-creator.png',
    'author-name' => 'Mat Vogels',
    'creation-date' => 1443171600,
  ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--preconnect позволяет заранее отправить запрос на сервер для загрузки шрифтов, 
      таким образом их подгрузка на странице происходит быстрее.
      crossorigin позволяет выполнить загрузку шрифтов со второго сайта, если по
      каким-то причинам первый не доступен.
   -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@400&display=swap" rel="stylesheet">
  <link href="https://localhost/static/styles/styles-index.css" rel="stylesheet">
  <title>Home Page</title>
</head>

<body>
  <div class="banner">
    <header class="header">
      <img class="header__logo" src="https://localhost/static/logo-foot.svg" alt="Header Logo">
      <nav class="header__navigation">
        <ul class="header__list">
          <li class="header__item">
            <a class="header__link" href="https://localhost/home">home</a>
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
        foreach ($featured_posts as $featured_post) {
          include 'featured-post_sample.php';
        }
        ?>
      </div>
    </div>
    <div class="most-recent">
      <h2 class="most-recent__title">Most Recent</h2>
      <div class="most-recent__posts-container">
        <?php
        foreach ($recent_posts as $recent_post) {
          include 'post_sample.php';
        }
        ?>
      </div>
  </main>

  <footer class="footer_footer-background">
    <div class="footer__content">
      <img class="footer__logo" src="https://localhost/static/logo-foot.svg" alt="Footer Logo">
      <nav class="footer__navigation">
        <ul class="footer__list">
          <li class="footer__item">
            <a class="footer__link" href="https://localhost/home">home</a>
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