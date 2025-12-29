<?php session_start(); ?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>LAB3 - Task 2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php if (isset($_SESSION['user_login'])): ?>

        <div class="auth-box">
            <h3>
                Ви успішно увійшли під псевдонімом
                <span class="username-badge"><?php echo $_SESSION['user_login']; ?></span>!
            </h3>

            <form action="auth.php" method="post">
                <div class="logout-container">
                    <p>Бажаєте вийти? </p>
                    <input type="submit" name="logout" value="Вийти" class="btn btn-logout">
                </div>
            </form>
        </div>

    <?php else: ?>

        <div class="auth-box">
            <?php if (isset($_GET['error']))
                echo "<p style='color:red'>Заповніть всі поля!</p>"; ?>

            <form action="auth.php" method="post">
                <label>
                    Логін: <input type="text" name="login">
                </label>
                <br><br>
                <label>
                    Пароль: <input type="password" name="password">
                </label>
                <br><br>
                <input type="submit" value="Увійти" class="btn">
            </form>
        </div>

    <?php endif; ?>

</body>

</html>