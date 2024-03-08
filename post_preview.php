<div class="post">
          <img class="post__image" src="<?= $post['post__image'] ?>" alt="<?= $post['post-content__title'] ?>">
          <div class="post-content">
            <h3 class="post-content__title"><?= $post['post-content__title'] ?></h3>
            <p class="post-content__text"><?= $post['post-content__text'] ?></p>
          </div>
          <div class="post-creator">
            <img class="post-creator__image" src="<?= $post['post-creator__image'] ?>"
              alt="<?= $post['post-creator__name'] ?>">
            <span class="post-creator__name creator-font"><?= $post['post-creator__name'] ?></span>
            <span class="post-creator__creation-date creator-font"><?= $post['post-creator__creation-date'] ?></span>
          </div>
        </div>