<?php
	/*
	ЗАДАНИЕ 1
	- Создайте строковую переменную $login и присвойте ей значение ' User '
	- Создайте строковую переменную $password и присвойте ей значение 'megaP@ssw0rd'
	- Создайте строковую переменную $name и присвойте ей значение 'иван'
	- Создайте строковую переменную $email и присвойте ей значение 'ivan@petrov.ru'
	- Создайте строковую переменную $code и присвойте ей значение '<?=$login?>'
	*/
	
	$login = ' User ';
	$password = 'megaP@ssw0rd';
	$name = 'иван';
	$email = 'ivan@petrov.ru';
	$code = '<?=$login?>';
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
</head>
<body>
	<h1>Функции обработки строк</h1>
	
<?php
	/*
	ЗАДАНИЕ 2
	- Используя строковые функции, удалите пробельные символы в начале и конце переменной $login, а также сделайте все символы строчными (малыми)
	- Проверьте значение переменной $password на сложность: пароль должен содержать минимум одну заглавную латинскую букву, одну строчную и одну цифру, а длина должна быть не меньше 8 символов. Оформите полученный код в виде пользовательской функции.
	- Используя строковые функции, сделайте первый символ значения переменной $name прописной (большой)
	- Используя функцию фильтрации переменных проверьте корректность значения $email
	- Используя строковые функции выведите значение переменной $code в браузер в том же виде как она задана в коде
	*/
	
	echo '<h2>1. Обработка логина:</h2>';
	echo '<p>Исходный логин: "' . $login . '"</p>';
	
	$login = trim($login);
	$login = mb_strtolower($login);
	echo '<p>Обработанный логин: "' . $login . '"</p>';
	
	echo '<h2>2. Проверка сложности пароля:</h2>';
	
	function checkPasswordStrength(string $password): bool {
		if (strlen($password) < 8) {
			return false;
		}
		
		if (!preg_match('/[A-Z]/', $password)) {
			return false;
		}
		
		if (!preg_match('/[a-z]/', $password)) {
			return false;
		}
		
		if (!preg_match('/[0-9]/', $password)) {
			return false;
		}
		
		return true;
	}
	
	echo '<p>Пароль: "' . $password . '"</p>';
	$isStrong = checkPasswordStrength($password);
	echo '<p>Сложность пароля: ' . ($isStrong ? '✅ Достаточная' : '❌ Недостаточная') . '</p>';
	
	echo '<h3>Другие примеры проверки:</h3>';
	$testPasswords = ['weak', 'Weak1', 'StrongPass123', 'MEGApassword', '12345678', 'PASSWORD1'];
	
	echo '<ul>';
	foreach ($testPasswords as $testPass) {
		$result = checkPasswordStrength($testPass);
		echo '<li>"' . $testPass . '" - ' . ($result ? '✅' : '❌') . '</li>';
	}
	echo '</ul>';
	
	echo '<h2>3. Преобразование имени:</h2>';
	echo '<p>Исходное имя: "' . $name . '"</p>';
	
	$name = mb_strtoupper(mb_substr($name, 0, 1)) . mb_substr($name, 1);
	
	echo '<p>Имя с прописной буквы: "' . $name . '"</p>';
	
	echo '<h2>4. Проверка корректности email:</h2>';
	echo '<p>Email для проверки: "' . $email . '"</p>';
	
	$filteredEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
	
	if ($filteredEmail) {
		echo '<p>Email корректен: ✅ ' . $filteredEmail . '</p>';
	} else {
		echo '<p>Email некорректен: ❌</p>';
	}
	
	echo '<h3>Проверка других email:</h3>';
	$testEmails = ['test@example.com', 'invalid.email', 'user@domain', 'name@mail.ru', '123@456.789'];
	
	echo '<ul>';
	foreach ($testEmails as $testEmail) {
		$isValid = filter_var($testEmail, FILTER_VALIDATE_EMAIL);
		echo '<li>"' . $testEmail . '" - ' . ($isValid ? '✅' : '❌') . '</li>';
	}
	echo '</ul>';
	
	echo '<h2>5. Вывод переменной $code:</h2>';
	echo '<p>Значение переменной $code: ';
	echo htmlspecialchars($code);
	echo '</p>';
	
	echo '<h3>Разница между выводом через echo и htmlspecialchars:</h3>';
	echo '<table border="1" cellpadding="5">';
	echo '<tr><th>Метод вывода</th><th>Результат</th><th>Код</th></tr>';
	echo '<tr>';
	echo '<td>echo $code</td>';
	echo '<td>';
	echo $code;
	echo '</td>';
	echo '<td><code>&lt;?=$login?&gt;</code></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>echo htmlspecialchars($code)</td>';
	echo '<td>' . htmlspecialchars($code) . '</td>';
	echo '<td><code>&amp;lt;?=$login?&amp;gt;</code></td>';
	echo '</tr>';
	echo '</table>';
?>
</body>
</html>