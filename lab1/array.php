<?php
/*
ЗАДАНИЕ 1
- C помощью короткого синтаксиса массива cоздайте массив $bmw с ключами:
	'model'
	'speed, km/h'
	'doors'
	'year'
- Заполните ячейки значениями: 'X5', 120, 5, '2006'	
- Создайте массивы $toyota и $opel аналогичные массиву $bmw.
- Заполните массив $toyota значениями: 'Carina', 130, 4, '2007'
- Заполните массив $opel значениями: 'Corsa', 140, 5, '2007'		
*/

$bmw = [
    'model' => 'X5',
    'speed, km/h' => 120,
    'doors' => 5,
    'year' => '2006'
];

$toyota = [
    'model' => 'Carina',
    'speed, km/h' => 130,
    'doors' => 4,
    'year' => '2007'
];

$opel = [
    'model' => 'Corsa',
    'speed, km/h' => 140,
    'doors' => 5,
    'year' => '2007'
];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Массивы</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 20px;
			line-height: 1.6;
		}
		h1 {
			color: #333;
		}
		.car-info {
			background-color: #f5f5f5;
			padding: 15px;
			margin: 10px 0;
			border-left: 4px solid #3498db;
		}
	</style>
</head>
<body>
	<h1>Массивы автомобилей</h1>
	
	<?php
	/*
	ЗАДАНИЕ 2
	- С помощью подстановки в строку выведите значения всех трёх массивов в виде: name - model - speed - doors -year,  например: bmw - x5 - 120 - 5 - 2006
	*/
	
	echo '<h2>Информация об автомобилях:</h2>';
	
	// Вывод информации о BMW
	echo '<div class="car-info">';
	echo '<strong>bmw</strong> - ' . $bmw['model'] . ' - ' . $bmw['speed, km/h'] . ' - ' . $bmw['doors'] . ' - ' . $bmw['year'];
	echo '</div>';
	
	// Вывод информации о Toyota
	echo '<div class="car-info">';
	echo '<strong>toyota</strong> - ' . $toyota['model'] . ' - ' . $toyota['speed, km/h'] . ' - ' . $toyota['doors'] . ' - ' . $toyota['year'];
	echo '</div>';
	
	// Вывод информации о Opel
	echo '<div class="car-info">';
	echo '<strong>opel</strong> - ' . $opel['model'] . ' - ' . $opel['speed, km/h'] . ' - ' . $opel['doors'] . ' - ' . $opel['year'];
	echo '</div>';
	
	// Дополнительно: вывод с использованием компактного синтаксиса и циклов
	echo '<hr>';
	echo '<h2>Дополнительный вывод (с использованием foreach):</h2>';
	
	// Создаем массив машин для удобного перебора
	$cars = [
		'bmw' => $bmw,
		'toyota' => $toyota,
		'opel' => $opel
	];
	
	foreach ($cars as $carName => $carData) {
		echo '<div class="car-info">';
		echo "<strong>$carName</strong> - " . 
			 $carData['model'] . ' - ' . 
			 $carData['speed, km/h'] . ' - ' . 
			 $carData['doors'] . ' - ' . 
			 $carData['year'];
		echo '</div>';
	}
	
	// Дополнительно: вывод информации о типах данных
	echo '<hr>';
	echo '<h3>Отладочная информация:</h3>';
	echo '<pre>';
	echo 'Тип переменной $bmw: ' . gettype($bmw) . "\n";
	echo 'Тип переменной $toyota: ' . gettype($toyota) . "\n";
	echo 'Тип переменной $opel: ' . gettype($opel) . "\n";
	echo '</pre>';
	?>

</body>
</html>