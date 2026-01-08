<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB6 - Log in</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="auth-form-wrap">
        <form action="auth_process.php" method="post">
            <div class="header-wrap login-header">
                <h3>Форма входу</h3>
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
                <input type="submit" name="auth-action" value="Log in">

                <a href="sign_in.php">Sign in</a>
            </div>
        </form>

        <?php if (isset($_GET['error'])): ?>

            <p class="error-msg">
                <?php
                    if ($_GET['error'] == 'email_incorrect')
                        echo "Неправильний запис пошти!";
                    elseif ($_GET['error'] == 'incorrect_password')
                        echo "Невірний пароль!";
                    elseif ($_GET['error'] == 'user_not_found')
                        echo "Такого користувача не існує!";
                ?>
            </p>

        <?php endif; ?>
    </div>
</body>

</html>

<?php include "back_home.php" ?>