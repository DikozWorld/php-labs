<?php
/*
ЗАДАНИЕ 3
- Выполните задание 2 используя управляющую конструкцию match.
*/

$day = 3;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Конструкция match</title>
</head>
<body>
	<h1>Конструкция match</h1>
	
	<?php
	echo "<h2>Реализация с помощью match:</h2>";
	echo "День недели под номером: $day<br>";
	
	$result = match (true) {
		($day >= 1 && $day <= 5) => "Это рабочий день",
		($day == 6 || $day == 7) => "Это выходной день",
		default => "Неизвестный день"
	};
	
	echo $result;
	
	echo "<hr>";
	
	echo "<h2>Альтернативная реализация match:</h2>";
	
	$result = match ($day) {
		1, 2, 3, 4, 5 => "Это рабочий день (день $day)",
		6, 7 => "Это выходной день (день $day)",
		default => "Неизвестный день (день $day)"
	};
	
	echo $result;
	?>
	
</body>
</html>