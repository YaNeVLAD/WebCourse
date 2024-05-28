<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen&family=Roboto&display=swap"
        rel="stylesheet">
    <link href="static/styles/styles-login.css" rel="stylesheet">
    <title>Registration Page</title>
</head>

<body>
    <div class="content">
        <div class="content__title-block">
            <div class="content__logo-block">
                <img class="content__logo_escape" src="static/login-images/logo-escape.svg">
                <img class="content__logo_author" src="static/login-images/logo-author.svg">
            </div>
            <span class="content__description">Sign Up to start creating</span>
        </div>
        <form id="form" class="login-form" enctype="multipart/form-data">
            <h1 class="login-form__title">Sign Up</h1>
            <div class="submitStatus" id="result">
                <div class="submitFail hidden">
                    <img src="static/login-images/submit-fail.svg" class="submitFail__img">
                    <span class="submitFail__span">Your email has been already taken</span>
                </div>
                <div class="submitFail hidden">
                    <img src="static/login-images/submit-fail.svg" class="submitFail__img">
                    <span class="submitFail__span">A-Ah! Check all fields,</span>
                </div>
            </div>
            <div class="login-form__inputs">
                <div class="login-form__input-block">
                    <label for="email" class="login-form__label">Email</label>
                    <input id="email" name="email" class="login-form__input empty" type="email" required>
                </div>
                <div class="login-form__input-block">
                    <label for="password" class="login-form__label">Password</label>
                    <input id="password" name="password" class="login-form__input empty" type="password" minlength="5"
                        required>
                    <icon class="login-form__show-pass hidden-pass" id="togglePassword"></icon>
                </div>
            </div>
            <button id="submit" class="login-form__submit no-click" type="submit">Sign Up</button>
        </form>
    </div>
    <script src="register.js"></script>
</body>

</html>