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
        <?php
        include 'db.php';

        if (isset($_GET['id'])) {
            $productId = $_GET['id'];

            // Запрос на получение информации о выбранном продукте
            $sql = "SELECT * FROM products WHERE id = $productId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $productName = $row['name'];
                $productPrice = $row['price'];
                $productDescription = $row['description'];
                $productPhotoPath = $row['photo_path']; // Новое поле для хранения пути к фотографии
        
                // Ваш HTML-код для отображения деталей продукта
                ?>
                <!DOCTYPE html>
                <html lang="ru">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>
                        <?php echo $productName; ?>
                    </title>
                </head>

                <body>
                    <div class="details-container">
                        <h1>
                            <?php echo $productName; ?>
                        </h1>
                        <img src="<?php echo $productPhotoPath; ?>" alt="<?php echo $productName; ?>" width="400" height="400">
                        <p>Цена: $
                            <?php echo $productPrice; ?>
                        </p>
                        <p>Описание:
                            <?php echo $productDescription; ?>
                        </p>
                        <button class="add-to-list-btn" onclick="addToShoppingList(<?php echo $productId; ?>)">Добавить в
                                список</button>
                    </div>
                </body>

                </html>
                <?php
            } else {
                echo "Продукт не найден";
            }
        } else {
            echo "Некорректный запрос";
        }
        ?>
</body>

</html>