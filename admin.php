<?php
require_once 'sessionFunctions.php';
if (!authBySession()) {
    header('Location: home');
    die();
} else {
    $conn = createDBConnection();
    $letters = substr(findUserById($conn, $_SESSION['id'])['email'],0,3);
    closeDBConnection($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@400&display=swap" rel="stylesheet">
    <link href="static/styles/styles-admin.css" rel="stylesheet">
    <script type="text/javaScript" defer>
        let temp = '<?= $letters ?>';
    </script>
    <title>Admin Page</title>
</head>

<body>
    <header class="header">
        <div class="header__content">
            <a class="header__logo" href="#"></a>
            <div class="header__menu">
                <div class="header__avatar" id="color-box"><a href="#" id="avatar-letter"
                        class="header__avatar-letter"></a></div>
                <a class="header__logout" href="api/logout"></a>
            </div>
        </div>
    </header>

    <form method="post" enctype="multipart/form-data" action="" id="form">
        <div class="newPost">
            <div class="newPost__titleBlock">
                <h1 class="newPost__title">New Post</h1>
                <span class="newPost__subtitle">Fill out the form bellow and publish your article</span>
            </div>
            <button class="newPost__publish" type="submit" id="submit">Publish</button>
        </div>
        <div class="submitStatus" id="status">
            <div class="submitFail hidden">
                <img src="static/admin-images/submit-fail.svg" class="submitFail__img">
                <span class="submitFail__span">Whoops! Some fields need your attention :o</span>
            </div>
            <div class="submitOk hidden">
                <img src="static/admin-images/submit-ok.svg" class="submitOk__img">
                <span class="submitOk__span">Publish Complete!</span>
            </div>
        </div>
        <div class="mainInfo">
            <div class="form">
                <div class="form__inputs">
                    <h2 class="form__title">Main Information</h2>
                    <div class="form__inputTitle">
                        <label for="title" class="form__titleLabel">Title</label>
                        <input name="title" id="title" type="text" placeholder="New Post" required class="title">
                    </div>

                    <div class="form__inputSubtitle">
                        <label for="subtitle" class="form__subTitleLabel">Short description</label>
                        <input name="subtitle" id="subtitle" type="text" placeholder="Please, enter any description"
                            class="subtitle" required>
                    </div>

                    <div class="form__inputAuthor">
                        <label for="author_name" class="form__authorLabel">Author name</label>
                        <input name="author_name" id="author_name" type="text" required class="author_name">
                    </div>

                    <label for="author_url" class="form__authorUrlLabel">Author Photo</label>
                    <div class="form__inputAuthorPhoto">
                        <img class="photoBlock__uploadImage" src="static/admin-images/user-avatar-preview.svg"
                            id="author_url_preview1">
                        <div class="photoBlock">
                            <div class="loadedFile hidden" id="author_url_new">
                                <label class="loadedFile__new" for="author_url">
                                    <img src="static/admin-images/upload-button.svg" alt="">
                                    <span class="loadedFile__span">Upload New</span>
                                </label>
                                <button class="loadedFile__remove" type="button">
                                    <img src="static/admin-images/remove-image.svg" alt="Remove">
                                    <span class="loadedFile__span">Remove</span>
                                </button>
                            </div>
                            <label for="author_url" class="form__uploadImageLabel">
                                <input type="file" name="author_url" id="author_url" class="photoBlock__photoUpload"
                                    required accept="image/png, image/gif, image/jpeg">
                                <span class="photoBlock__photoSpan" id="author_url_upload">Upload</span>
                            </label>
                        </div>
                    </div>

                    <div class="form__inputPublishDate">
                        <div class="form__inputPublishDate">
                            <label for="publish_date" class="form__publishDate">Publish Date</label>
                            <input name="publish_date" id="publish_date" type="date" value="<?= date('Y-m-d') ?>"
                                class="publish_date" required>
                        </div>
                    </div>

                    <div class="form__inputHeroImageBig">
                        <span for="image_url" class="form__heroImageBigLabel">Hero Image</span>
                        <div class="heroImageBigPreview">
                            <img class="heroImageBig hidden" id="image_url_preview1">
                            <div class="photoBlock">
                                <label for="image_url">
                                    <img class="photoBlock__image" src="static/admin-images/upload-button.svg">
                                    <input type="file" name="image_url" id="image_url" class="photoBlock__photoUpload"
                                        required accept="image/png, image/gif, image/jpeg">
                                    <span class="photoBlock__photoSpan" id="image_url_upload">Upload</span>
                                </label>
                            </div>
                        </div>
                        <div class="loadedFile hidden" id="image_url_new">
                            <label class="loadedFile__new" for="image_url">
                                <img src="static/admin-images/upload-button.svg" alt="">
                                <span class="loadedFile__span">Upload New</span>
                            </label>
                            <button class="loadedFile__remove" type="button">
                                <img src="static/admin-images/remove-image.svg" alt="Remove">
                                <span class="loadedFile__span">Remove</span>
                            </button>
                        </div>
                        <span class="form__imageHint" id="image_url_hint">Size up to 10mb. Format: png, jpeg,
                            gif.</span>
                    </div>

                    <div class="form__inputHeroImageSmall">
                        <span for="image_url" class="form__heroImageBigLabel">Hero Image</span>
                        <div class="heroImageSmallPreview">
                            <img class="heroImageSmall hidden" id="small_image_url_preview1">
                            <div class="photoBlock">
                                <label for="small_image_url">
                                    <img class="photoBlock__image" src="static/admin-images/upload-button.svg">
                                    <input type="file" name="small_image_url" id="small_image_url"
                                        class="photoBlock__photoUpload" required
                                        accept="image/png, image/gif, image/jpeg">
                                    <span class="photoBlock__photoSpan" id="small_image_url_upload">Upload</span>
                                </label>
                            </div>
                        </div>
                        <div class="loadedFile hidden" id="small_image_url_new">
                            <label class="loadedFile__new" for="small_image_url">
                                <img src="static/admin-images/upload-button.svg" alt="">
                                <span class="loadedFile__span">Upload New</span>
                            </label>
                            <button class="loadedFile__remove" type="button">
                                <img src="static/admin-images/remove-image.svg" alt="Remove">
                                <span class="loadedFile__span">Remove</span>
                            </button>
                        </div>
                        <span class="form__imageHint" id="small_image_url_hint">Size up to 5mb. Format: png, jpeg,
                            gif.</span>
                    </div>
                </div>
                <div class="form__previewsBlock">
                    <span class="form__previewBigLabel">Article preview</span>
                    <div class="form__previewBigGradients">
                        <div class="form__previewBig">
                            <div class="form__previewBigInner">
                                <div class="form__previewBigAlignment">
                                </div>
                                <h2 class="form__previewBigTitle" id="title_preview1">New Post</h2>
                                <p class="form__previewBigSubtitle" id="subtitle_preview1">Please, enter any description
                                </p>
                                <img class="form__previewBigImage" id="image_url_preview2">
                            </div>
                        </div>
                        <div class="form__previewBigGradientHorizontal">
                        </div>
                        <div class="form__previewBigGradientVertical">
                        </div>
                    </div>

                    <span class="form__previewSmallLabel">Post card preview</span>
                    <div class="form__previewSmallGradients">
                        <div class="form__previewSmall">
                            <div class="form__previewSmallInner">
                                <img class="form__previewSmallImage" id="small_image_url_preview2">
                                <h2 class="form__previewSmallTitle" id="title_preview2">New Post</h2>
                                <p class="form__previewSmallSubtitle" id="subtitle_preview2">Please, enter any
                                    description</p>
                                <div class="form__previewSmallAuthor">
                                    <img src="/static/admin-images/post-preview-author.png"
                                        class="form__previewAuthorImage" id="author_url_preview2">
                                    <span class="form_previewAuthorName" id="author_name_preview1">Enter author
                                        name</span>
                                    <span class="form_previewPublishDate">4/19/2023</span>
                                </div>
                            </div>
                        </div>
                        <div class="form__previewSmallGradientHorizontal">
                        </div>
                        <div class="form__previewSmallGradientVertical">
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="content">
            <h2 class="content__title">Content</h2>
            <div>
                <label for="content" class="content__hint">Post content</label>
                <span class="content__hint">(plain text)</span>
            </div>
            <textarea type="text" placeholder="Type anything you want ..." id="content" name="content"
                required></textarea>
        </div>
    </form>
    <script src="form.js"></script>
</body>