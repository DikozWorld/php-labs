/*
   пишите функцию map, принимающую массив и коллбэк, который применится к каждому элементу массива.
   Функция должна возвращать изменённый массив.
   Вызовите эту функцию, в качестве параметра передав массив с числами и стрелочную функцию, возводящую переданное число в квадрат.
*/

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Функция map и коллбэки</title>
</head>
<body>
    <h1>Функция map и коллбэки</h1>
    <?php
    function map(array $array, callable $callback): array {
        $result = [];
        
        foreach ($array as $key => $value) {
            $result[$key] = $callback($value);
        }
        
        return $result;
    }
    
    $numbers = [2, 4, 6, 8, 10];
    $square = fn($n) => $n * $n;
    $squaredNumbers = map($numbers, $square);
    
    echo '<h3>Исходный массив:</h3>';
    echo '<pre>';
    print_r($numbers);
    echo '</pre>';
    
    echo '<h3>Массив после применения функции map:</h3>';
    echo '<pre>';
    print_r($squaredNumbers);
    echo '</pre>';
    
    echo '<h3>Вычисления:</h3>';
    echo '<ul>';
    for ($i = 0; $i < count($numbers); $i++) {
        echo '<li>' . $numbers[$i] . '² = ' . $squaredNumbers[$i] . '</li>';
    }
    echo '</ul>';
    ?>
    
</body>
</html>