<?php
session_start();
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB6 - Welcome</title>
</head>

<body>
    <?php if (!empty($_SESSION['username'])): ?>

        <h2>
            Ви увійшли як <?php echo htmlspecialchars($_SESSION['username']); ?>.
        </h2>

        <form action="auth_process.php" method="post">
            <input type="submit" name="auth-action" value="Log out">
        </form>

    <?php else: ?>

        <p>Ви не авторизовані.</p>
        <a href="log_in.php">Перейти до входу</a>

    <?php endif; ?>
</body>

</html>