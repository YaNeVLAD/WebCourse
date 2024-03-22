<a class="featured-post" href='/post?id=<?= $featured_post['id'] ?>'
  style="background-image: url(<?= $featured_post['image'] ?>);">
  <?php
  if ($featured_post['button-categorie']) {
    ?>
    <span class="featured-post__button">
      <?= $featured_post['button-categorie'] ?>
    </span>
    <?php
  }
  ?>
  <div class="featured-post__content">
    <h3 class="featured-post__title">
      <?= $featured_post['title'] ?>
    </h3>
    <p class="featured-post__text">
      <?= $featured_post['text'] ?>
    </p>
    <div class="featured-post__author-block">
      <img class="featured-post__author-image" src="<?= $featured_post['author-image'] ?>" alt="Mat Vogels">
      <span class="featured-post__author-name">
        <?= $featured_post['author-name'] ?>
      </span>
      <span class="featured-post__creation-date">
        <?php echo date('F d, Y', $featured_post['creation-date']); ?>
      </span>
    </div>
  </div>
</a>