<?php
include 'header.html';
?>
<?php
if (isset($_GET['N'])) {
    $fullname = $_GET['N'];
} else {
    $fullname = '';
}
if (isset($_GET['E'])) {
    $email = $_GET['E'];
} else {
    $email = '';
}
if (isset($_GET['R'])) {
    $source = $_GET['R'];
} else {
    $source = '';
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $type = $_POST['type'];
    $file = $_POST['file'];
    $consent = isset($_POST['consent']) ? 'Да' : 'Нет';
    $source = $_POST['source'];


    // Перенаправление на страницу home.php для вывода ответа.
    header("Location: home.php?fio=$fullname&message=$message&source=$source&file=$file");
    exit();
}
?>

<body>
    <section id="feedback">
        <h1>Форма обратной связи</h1>
    </section>
    <section id="contact">
        <form class="contact-form" action="home.php" method="POST">
            <div class="form-field">
                <label for="fullname">ФИО:</label>
                <input type="text" id="fullname" name="fullname" value="<?=$fullname ?>" required
                    placeholder="Введите ФИО">
            </div>

            <div class="form-field margins">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?=$email ?>" required placeholder="Введите Email">
            </div>

            <div class="form-field margins">
                <label for="source">Откуда узнали о нас:</label>
                <div class="radio-button-group margins">
                    <label>
                        <input type="radio" id="source-internet" name="source" value="Реклама из интернета" <?php if ($source == 'Реклама из интернета')
                            echo ' checked="checked"' ?> required>
                            Реклама из интернета
                        </label>
                        <label>
                            <input type="radio" id="source-tv" name="source" value="Рассказали друзья" <?php if ($source == 'Рассказали друзья')
                            echo ' checked="checked"' ?>>
                            Рассказали друзья
                        </label>
                    </div>
                </div>

                <div class="form-field margins">
                    <label for="type">Тип обращения:</label>
                    <select id="type" name="type">
                        <option value="Жалоба" id="claim">Жалоба</option>
                        <option value="Предложение" id="offer">Предложение</option>
                    </select>
                </div>

                <div class="form-field margins">
                    <label for="message">Текст сообщения:</label>
                    <textarea id="message" name="message" rows="7" required
                        placeholder="Введите текст сообщения"></textarea>
                </div>

                <div class="form-field margins">
                    <label for="file">
                        <h3>Вложения (файл):</h3>
                    </label>
                    <input type="file" id="file" name="file">
                </div>


                <input type="checkbox" id="consent" name="consent" required>
                <label class="consent-label" for="consent">Даю согласие на обработку персональных данных</label>

                <div class="form-field margins">
                    <button type="submit" class="btn">Отправить</button>
                </div>
            </form>
        </section>
    </body>