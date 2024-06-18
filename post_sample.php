<a class="post" href='/post?id=<?= $post['id'] ?>'>
  <div class="post__image" style="background-image: url(<?= $post['image_url'] ?>);">
  </div>
  <div class="post__content">
    <h3 class="post__title">
      <?= $post['title'] ?>
    </h3>
    <p class="post__text">
      <?= $post['subtitle'] ?>
    </p>
  </div>
  <div class="post__author-block">
    <img class="post__author-image" src="<?= $post['author_url'] ?>" alt="<?= $post['author_name'] ?>">
    <span class="post__author-name">
      <?= $post['author_name'] ?>
    </span>
    <span class="post__creation-date">
      <?= date('m/d/Y', $post['creation_date']); ?>
    </span>
  </div>
</a>