<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB6 - Sign in</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="auth-form-wrap">
        <form action="auth_process.php" method="post">

            <div class="header-wrap signin-header">
                <h3>Форма реєстрації</h3>
            </div>


            <div class="auth-input-wrap username-input">

                <?php if (($_GET['empty-field'] ?? '') !== 'username'): ?>

                    <label>Ім'я користувача</label><br>

                <?php else: ?>

                    <label class="empty-field">Ім'я користувача*</label><br>

                <?php endif; ?>

                <input type="text" name="username" id="username-field">
            </div>


            <div class="auth-input-wrap email-input">

                <?php if (($_GET['empty-field'] ?? '') !== 'email'): ?>

                    <label>Електронна пошта</label><br>

                <?php else: ?>

                    <label class="empty-field">Електронна пошта*</label><br>

                <?php endif; ?>
                
                <input type="text" name="email" id="email-field">
            </div>


            <div class="auth-input-wrap password-input">
                <?php if (($_GET['empty-field'] ?? '') !== 'password'): ?>

                    <label>Пароль</label><br>

                <?php else: ?>

                    <label class="empty-field">Пароль*</label><br>

                <?php endif; ?>
                <input type="password" name="password" id="password-field">
            </div>

            
            <div class="submit-btn btn">
                <input type="submit" name="auth-action" value="Sign in">

                <a href="log_in.php">Log in</a>
            </div>

        </form>

        <?php if (isset($_GET['error'])): ?>

            <p class="error-msg">
                <?php
                    if ($_GET['error'] == 'email_incorrect' )
                        echo "Неправильний запис пошти!";
                    elseif ($_GET['error'] == 'too_short_password')
                        echo "Пароль має бути більше 8 символів у довжину.";
                    elseif ($_GET['error'] == 'registration_failed')
                        echo "Помилка реєстрації.";
                    elseif ($_GET['error'] == 'user_exist')
                        echo "Такий користувач вже існує!";
                ?>
            </p>

        <?php endif; ?>

    </div>
</body>

</html>

<?php include "back_home.php" ?>
