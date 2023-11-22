<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Инвестиционная компания</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="main-menu">
                <div class="logo-container">
                    <img src="logo.png" alt="Логотип">
                </div>
                <a href="home.php">Главная</a>
                <a href="about.html">Описание</a>
                <a href="#investment-options">Виды инвестиций</a>
                <a href="#strategies">Стратегии</a>
                <a href="store.php">Магазин</a>
                <a href="shopping_list.php">Список покупок</a>

            </nav>
            <div class="text-center py-5">
                <h1 class="name">Инвестиционная компания</h1>
                <h2>Управление инвестициями для финансовой стабильности</h2>
                <p class="w-50 my-3 mx-auto">
                    Мы предлагаем нашим клиентам достичь финансовой независимости через управление инвестициями
                </p>
                <a class="btn contact-me-btn" href="mailto:info@dohod.com">Свяжитесь с нами</a>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Магазин</h2>
            <div class="products">
                <?php
                // Подключение к базе данных
                include 'db.php';

                // Получение информации о товарах из базы данных
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $productId = $row['id'];
                        $productName = $row['name'];
                        $productPrice = $row['price'];
                        $productDescription = $row['description'];
                        ?>
                        <div class="product-card">
                            <h3>
                                <?php echo $productName; ?>
                            </h3>
                            <p>
                                <?php echo $productDescription; ?>
                            </p>
                            <p>$
                                <?php echo $productPrice; ?>
                            </p>
                            <button class="view-details-btn" onclick="showDetails(<?php echo $productId; ?>)">Подробнее</button>
                            <script>
                                function showDetails(productId) {
                                    window.location.href = 'product_details.php?id=' + productId;
                                }
                            </script>
                            <button class="add-to-list-btn" onclick="addToShoppingList(<?php echo $productId; ?>)">Добавить в
                                список</button>
                        </div>
                        <?php
                    }
                } else {
                    echo "Нет доступных товаров";
                }
                ?>
            </div>
            <a href="shopping_list.php">Перейти к списку покупок</a>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            &copy; 2023 Инвестиционная компания "Доход"
        </div>
    </footer>

    <script src="main.js"></script>
    <script>
        function addToShoppingList(productId) {
            // Создаем объект XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Устанавливаем метод и адрес запроса
            xhr.open('POST', 'add_to_shopping_list.php', true);

            // Устанавливаем заголовок Content-Type
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Отправляем запрос на сервер
            xhr.send('productId=' + productId);

            // Ожидаем ответа от сервера
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Обработка ответа от сервера
                    if (xhr.responseText === 'success') {
                        console.log('Товар с ID ' + productId + ' добавлен в список');
                    } else {
                        console.log('Ошибка при добавлении товара в список');
                    }
                }
            };
        }
    </script>
</body>

</html>