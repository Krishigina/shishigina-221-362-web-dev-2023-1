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
                <a href="reg.php">Регистрация</a>
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
        <div class="login-container">
            <?php
            // Подключение к базе данных
            include 'db.php';

            // Обработка данных формы
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                // Проверка соответствия полей в базе данных
                $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Пользователь найден
                    echo "Пользователь найден";
                    header("Location: about.php");
                    exit;
                } else {
                    // Ошибка: неправильное имя пользователя или пароль
                    echo "Неверное имя пользователя или пароль";
                }
            }
            ?>

            <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h2>Вход</h2>
                <label for="username">Логин:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>

                <label>
                    <input type="checkbox" name="remember"> Запомнить меня
                </label>

                <button type="submit">Войти</button>
            </form>
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            &copy; 2023 Инвестиционная компания "Доход"
        </div>
    </footer>

</body>

</html>  