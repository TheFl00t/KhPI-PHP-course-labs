<?php
session_start();

$inactiveTime = 300;

if (!isset($_SESSION['auth'])) {
    header("Location: index.php");
    exit;
}

if (isset($_SESSION['last_activity'])) {
    $session_lifetime = time() - $_SESSION['last_activity'];

    if ($session_lifetime >= $inactiveTime) {
        session_unset();
        session_destroy();

        header("Location: index.php?timeout=1");
        exit;
    }
}

$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Temporary Page</title>
</head>

<body>
    <div style="display: flex; flex-direction: column; margin: 0 auto; margin-top: 50px; width: fit-content; padding: 10px; border-radius: 8px; box-shadow: 0 0 4px 0 #000000aa;">
        <p>
            Якщо не оновлювати сторінку, вас викине через:
            <span id="timer"><?php echo $inactiveTime; ?></span> с.
        </p>
        <p>
            <a href="temporary_page.php">Оновити сторінку</a> (скинути таймер)
        </p>
    </div>

    <script>
        let timeLeft = <?php echo $inactiveTime; ?>;

        const timerElement = document.getElementById('timer');

        const countdown = setInterval(function () {
            timeLeft--;

            timerElement.textContent = timeLeft;

            if (timeLeft <= 0) {
                clearInterval(countdown);
                window.location.reload();
            }
        }, 1000);
    </script>
</body>

</html>