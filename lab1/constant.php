<?php
/*
ЗАДАНИЕ 1
- Создайте константу и присвойте ей значение.
*/

define("SITE_NAME", "Мой PHP сайт");

const AUTHOR = "Дмитрий Козлов";

define("SETTINGS", [
    'version' => '1.0',
    'language' => 'ru',
    'debug' => false
]);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Константы</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 20px;
			line-height: 1.6;
		}
		h1 {
			color: #333;
		}
		.info-block {
			background-color: #f0f8ff;
			padding: 15px;
			margin: 10px 0;
			border-left: 4px solid #4CAF50;
		}
		.constant-value {
			font-weight: bold;
			color: #d35400;
		}
	</style>
</head>
<body>
	<h1>Константы в PHP</h1>
	
	<?php
	/*
	ЗАДАНИЕ 2
	- Проверьте, существует ли константа, которую Вы хотите использовать.
	- Выведите значение созданной константы.
	*/
	
	echo '<div class="info-block">';
	echo '<h2>ЗАДАНИЕ 2: Созданные константы</h2>';
	
	if (defined('SITE_NAME')) {
		echo '<p>Константа SITE_NAME существует. Значение: <span class="constant-value">' . SITE_NAME . '</span></p>';
	} else {
		echo '<p>Константа SITE_NAME не существует.</p>';
	}
	
	if (defined('AUTHOR')) {
		echo '<p>Константа AUTHOR существует. Значение: <span class="constant-value">' . AUTHOR . '</span></p>';
	} else {
		echo '<p>Константа AUTHOR не существует.</p>';
	}
	
	echo '<p>Константа SETTINGS (массив):</p>';
	echo '<pre>';
	print_r(SETTINGS);
	echo '</pre>';
	
	echo '</div>';
	
	/*
	ЗАДАНИЕ 3
	- Используя предопределённые в ядре константы выведите текущую версию PHP.
	- Используя магические константы выведите директорию скрипта.
	*/
	
	echo '<div class="info-block">';
	echo '<h2>ЗАДАНИЕ 3: Предопределенные и магические константы</h2>';
	
	echo '<h3>Предопределенные константы:</h3>';
	echo '<p>Текущая версия PHP: <span class="constant-value">' . PHP_VERSION . '</span></p>';
	echo '<p>Операционная система: <span class="constant-value">' . PHP_OS . '</span></p>';
	echo '<p>Версия интерфейса сервера: <span class="constant-value">' . PHP_SAPI . '</span></p>';
	echo '<p>Максимальный размер целого числа: <span class="constant-value">' . PHP_INT_MAX . '</span></p>';
	echo '<p>Минимальный размер целого числа: <span class="constant-value">' . PHP_INT_MIN . '</span></p>';
	echo '<p>Размер целого числа в байтах: <span class="constant-value">' . PHP_INT_SIZE . '</span></p>';
	
	echo '<h3>Магические константы:</h3>';
	echo '<p>Директория скрипта (__DIR__): <span class="constant-value">' . __DIR__ . '</span></p>';
	echo '<p>Полный путь к файлу (__FILE__): <span class="constant-value">' . __FILE__ . '</span></p>';
	echo '<p>Номер текущей строки (__LINE__): <span class="constant-value">' . __LINE__ . '</span></p>';
	echo '<p>Имя текущей функции (__FUNCTION__): <span class="constant-value">' . __FUNCTION__ . '</span></p>';
	echo '<p>Имя текущего класса (__CLASS__): <span class="constant-value">' . __CLASS__ . '</span></p>';
	echo '<p>Имя текущего пространства имен (__NAMESPACE__): <span class="constant-value">' . __NAMESPACE__ . '</span></p>';
	echo '<p>Имя текущего трейта (__TRAIT__): <span class="constant-value">' . __TRAIT__ . '</span></p>';
	echo '<p>Имя текущего метода (__METHOD__): <span class="constant_value">' . __METHOD__ . '</span></p>';
	
	echo '</div>';
	
	echo '<div class="info-block">';
	echo '<h2>Дополнительная информация</h2>';
	
	$allConstants = get_defined_constants(true);
	echo '<p>Всего определено констант: <span class="constant-value">' . count($allConstants['user'] ?? []) . ' пользовательских</span> и ';
	echo '<span class="constant-value">' . count($allConstants['internal'] ?? []) . ' внутренних</span></p>';
	
	echo '<h3>Несколько полезных констант:</h3>';
	echo '<ul>';
	echo '<li>E_ERROR: ' . E_ERROR . ' (значение константы ошибок)</li>';
	echo '<li>DIRECTORY_SEPARATOR: "' . DIRECTORY_SEPARATOR . '" (разделитель директорий)</li>';
	echo '<li>PATH_SEPARATOR: "' . PATH_SEPARATOR . '" (разделитель путей)</li>';
	echo '<li>PHP_EOL: "' . str_replace(["\r", "\n"], ['\r', '\n'], PHP_EOL) . '" (символ конца строки)</li>';
	echo '</ul>';
	
	echo '</div>';
	?>
	
</body>
</html>