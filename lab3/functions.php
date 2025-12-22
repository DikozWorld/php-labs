<?php
/*
   Создайте скрипт functions.php, который выводит для каждого загруженного модуля 
   (get_loaded_extensions) имена всех функций (get_extension_funcs). 
   В конце списка выведите общее количество функций.
*/
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Функции PHP модулей</title>
</head>
<body>
    <h1>Функции загруженных модулей PHP</h1>
    
    <?php
    // Получаем все загруженные модули
    $extensions = get_loaded_extensions();
    $totalFunctions = 0;
    
    echo "<p>Всего загружено модулей: <strong>" . count($extensions) . "</strong></p>";
    
    // Сортируем модули по алфавиту для удобства
    sort($extensions);
    
    // Проходим по каждому модулю
    foreach ($extensions as $extension) {
        // Получаем функции текущего модуля
        $functions = get_extension_funcs($extension);
        
        if ($functions === false) {
            echo "<h2>$extension</h2>";
            echo "<p>Не удалось получить список функций для этого модуля.</p>";
            continue;
        }
        
        $functionCount = count($functions);
        $totalFunctions += $functionCount;
        
        echo "<h2>$extension <small>($functionCount функций)</small></h2>";
        
        // Выводим функции
        echo "<ul>";
        
        // Ограничиваем вывод для очень больших модулей
        $maxDisplay = 50;
        $displayCount = min($functionCount, $maxDisplay);
        
        for ($i = 0; $i < $displayCount; $i++) {
            echo "<li>" . htmlspecialchars($functions[$i]) . "</li>";
        }
        
        // Если функций больше, чем лимит отображения
        if ($functionCount > $maxDisplay) {
            $remaining = $functionCount - $maxDisplay;
            echo "<li>... и ещё $remaining функций</li>";
        }
        
        echo "</ul>";
    }
    
    // Выводим общее количество функций
    echo "<hr>";
    echo "<h2>Итоговая статистика</h2>";
    echo "<p>Общее количество функций во всех модулях: <strong>$totalFunctions</strong></p>";
    
    // Дополнительная статистика
    echo "<h3>Дополнительная информация:</h3>";
    echo "<ul>";
    echo "<li>Версия PHP: " . phpversion() . "</li>";
    echo "<li>Общее количество модулей: " . count($extensions) . "</li>";
    
    // Модули с наибольшим количеством функций
    $extensionsWithCount = [];
    foreach ($extensions as $extension) {
        $functions = get_extension_funcs($extension);
        if ($functions !== false) {
            $extensionsWithCount[$extension] = count($functions);
        }
    }
    
    arsort($extensionsWithCount);
    $topExtensions = array_slice($extensionsWithCount, 0, 5, true);
    
    echo "<li>Модули с наибольшим количеством функций:</li>";
    echo "<ol>";
    foreach ($topExtensions as $ext => $count) {
        echo "<li>$ext: $count функций</li>";
    }
    echo "</ol>";
    
    // Основные модули PHP
    $coreExtensions = ['Core', 'date', 'pcre', 'Reflection', 'SPL', 'standard'];
    echo "<li>Основные модули PHP:</li>";
    echo "<ul>";
    foreach ($coreExtensions as $coreExt) {
        if (in_array($coreExt, $extensions)) {
            $funcs = get_extension_funcs($coreExt);
            $count = $funcs !== false ? count($funcs) : 0;
            echo "<li>$coreExt: $count функций</li>";
        }
    }
    echo "</ul>";
    echo "</ul>";
    ?>
    
    <hr>
    <p><em>Скрипт сгенерирован: <?php echo date('Y-m-d H:i:s'); ?></em></p>
</body>
</html>