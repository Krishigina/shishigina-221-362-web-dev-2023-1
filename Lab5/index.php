<?php
include "db.php";
include "index.html";
$result = mysqli_query($mysql, "SELECT * FROM investing_terms");

$columnNames = array(
    'term_id' => '№',
    'term' => 'Термин',
    'definition' => 'Определение'
);

echo "<table>";
echo "<tr>";
foreach ($columnNames as $columnName) {
    echo "<th>$columnName</th>";
}
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    foreach ($row as $colName => $colValue) {
        echo "<td>" . $colValue . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

// SQL-запрос для получения данных из таблицы dbimages
$sql = mysqli_query($mysql, "SELECT * FROM `dbimages`");

// Вывод изображений на страницу
while ($image_name = mysqli_fetch_assoc($sql)) {
    ?>
    <div class="image-container">
        <img title="<?php echo $image_name['image_name']; ?>" src="dbimages/<?php echo $image_name['image_url']; ?>" />
    </div>
    <?php
}

?>
</div>
</main>
<footer class="footer">
    <div class="container">
        &copy; 2023 Инвестиционная компания "Доход"
    </div>
</footer>

</body>

</html>