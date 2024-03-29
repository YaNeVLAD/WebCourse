<a class="featured-post" href='/post?id=<?= $featured_post['id'] ?>'
  style="background-image: url(<?= $featured_post['image_url'] ?>);">
  <?php
  if ($featured_post['categorie']) {
    ?>
    <span class="featured-post__button-categorie">
      <?= $featured_post['categorie'] ?>
    </span>
    <?php
  }
  ?>
  <div class="featured-post__content">
    <h3 class="featured-post__title">
      <?= $featured_post['title'] ?>
    </h3>
    <p class="featured-post__text">
      <?= $featured_post['subtitle'] ?>
    </p>
    <div class="featured-post__author-block">
      <img class="featured-post__author-image" src="<?= $featured_post['author_url'] ?>" alt="Mat Vogels">
      <span class="featured-post__author-name">
        <?= $featured_post['author_name'] ?>
      </span>
      <span class="featured-post__creation-date">
        <?= date('F d, Y', $featured_post['creation_date']); ?>
      </span>
    </div>
  </div>
</a>