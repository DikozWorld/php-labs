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
?>

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
  // 2) Используем getTable()
  getTable($cols, $rows, $color);
  ?>
</table>
<!-- Таблица -->
<!-- Область основного контента -->