<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="text-center py-5">
                <h1 class="name">Циклические алгоритмы. Условия в алгоритмах. Табулирование функций</h1>
                <h2>Шишигина Кристина Николаевна 221-362</h2>
                <h3>Лабораторная работа №9.1</h3>
            </div>
        </div>
    </header>

    <main class="main">
        <?php
        // Явная инициализация числовых переменных
        $startArgument = 1;
        $numValues = 10;
        $step = 2;
        $maxValue = 100;
        $minValue = -100;
        $values = []; // Перемещение объявления и инициализации массива $values
        
        // Явная инициализация строковой переменной для типа формируемой верстки
        $layoutType = 'A';

        // Вывод типа верстки в подвале
        echo "<footer><p>Тип верстки: $layoutType</p></footer>";

        // Вычисление значений функции и их вывод в соответствии с выбранным типом верстки
        for ($i = 0; $i < $numValues; $i++) {
            $k=$i+1;
            $argument = $startArgument + ($i * $step);
        
            // В зависимости от типа верстки, используем соответствующий код
            if ($layoutType == 'A') {
                $value = ($argument <= 10) ? (10 * $startArgument - 5) : (($argument > 10 && $argument < 20) ? (($argument + 3) * pow($argument, 2)) : (3 / ($startArgument - 25)));
                $values[] = $value; 
                echo "f($argument) = $value<br><br>";
            } elseif ($layoutType == 'B') {
                $value = ($argument <= 10) ? (10 * $startArgument - 5) : (($argument > 10 && $argument < 20) ? (($argument + 3) * pow($argument, 2)) : (3 / ($startArgument - 25)));
                $values[] = $value; 
                echo "<ul><li>f($argument) = $value</li></ul>";
            } elseif ($layoutType == 'C') {
                $value = ($argument <= 10) ? (10 * $startArgument - 5) : (($argument > 10 && $argument < 20) ? (($argument + 3) * pow($argument, 2)) : (3 / ($startArgument - 25)));
                $values[] = $value;
                echo "<ol start='$k'><li>f($argument) = $value</li></ol>";
            } elseif ($layoutType == 'D') {
                $value = ($argument <= 10) ? (10 * $startArgument - 5) : (($argument > 10 && $argument < 20) ? (($argument + 3) * pow($argument, 2)) : (3 / ($startArgument - 25)));
                $values[] = $value; 
                echo "<table border='1' cellspacing='0' cellpadding='10'>
                    <tr>
                        <td>#</td>
                        <td>Аргумент</td>
                        <td>Значение функции</td>
                    </tr>
                    <tr>
                        <td>$i</td>
                        <td>$argument</td>
                        <td>$value</td>
                    </tr>
                </table>";
            } elseif ($layoutType == 'E') {
                $value = ($argument <= 10) ? (10 * $startArgument - 5) : (($argument > 10 && $argument < 20) ? (($argument + 3) * pow($argument, 2)) : (3 / ($startArgument - 25)));
                $values[] = $value; // Добавить эту строку
                echo "<div class='typeE'>
                    f($argument) = $value
                </div>";
            }
        }

        // Вычисление и вывод максимального, минимального, среднего арифметического и суммы значений функции
        $max = max($values);
        $min = min($values);
        $average = array_sum($values) / count($values);
        $sum = array_sum($values);

        echo "<br>Максимальное значение: $max<br><br>";
        echo "Минимальное значение: $min<br><br>";
        echo "Среднее арифметическое: $average<br><br>";
        echo "Сумма значений: $sum<br>";
        ?>
    </main>

    <footer class="footer">
        <div class="container">
            &copy; 2023 Циклические алгоритмы. Условия в алгоритмах. Табулирование функций
        </div>
    </footer>

</body>

</html>