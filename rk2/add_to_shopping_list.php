<?php
// Подключение к базе данных
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];

    // Проверка наличия товара с указанным идентификатором в базе данных
    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Добавление товара в список покупок
        $sql = "INSERT INTO shopping_list (product_id) VALUES ($productId)";
        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
}
?>