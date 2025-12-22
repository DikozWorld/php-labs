<?php
/*
   Использование встроенных функций
   Создайте скрипт constants.php, который выводит имена и значения всех определённых в PHP констант
*/
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Константы PHP</title>
</head>
<body>
    <h1>Определённые константы PHP</h1>
    
    <?php
    // Получаем все определённые константы
    $allConstants = get_defined_constants(true);
    
    // Подсчитываем общее количество
    $totalCount = count($allConstants['user'] ?? []) + count($allConstants['internal'] ?? []);
    
    echo "<p>Всего найдено констант: <strong>$totalCount</strong></p>";
    
    // Выводим пользовательские константы (если есть)
    if (!empty($allConstants['user'])) {
        echo "<h2>Пользовательские константы (" . count($allConstants['user']) . "):</h2>";
        echo "<ul>";
        foreach ($allConstants['user'] as $name => $value) {
            $formattedValue = is_array($value) ? 'Array' : var_export($value, true);
            echo "<li><strong>$name</strong> = $formattedValue</li>";
        }
        echo "</ul>";
    }
    
    // Выводим встроенные константы
    if (!empty($allConstants['internal'])) {
        echo "<h2>Встроенные константы (" . count($allConstants['internal']) . "):</h2>";
        
        // Группируем по категориям
        $groupedConstants = [];
        foreach ($allConstants['internal'] as $name => $value) {
            // Определяем категорию по имени
            if (str_starts_with($name, 'E_')) {
                $group = 'Константы ошибок';
            } elseif (str_starts_with($name, 'PHP_')) {
                $group = 'Константы PHP';
            } elseif (str_starts_with($name, 'IMG_')) {
                $group = 'Константы GD/изображений';
            } elseif (str_starts_with($name, 'CURL')) {
                $group = 'Константы cURL';
            } elseif (str_starts_with($name, 'PGSQL_')) {
                $group = 'Константы PostgreSQL';
            } elseif (str_starts_with($name, 'MYSQLI_')) {
                $group = 'Константы MySQLi';
            } else {
                $group = 'Другие константы';
            }
            
            $groupedConstants[$group][$name] = $value;
        }
        
        // Выводим по группам
        foreach ($groupedConstants as $groupName => $constants) {
            echo "<h3>$groupName (" . count($constants) . "):</h3>";
            echo "<ul>";
            
            $counter = 0;
            foreach ($constants as $name => $value) {
                $counter++;
                if ($counter > 50 && $groupName !== 'Константы ошибок') {
                    echo "<li>... и ещё " . (count($constants) - 50) . " констант</li>";
                    break;
                }
                
                $formattedValue = is_array($value) ? 'Array' : var_export($value, true);
                echo "<li><strong>$name</strong> = $formattedValue</li>";
            }
            
            echo "</ul>";
        }
    }
    
    // Информация о магических константах
    echo "<h2>Магические константы:</h2>";
    echo "<ul>";
    echo "<li><strong>__LINE__</strong> = " . __LINE__ . " (текущая строка)</li>";
    echo "<li><strong>__FILE__</strong> = " . __FILE__ . " (полный путь к файлу)</li>";
    echo "<li><strong>__DIR__</strong> = " . __DIR__ . " (директория файла)</li>";
    echo "<li><strong>__FUNCTION__</strong> = " . __FUNCTION__ . " (имя функции)</li>";
    echo "<li><strong>__CLASS__</strong> = " . __CLASS__ . " (имя класса)</li>";
    echo "<li><strong>__TRAIT__</strong> = " . __TRAIT__ . " (имя трейта)</li>";
    echo "<li><strong>__METHOD__</strong> = " . __METHOD__ . " (имя метода)</li>";
    echo "<li><strong>__NAMESPACE__</strong> = " . __NAMESPACE__ . " (имя пространства имён)</li>";
    echo "</ul>";
    
    // Полезные константы
    echo "<h2>Некоторые полезные константы:</h2>";
    echo "<ul>";
    echo "<li><strong>PHP_VERSION</strong> = " . PHP_VERSION . "</li>";
    echo "<li><strong>PHP_OS</strong> = " . PHP_OS . "</li>";
    echo "<li><strong>PHP_OS_FAMILY</strong> = " . PHP_OS_FAMILY . "</li>";
    echo "<li><strong>PHP_INT_MAX</strong> = " . PHP_INT_MAX . "</li>";
    echo "<li><strong>PHP_INT_MIN</strong> = " . PHP_INT_MIN . "</li>";
    echo "<li><strong>PHP_INT_SIZE</strong> = " . PHP_INT_SIZE . " байт</li>";
    echo "<li><strong>PHP_FLOAT_DIG</strong> = " . PHP_FLOAT_DIG . "</li>";
    echo "<li><strong>PHP_FLOAT_EPSILON</strong> = " . PHP_FLOAT_EPSILON . "</li>";
    echo "<li><strong>PHP_FLOAT_MIN</strong> = " . PHP_FLOAT_MIN . "</li>";
    echo "<li><strong>PHP_FLOAT_MAX</strong> = " . PHP_FLOAT_MAX . "</li>";
    echo "<li><strong>DIRECTORY_SEPARATOR</strong> = '" . DIRECTORY_SEPARATOR . "'</li>";
    echo "<li><strong>PATH_SEPARATOR</strong> = '" . PATH_SEPARATOR . "'</li>";
    echo "<li><strong>PHP_EOL</strong> = '" . str_replace(["\r", "\n"], ['\r', '\n'], PHP_EOL) . "'</li>";
    echo "</ul>";
    ?>
    
    <hr>
    <h3>Информация о скрипте:</h3>
    <p>Версия PHP: <?php echo phpversion(); ?></p>
    <p>Дата и время генерации: <?php echo date('Y-m-d H:i:s'); ?></p>
    <p>Запущено на: <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Неизвестно'; ?></p>
</body>
</html>