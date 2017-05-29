<?php
// Создать короткие имена переменных
  $tireqty = $HTTP_POST_VARS['tireqty'];
  $oilqty = $HTTP_POST_VARS['oilqty'];
  $sparkqty = $HTTP_POST_VARS['sparkqty'];
  $marqty = $HTTP_POST_VARS['marqty'];
  $address = $HTTP_POST_VARS['address'];
  $fio = $HTTP_POST_VARS['fio'];
  $DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];

?>
<html>
<head>
  <title>Музыкальные инструменты от Боба - Заказы клиентов</title>
</head>
<body>
<h1>Лабораторная работа № 3 по теме сохранение и востановление данных посредством СУРБД - MySQL</h1>
<h2>Музыкальные инструменты от Боба</h2>
<h3>Заказы клиентов</h3>

<?

echo $data [0];

//echo $data[0];

//print_r ($data[1]);

print_r ($data[1]);

?>

</body>
</html>