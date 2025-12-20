<?php
	/*
	ЗАДАНИЕ 1
	- Опишите функцию getMenu()
	- Задайте для функции первый аргумент $menu, в него будет передаваться массив, содержащий структуру меню
	- Задайте для функции второй аргумент $vertical со значением по умолчанию равным true. Данный параметр указывает, каким образом будет отрисовано меню - вертикально или горизонтально
	- Добавьте в объявлние функции описание типов аргументов
	
	ЗАДАНИЕ 2
	- Откройте файл menu.php
	- Скопируйте код, который создает массив $leftMenu и вставьте скопированный код в данный документ
	- Скопируйте код, который отрисовывает меню
	- Вставьте скопированный код в тело функции getMenu()
	- Измените код таким образом, чтобы меню отрисовывалась в зависимости от входящих параметров $menu и $vertical
	- Добавьте описание функции getMenu() с помощью стандарта PHPDoc https://ru.wikipedia.org/wiki/PHPDoc
	*/
	
	/**
	 * Функция для отрисовки меню
	 * @param array $menu Массив с элементами меню
	 * @param bool $vertical Отрисовывать меню вертикально (true) или горизонтально (false)
	 * @return void
	 */
	function getMenu(array $menu, bool $vertical = true): void {
		$class = $vertical ? 'vertical' : 'horizontal';
		
		echo '<ul style="list-style: none; margin: 0; padding: 0;" class="' . $class . '">';
		
		foreach ($menu as $item) {
			$style = $vertical ? '' : 'style="display: inline; padding: 5px;"';
			echo '<li ' . $style . '><a href="' . $item['href'] . '">' . $item['link'] . '</a></li>';
		}
		
		echo '</ul>';
	}
	
	$leftMenu = [
		['link' => 'Домой', 'href' => 'index.php'],
		['link' => 'О нас', 'href' => 'about.php'],
		['link' => 'Контакты', 'href' => 'contact.php'],
		['link' => 'Таблица умножения', 'href' => 'table.php'],
		['link' => 'Калькулятор', 'href' => 'calc.php']
	];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Меню</title>
</head>
<body>
	<h1>Меню</h1>
	<?php
	/*
	ЗАДАНИЕ 3
	- Отрисуйте вертикальное меню вызывая функцию getMenu() с одним параметром
	*/
	echo '<h2>Вертикальное меню:</h2>';
	getMenu($leftMenu);
	
	/*
	ЗАДАНИЕ 4
	- Отрисуйте горизонтальное меню вызывая функцию getMenu() со вторым параметром равным false
	*/
	echo '<h2>Горизонтальное меню:</h2>';
	getMenu($leftMenu, false);
	?> 
</body>
</html>