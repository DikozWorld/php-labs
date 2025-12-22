<?php
/*
   ЗАДАНИЕ 1
   - Создайте две целочисленные переменные $cols и $rows
   - Присвойте созданным переменным произвольные значения в диапазоне от 1 до 10
   */
$cols = 10;
$rows = 10;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения</title>
	<style>
		table {
			border: 3px solid #2c3e50;
			border-collapse: collapse;
		}

		th, td {
			padding: 8px;
			border: 1px solid #7f8c8d;
			text-align: center;
		}

		th {
			background-color: #34db74ff;
			color: white;
			font-weight: bold;
		}
		
		tr:first-child th {
			background-color: #e74c3c;
		}
		
		td {
			background-color: #ecf0f1;
		}
	</style>
</head>

<body>
	<h1>Таблица умножения</h1>
	<table>
		<?php
		/*
		   ЗАДАНИЕ 2
		   - Используя циклы отрисуйте таблицу умножения в виде HTML-таблицы на следующих условиях
			   - Число столбцов должно быть равно значению переменной $cols
			   - Число строк должно быть равно значению переменной $rows
			   -  Ячейки на пересечении столбцов и строк должны содержать значения, являющиеся произведением порядковых номеров столбца и строки
		   - Рекомендуется использовать цикл for	
		   */

		echo "<tr>\n";
		for ($i = 1; $i <= $cols; $i++) {
			echo "<th>" . $i . "</th>";
		}
		echo "</tr>\n";

		for ($i = 2; $i <= $rows; $i++) {

			echo "<tr>\n";
			echo "<th>" . $i . "</th>";

			for ($j = 2; $j <= $cols; $j++) {
				echo "<td>" . ($i * $j) . "</td>";
			}

			echo "</tr>\n";
		}

		/*
			ЗАДАНИЕ 3
			- Значения в ячейках первой строки и первого столбца должны быть отрисованы полужирным шрифтом и выровнены по центру ячейки
			- Фоновый цвет ячеек первой строки и первого столбца должен быть отличным от фонового цвета таблицы
			*/
		?>
	</table>
</body>

</html>