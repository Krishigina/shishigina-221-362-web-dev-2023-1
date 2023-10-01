<?php
$seconds = date('s');
$imageClass = ($seconds % 2 == 0) ? 'images/background.jpg' : 'images/background2.jpg';
$pageTitle = 'Шишигина 221-362 Лаб3';

$investmentOptions = array(
    array('Вид инвестиции', 'Описание', 'Уровень риска', 'Ожидаемая доходность'),
    array('Акции на фондовом рынке', 'Инвестирование в акции компаний на фондовом рынке', 'Высокий', 'Высокая'),
    array('Облигации и ценные бумаги', 'Инвестирование в облигации и другие ценные бумаги', 'Средний', 'Средняя'),
    array('Инвестиции в недвижимость', 'Покупка и аренда недвижимости для получения дохода', 'Низкий', 'Стабильная'),
    array('Финансирование стартапов и инновационных проектов', 'Инвестирование в молодые компании с высоким потенциалом', 'Высокий', 'Высокая')
);

$strategies = array(
    'Долгосрочные инвестиции в устойчивые компании',
    'Активное трейдинговое управление портфелем',
    'Диверсификация инвестиций для снижения риска',
    'Использование алгоритмического трейдинга и искусственного интеллекта'
);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/main.css">
    <style>
        .header {
            background-color: black;
            color: white;
            background-image: url(<?php echo $imageClass; ?>);
            background-size: cover;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="main-menu">
                <a href="#about"><?php echo 'Описание'; ?></a>
                <a href="#investment-options"><?php echo 'Виды инвестиций'; ?></a>
                <a href="#strategies"><?php echo 'Стратегии'; ?></a>
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
            <section id="about">
                <h1>Описание</h1>
                <figure class="avatar">
                    <img src="images/person.png" alt="Person">
                </figure>
                <p>
                    Инвестиционная компания "Доход" - это тщательно отобранный коллектив профессионалов,
                    специализирующихся на управлении инвестициями и финансовом консалтинге. Наша цель - помочь нашим
                    клиентам создать и расширить свой финансовый портфель, обеспечивая стабильный доход и финансовую безопасность на
                    долгосрочной основе.
                </p>
            </section>

            <section id="investment-options">
                <p></p>
                <h1>Виды инвестиций</h1>
                <p>
                    Компания предлагает широкий спектр инвестиционных возможностей с различными уровнями риска и
                    доходности.
                    Наши клиенты могут выбирать из таких видов инвестиций:
                </p>
                <table>
                <?php foreach ($investmentOptions as $option) : ?>
                        <tr>
                            <?php foreach ($option as $cell) : ?>
                                <td><?php echo $cell; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <div class="text-right">
                    <p>
                    </p>
                    <a class="btn" href="investmentOptions.php">Подробнее</a>
                </div>
            </section>
            <section id="strategies">
                <p></p>
                <h1>Стратегии</h1>
                <h2 class="h2">Стратегии в инвестиционном планировании необходимы для определения целей и пути их достижения, а также управления
                    рисками и максимизации доходности. Они помогают инвесторам принимать осознанные решения, основанные на анализе рынка и прогнозировании
                    возможных сценариев, что способствует повышению эффективности инвестиций и снижению возможных потерь.</h2>
                <p>
                    Наша команда экспертов разработала ряд эффективных инвестиционных стратегий, которые позволяют
                    нашим клиентам максимизировать свой доход и управлять рисками. Наши стратегии включают:
                </p>
                <ul>
                    <?php foreach ($strategies as $strategy) : ?>
                        <li><?php echo $strategy; ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="text-right">
                    <a class="btn" href="strategies.php">Подробнее</a>
                </div>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
        <?php
            date_default_timezone_set('Europe/Moscow');
            $currentDate = date('d.m.Y в H:i:s');
            echo 'Сформировано ' . $currentDate;
        ?>
        </div>
    </footer>
</body>

</html>