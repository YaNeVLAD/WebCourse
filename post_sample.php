<div class="post">
  <img class="post__image" src="<?= $recent_post['image'] ?>" alt="<?= $recent_post['title'] ?>">
  <div class="post-content">
    <h3 class="post-content__title">
      <?= $recent_post['title'] ?>
    </h3>
    <p class="post-content__text">
      <?= $recent_post['text'] ?>
    </p>
  </div>
  <div class="post__author-block">
    <img class="post__author-image" src="<?= $recent_post['author-image'] ?>" alt="<?= $recent_post['author-name'] ?>">
    <span class="post__author-name">
      <?= $recent_post['author-name'] ?>
    </span>
    <span class="post__creation-date">
    <?php echo date('m/d/Y', $featured_post['creation-date']); ?> 
    </span>
  </div>
</div>