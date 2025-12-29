<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>LAB3 - Task 1</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php if (isset($_COOKIE['user_name'])): ?>

        <div class="form-wrap success-form-wrap">
            <h2>Привіт, <?php echo htmlspecialchars($_COOKIE['user_name']); ?>!</h2>

            <form action="cookie_handler.php" method="post">
                <input type="submit" name="delete_cookie" value="Видалити cookie і вийти">
            </form>
        </div>

    <?php else: ?>

        <div class="form-wrap">
            <h2>Введіть ваше ім'я:</h2>

            <form action="cookie_handler.php" method="post">
                <label for="username">
                    Ім'я: <input type="text" name="username" required>
                </label>
                <input type="submit" value="Запам'ятати мене">
            </form>
        </div>

    <?php endif; ?>

</body>

</html>