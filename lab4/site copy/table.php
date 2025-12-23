<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Таблица умножения</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="table.css">
</head>

<?php
// 1) Обработка POST запроса
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cols = abs((int) $_POST['cols']);
    $rows = abs((int) $_POST['rows']);
    $color = trim(strip_tags($_POST['color']));
}

$cols = ($cols) ? $cols : 10;
$rows = ($rows) ? $rows : 10;
$color = ($color) ? $color : '#ffff00';

include 'inc/lib.inc.php';
include 'inc/data.inc.php';
?>

<body>
  <header>
    <!-- Верхняя часть страницы -->
    <img src="logo.png" width="130" height="80" alt="Наш логотип" class="logo">
    <span class="slogan">приходите к нам учиться</span>
    <!-- Верхняя часть страницы -->
  </header>
  <section>
    <!-- Заголовок -->
    <h1>Таблица умножения</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <!-- 3) action и 4) method POST -->
    <form action='<?=$_SERVER['REQUEST_URI']?>' method="POST">
      <label>Количество колонок: </label>
      <br>
      <!-- 5) Сохранение значений в полях -->
      <input name='cols' type='text' value='<?= $cols ?>'>
      <br>
      <label>Количество строк: </label>
      <br>
      <input name='rows' type='text' value='<?= $rows ?>'>
      <br>
      <label>Цвет: </label>
      <br>
      <input name='color' type='color' value='<?= htmlspecialchars($color) ?>' list="listColors">
      <datalist id="listColors">
        <option>#ff0000</option>
        <option>#00ff00</option>
        <option>#0000ff</option>
      </datalist>
      <br>
      <br>
      <input type='submit' value='Создать'>
    </form>
    <br>
    <!-- Таблица -->

    <table class="mult-table">
      <?php
      // 2) Изменён вызов функции
      drawTable($cols, $rows, $color);
      ?>
    </table>
    <!-- Таблица -->
    <!-- Область основного контента -->
  </section>
  <nav>
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <?php
    getMenu($menu);
    ?>
    <!-- Меню -->
  </nav>
  <footer>
    <!-- Нижняя часть страницы -->
    &copy; Супер Мега Веб-мастер, 2000 &ndash; 20xx
    <!-- Нижняя часть страницы -->
  </footer>
</body>

</html>