<a class="featured-post" href="<?= $featured_post['link'] ?>" style="<?= $featured_post['background'] ?>">
  <?php
  if ($featured_post['title'] == 'From Top Down') {
    ?>
    <span class="featured-post__adventure-link">adventure</span>
    <?php
  }
  ?>
  <div class="featured-post-content">
    <h3 class="featured-post-content__title">
      <?= $featured_post['title'] ?>
    </h3>
    <p class="featured-post-content__text">
      <?= $featured_post['text'] ?>
    </p>
      <div class="featured-post-content__author-block">
        <img class="featured-post-content__author-image" src="<?= $featured_post['author-image'] ?>"
          alt="Mat Vogels">
        <span class="featured-post-content__author-name">
          <?= $featured_post['author-name'] ?>
        </span>
        <span class="featured-post-content__creation-date">
        <?php echo date('F d, Y', $featured_post['creation-date']); ?> 
        </span>
    </div>
  </div>
</a>