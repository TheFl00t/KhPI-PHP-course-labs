<?php
session_start();

if (isset($_POST['login'])) {
    $_SESSION['auth'] = true;
    $_SESSION['last_activity'] = time();
    header("Location: temporary_page.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>LAB3 - Task 5</title>
</head>

<body>
    <div style="display: flex; flex-direction: column; margin: 0 auto; margin-top: 50px; width: fit-content; padding: 10px; border-radius: 8px; box-shadow: 0 0 4px 0 #000000aa;">
        <?php if (isset($_GET['timeout'])): ?>
            <p style="color: red;">Час сесії вийшов!</p>
        <?php endif; ?>
    
        <form action="" method="post">
            <input type="submit" name="login" value="Увійти (Почати сесію)">
        </form>
    </div>
</body>

</html>