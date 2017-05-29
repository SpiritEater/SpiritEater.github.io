<?php

require('header.inc');

?>

<html>

<head>

  <title>Музыкальные инструменты от Боба - Результаты заказа</title>

</head>

<body>

<h1>Лабораторная работа № 1 по теме передача данных из формы в основную программу и их последующая обработка</h1>

<h2>Музыкальные инструменты от Боба</h2>

<h3>Результаты заказа</h3>

<?php

  echo '<p>Заказ обработан в ';

  echo date('H:i, jS F');

  echo '</p>';

  //создать короткие имена переменных 

  $tireqty = $HTTP_POST_VARS['tireqty'];

  $oilqty = $HTTP_POST_VARS['oilqty'];

  $sparkqty = $HTTP_POST_VARS['sparkqty'];

  $marqty = $HTTP_POST_VARS['marqty'];

  echo '<p>Список вашего заказа: </p>';

  echo $tireqty . ' Гитар Fender</br>';

  echo $oilqty . ' Медиаторов Ibanez</br>';

  echo $sparkqty . ' Струн Diaddario</br>';

  echo $marqty . ' Комбоусилителей Marshall</br>';

  $totalqty = 0;

  $totalqty = $tireqty + $oilqty + $sparkqty + $marqty;

  echo 'Заказано товаров: '.$totalqty.'</br>';

  $totalamount = 0.00;

  define('TIREPRICE',1000); 

  define('OILPRICE',2);

  define('SPARKPRICE',5);

  define('MARPRICE' , 500);

  $totalamount =  $tireqty * TIREPRICE 

    + $oilqty * OILPRICE

    + $sparkqty * SPARKPRICE + $marqty * MARPRICE ;

  echo 'Итого: $'.number_format($totalamount,3).'</br>'; 

  $taxrate = 0.10;  // местный налог с продаж составляет 10%

  $totalamount = $totalamount * (1 + $taxrate);

  echo 'Всего, включая налог с продаж: $'. number_format($totalamount,2).'<br>';

?>

На вопрос как Вы нашли наш магазин был получен ответ: <? echo $_POST['find']; ?>

</body>

</html>

<?php

require('footer.inc');

?>

