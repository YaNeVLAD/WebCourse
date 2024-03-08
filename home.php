<?php
$posts = [
  [
    'post__image' => 'styles/images/posts-images/still-standing-tall.png',
    'post-content__title' => 'Still Standing Tall',
    'post-content__text' => 'Life begins at the end of your comfort zone.',
    'post-creator__image' => 'styles/images/posts-creators/william-wong-creator.png',
    'post-creator__name' => 'William Wong',
    'post-creator__creation-date' => '9/25/2015',
  ],
  [
    'post__image' => 'styles/images/posts-images/sunny-side-up.png',
    'post-content__title' => 'Sunny Side Up',
    'post-content__text' => 'No place is ever as bad as they tell you it`s going to be.',
    'post-creator__image' => 'styles/images/posts-creators/mat-vogels-creator.png',
    'post-creator__name' => 'Mat Vogels',
    'post-creator__creation-date' => '9/25/2015',
  ],
  [
    'post__image' => 'styles/images/posts-images/water-falls.png',
    'post-content__title' => 'Water Falls',
    'post-content__text' => 'We travel not to escape life, but for life not to escape us.',
    'post-creator__image' => 'styles/images/posts-creators/mat-vogels-creator.png',
    'post-creator__name' => 'Mat Vogels',
    'post-creator__creation-date' => '9/25/2015',
  ],
  [
    'post__image' => 'styles/images/posts-images/throught-the-mist.png',
    'post-content__title' => 'Throught The Mist',
    'post-content__text' => 'Travel makes you see what a tiny place you occupy in the world.',
    'post-creator__image' => 'styles/images/posts-creators/william-wong-creator.png',
    'post-creator__name' => 'William Wong',
    'post-creator__creation-date' => '9/25/2015',
  ],
  [
    'post__image' => 'styles/images/posts-images/awaken-early.png',
    'post-content__title' => 'Awaken Early',
    'post-content__text' => 'Not all those who wander are lost.',
    'post-creator__image' => 'styles/images/posts-creators/mat-vogels-creator.png',
    'post-creator__name' => 'Mat Vogels',
    'post-creator__creation-date' => '9/25/2015',
  ],
  [
    'post__image' => 'styles/images/posts-images/try-it-always.png',
    'post-content__title' => 'Try it Always',
    'post-content__text' => 'The world is a book, and those who do not travel read only one page.',
    'post-creator__image' => 'styles/images/posts-creators/mat-vogels-creator.png',
    'post-creator__name' => 'Mat Vogels',
    'post-creator__creation-date' => '9/25/2015',
  ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles/styles-index.css" rel="stylesheet">
  <!--preconnect позволяет заранее отправить запрос на сервер для загрузки шрифтов, 
      таким образом их подгрузка на странице происходит быстрее.
      crossorigin позволяет выполнить загрузку шрифтов со второго сайта, если по
      каким-то причинам первый не сработал.
   -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@400&display=swap" rel="stylesheet">
  <title>Home Page</title>
</head>

<body>
  <div class="banner">
    <header class="header container">
      <img src="styles/images/EscapeFoot.svg" class="header__logo" alt="No Header Logo">
      <nav class="navigation">
        <ul class="navigation__list">
          <li class="navigation__item">
            <a class="navigation__link" href="#">home</a>
          </li>
          <li class="navigation__item">
            <a class="navigation__link" href="#">categories</a>
          </li>
          <li class="navigation__item">
            <a class="navigation__link" href="#">about</a>
          </li>
          <li class="navigation__item">
            <a class="navigation__link" href="#">contact</a>
          </li>
        </ul>
      </nav>
    </header>
    <div class="banner-title">
      <h1 class="banner-title__text">Let's do it together.</h1>
      <p class="banner-title__undertext title-undertext-style">
        We travel the world in search of stories. Come along for the ride.</p>
      <a class="banner-title__latest" href="#">View Latest Posts</a>
    </div>
  </div>
  <div class="menu container">
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
      <h2 class="featured__title posts-tiltes-style">Featured Posts</h2>
      <div class="featured-posts-container">
        <a class="featured-post the-road-ahead" href="post">
          <div class="featured-post-content">
            <h3 class="featured-post-content__title">
              the road ahead</h3>
            <p class="featured-post-content__text">
              The road ahead might be paved - it might not be.</p>
            <div class="featured-post-creator">
              <img class="featured-post-creator__image" src="styles/images/posts-creators/mat-vogels-creator.png"
                alt="Mat Vogels">
              <span class="featured-post-creator__name featured-creator-font">Mat Vogels</span>
              <span class="featured-post-creator__creation-date featured-creator-font">September 25, 2015</span>
            </div>
          </div>
        </a>
        <div class="featured-post from-top-down">
          <a class="featured-post__adventure-link" href="#">adventure</a>
          <div class="featured-post-content">
            <h3 class="featured-post-content__title">from top down</h3>
            <p class="featured-post-content__text">
              Once a year, go someplace you`ve never been before.</p>
            <div class="featured-post-creator">
              <img class="featured-post-creator__image" src="styles/images/posts-creators/william-wong-creator.png"
                alt="William Wong">
              <span class="featured-post-creator__name featured-creator-font">William Wong</span>
              <span class="featured-post-creator__creation-date featured-creator-font">September 25, 2015</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="most-recent-posts">
      <h2 class="most-recent-posts__title posts-tiltes-style">Most Recent</h2>
      <div class="recent-posts-container">
        <?php
        foreach ($posts as $post) {
          include 'post_preview.php';
        }
        ?>
    </div>
  </main>

  <footer class="footer footer-background">
    <div class="footer-container">
      <img src="styles/images/EscapeFoot.svg" class="footer__logo" alt="No Footer Logo">
      <nav class="navigation">
        <ul class="navigation__list">
          <li class="navigation__item footer-navigation-item">
            <a class="navigation__link footer-link" href="#">home</a>
          </li>
          <li class="navigation__item footer-navigation-item">
            <a class="navigation__link footer-link" href="#">categories</a>
          </li>
          <li class="navigation__item footer-navigation-item">
            <a class="navigation__link footer-link" href="#">about</a>
          </li>
          <li class="navigation__item footer-navigation-item">
            <a class="navigation__link footer-link" href="#">contact</a>
          </li>
        </ul>
      </nav>
    </div>
  </footer>
</body>

</html>