<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Список покупок</title>
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
                <a href="index.html">Главная</a>
                <a href="store.php">Магазин</a>
                <a href="contacts.html">Контакты</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Список покупок</h2>
            <?php
            // Подключение к базе данных
            include 'db.php';

            // Получение списка покупок из базы данных
            $sql = "SELECT products.name, products.price, shopping_list.quantity FROM shopping_list INNER JOIN products ON shopping_list.product_id = products.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $productName = $row['name'];
                    $productPrice = $row['price'];
                    $productQuantity = $row['quantity'];
                    ?>
                    <div class="product-item">
                        <h3>
                            <?php echo $productName; ?>
                        </h3>
                        <p>Цена: $
                            <?php echo $productPrice; ?>
                        </p>
                        <p>Количество:
                            <?php echo $productQuantity; ?>
                        </p>
                        <button onclick="removeFromShoppingList('<?php echo $productName; ?>')">Удалить</button>
                    </div>
                    <?php
                }
            } else {
                echo "Список покупок пуст";
            }

            // Закрытие соединения с базой данных
            $conn->close();
            ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            &copy; 2023 Инвестиционная компания "Доход"
        </div>
    </footer>

    <script src="main.js"></script>
    <script>
        function removeFromShoppingList(productName) {
            // Создание нового объекта XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Устанавливаем метод и URL для отправки запроса
            xhr.open('POST', 'remove_from_list.php', true);

            // Устанавливаем заголовок запроса
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Отправляем запрос на сервер
            xhr.send('productName=' + encodeURIComponent(productName));

            // Обработка ответа от сервера
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(`Товар ${productName} удален из списка`);

                        // Можно выполнить дополнительные действия или обновить страницу
                    } else {
                        console.error('Ошибка при удалении товара из списка');
                    }
                }
            };
        }
    </script>
</body>

</html>