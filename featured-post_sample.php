<a class="featured-post" href='/post?id=<?= $post['id'] ?>'
  style="background-image: url(<?= $post['image_url'] ?>);">
  <?php
  if ($post['categorie']) {
    ?>
    <span class="featured-post__button-categorie">
      <?= $post['categorie'] ?>
    </span>
    <?php
  }
  ?>
  <div class="featured-post__content">
    <h3 class="featured-post__title">
      <?= $post['title'] ?>
    </h3>
    <p class="featured-post__text">
      <?= $post['subtitle'] ?>
    </p>
    <div class="featured-post__author-block">
      <img class="featured-post__author-image" src="<?= $post['author_url'] ?>" alt="Mat Vogels">
      <span class="featured-post__author-name">
        <?= $post['author_name'] ?>
      </span>
      <span class="featured-post__creation-date">
        <?= date('F d, Y', $post['creation_date']); ?>
      </span>
    </div>
  </div>
</a>