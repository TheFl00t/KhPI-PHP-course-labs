<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB3 - Task 3</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-wrap">
        <label>Оберiть метод щоб перевiрити $_SERVER</label><br>
        <form action="server_info.php" method="post">
            <input class="btn" type="submit" value="POST">
        </form>
        <form action="server_info.php" method="get">
            <input class="btn" type="submit" value="GET">
        </form>
    </div>
</body>

</html>