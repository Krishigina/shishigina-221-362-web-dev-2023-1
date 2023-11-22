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
        <main>
            <div class="register-container">
                <form class="register-form" action="reg.php" method="POST">
                    <h2>Регистрация</h2>
                    <label for="username">Логин:</label>
                    <input type="text" id="username" name="username" required>

                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Зарегистрироваться</button>
                    <?php
                    // Подключение к базе данных
                    include 'db.php';

                    // Обработка данных формы
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST["username"];
                        $password = $_POST["password"];

                        // Проверка, не существует ли пользователь с таким же логином
                        $checkSql = "SELECT * FROM users WHERE username = '$username'";
                        $checkResult = $conn->query($checkSql);

                        if ($checkResult->num_rows > 0) {
                            // Пользователь с таким логином уже существует
                            echo "Пользователь с таким логином уже зарегистрирован";
                        } else {
                            // Добавление пользователя в базу данных
                            $insertSql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

                            if ($conn->query($insertSql) === TRUE) {
                                // Пользователь успешно зарегистрирован
                                header("Location: home.php");
                                echo "Регистрация успешна";
                            } else {
                                // Ошибка при добавлении пользователя в базу данных
                                echo "Ошибка при регистрации: " . $conn->error;
                            }
                        }
                    }

                    ?>
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