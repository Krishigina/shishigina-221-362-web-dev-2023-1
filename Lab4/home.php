<?php
include 'header.html';
?>

<body>
    <?php
    if (isset($_POST['fullname'])) {
        $fullname = $_POST['fullname'];
        $file = $_POST['file'];
        $message = $_POST['message'];
        $type = $_POST['type'];
        if (isset($_POST['source'])) {
            $source = $_POST['source'];
        } else {
            $source = '';
        }
    }

    echo "<h2>Ответ на ваше обращение</h2>";
    echo "<section class='contact-form'>";
    echo "<p>Здравствуйте, <span>$fullname</span></p>";
    echo "<p><b>ФИО:</b> <span>$fullname</span></p>";
    echo "<p><b>Текст обращения:</b> <span>$message</span></p>";
    echo "<p><b>Источник:</b> <span>$source</span></p>";
    if ($file != '') {
        echo "<p><b>Вы приложили следующий файл:</b> <span>$file</span></p>";
    }

    echo '<br><a class="btn" href="index.php?N=' . $_POST['fullname'] . '&E=' . $_POST['email'] . '&R='.$source. '">Заполнить снова</a></p>';
    ?>
</body>

</html> 