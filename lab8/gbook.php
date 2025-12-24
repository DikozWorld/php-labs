<?php
/* ЗАДАНИЕ 1 - Подключение к БД */
require_once 'config.php';

// Подключение к базе данных
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Проверка соединения
if ($mysqli->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
}

// Установка кодировки
$mysqli->set_charset(DB_CHARSET);

/* ЗАДАНИЕ 1 - Приём данных от пользователя и вставка новой записи */
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
    // Фильтрация данных
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $msg = trim(htmlspecialchars($_POST['msg']));
    
    // Экранирование для SQL
    $name = $mysqli->real_escape_string($name);
    $email = $mysqli->real_escape_string($email);
    $msg = $mysqli->real_escape_string($msg);
    
    // Проверка на пустые поля
    if (!empty($name) && !empty($email) && !empty($msg)) {
        // SQL запрос на вставку
        $sql = "INSERT INTO msgs (name, email, msg, created_at) 
                VALUES ('$name', '$email', '$msg', NOW())";
        
        if ($mysqli->query($sql)) {
            // Перезапрос страницы для очистки POST данных
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<p style='color: red;'>Ошибка: " . $mysqli->error . "</p>";
        }
    } else {
        echo "<p style='color: red;'>Все поля должны быть заполнены!</p>";
    }
}

/* ЗАДАНИЕ 3 - Удаление записи */
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];
    
    if ($delete_id > 0) {
        $sql = "DELETE FROM msgs WHERE id = $delete_id";
        
        if ($mysqli->query($sql)) {
            // Перезапрос страницы
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<p style='color: red;'>Ошибка удаления: " . $mysqli->error . "</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга - Лабораторная 8</title>
</head>
<body>
    <h1>Гостевая книга</h1>
    
    <h2>Добавить сообщение</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Ваше имя:</label><br>
        <input type="text" name="name" required><br><br>
        
        <label>Ваш E-mail:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Сообщение:</label><br>
        <textarea name="msg" cols="50" rows="5" required></textarea><br><br>
        
        <input type="submit" value="Добавить">
    </form>
    
    <hr>
    
    <h2>Сообщения</h2>
    <?php
    /* ЗАДАНИЕ 2 - Выборка данных из таблицы */
    
    // SQL запрос на выборку всех сообщений в обратном порядке
    $sql = "SELECT * FROM msgs ORDER BY id DESC";
    $result = $mysqli->query($sql);
    
    // Количество сообщений
    $count = $result->num_rows;
    echo "<p><strong>Всего сообщений: $count</strong></p>";
    
    // Выводим все сообщения
    if ($count > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px 0;'>";
            echo "<p><strong>Имя:</strong> " . htmlspecialchars($row['name']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
            echo "<p><strong>Сообщение:</strong><br>" . nl2br(htmlspecialchars($row['msg'])) . "</p>";
            
            if (isset($row['created_at'])) {
                echo "<p><small>Дата: " . $row['created_at'] . "</small></p>";
            }
            
            // Ссылка для удаления
            echo "<a href='" . $_SERVER['PHP_SELF'] . "?delete_id=" . $row['id'] . "' 
                  onclick='return confirm(\"Удалить это сообщение?\")'>
                  Удалить</a>";
            
            echo "</div>";
        }
    } else {
        echo "<p>Сообщений пока нет.</p>";
    }
    
    // Закрываем соединение с БД
    $mysqli->close();
    ?>
    
    <hr>
    <p>База данных: <?php echo DB_NAME; ?></p>
</body>
</html>