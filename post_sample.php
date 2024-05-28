<a class="post" href='/post?id=<?= $recent_post['id'] ?>'>
<<<<<<< HEAD
  <div class="post__image" style="background-image: url(<?= $recent_post['image_url'] ?>);">
  </div>
=======
  <img class="post__image" src="<?= $recent_post['image_url'] ?>" alt="<?= $recent_post['title'] ?>">
>>>>>>> 9eddfbd732b3616be3f0cccef27ee367cd5ba148
  <div class="post__content">
    <h3 class="post__title">
      <?= $recent_post['title'] ?>
    </h3>
    <p class="post__text">
      <?= $recent_post['subtitle'] ?>
    </p>
  </div>
  <div class="post__author-block">
    <img class="post__author-image" src="<?= $recent_post['author_url'] ?>" alt="<?= $recent_post['author_name'] ?>">
    <span class="post__author-name">
      <?= $recent_post['author_name'] ?>
    </span>
    <span class="post__creation-date">
      <?= date('m/d/Y', $recent_post['creation_date']); ?>
    </span>
  </div>
</a>