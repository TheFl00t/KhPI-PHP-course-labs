<?php
session_start();

// Каталог товарів
$products = [
    0 => ["Пiцца", "Курка, Соус Альфредо, Моцарела...", 190],
    1 => ["Бургер", "Два біфштекси з натуральної яловичини...", 120],
    2 => ["Coca-Cola", "Холодний освіжаючий напій...", 45]
];

// Зберігаємо каталог
$_SESSION['products'] = $products;
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>LAB3 - Task 4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="page-wrapper">
        <header class="site-header">
            <div class="container site-header__content">
                <form action="cart_view.php" method="post">
                    <input type="submit" class="btn-view-cart" name="view_cart" value="🛒 Переглянути кошик">
                </form>
            </div>
        </header>

        <main class="container products-list">
            <?php foreach ($products as $id => $item): ?>
                
                <article class="product-card">
                    <div class="product-card__image"></div>

                    <div class="product-card__body">
                        <div class="product-card__info">
                            <p class="product-card__title"><?php echo $item[0]; ?></p>
                            <p class="product-card__desc"><?php echo $item[1]; ?></p>
                        </div>

                        <div class="product-card__actions">
                            <form action="cart_process.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $item[0]; ?>">

                                <div class="action-row">
                                    <span class="price-tag"><?php echo $item[2]; ?> &#8372;</span>
                                    
                                    <div class="qty-controls">
                                        <button type="button" class="btn btn-qty" onclick="changeQty(this, -1)">-</button>
                                        <input type="number" name="quantity" class="qty-input" value="1" min="1" readonly>
                                        <button type="button" class="btn btn-qty" onclick="changeQty(this, 1)">+</button>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Додати у кошик">
                            </form>
                        </div>
                    </div>
                </article>

            <?php endforeach; ?>
        </main>
    </div>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'added'): ?>
        <div class="toast-wrapper" id="toast">
            <div class="toast">
                <div class="toast__tab"></div>
                <div class="toast__content">
                    <p>✅ Товар успішно додано у кошик!</p>
                </div>
            </div>
        </div>

        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast');
                if (toast) {
                    toast.style.transition = "opacity 0.5s";
                    toast.style.opacity = "0";
                    setTimeout(() => toast.remove(), 500);
                }
                // Очистка URL без перезагрузки
                window.history.replaceState(null, null, window.location.pathname);
            }, 3000);
        </script>
    <?php endif; ?>

    <script>
        function changeQty(btn, change) {
            const container = btn.parentElement;
            const input = container.querySelector('.qty-input');
            let val = parseInt(input.value) + change;
            if (val < 1) val = 1;
            input.value = val;
        }
    </script>
</body>
</html>