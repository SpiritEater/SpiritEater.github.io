<?php

require('header.inc');

?>

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

  <title>Музыкальные инструменты от Боба - Результаты заказа</title>

</head>

<body>

<h1>Лабораторная работа № 4 по теме сохранение и востановление данных посредством использования массивов и текстовых файлов</h1>

<h2>Музыкальные инструменты от Боба</h2>

<h3>Результаты заказа</h3>

<?php 

  $totalqty = 0;

  $totalqty += $tireqty;

  $totalqty += $oilqty;

  $totalqty += $sparkqty;

  $totalqty += $marqty;

  $totalamount = 0.00;

   define('TIREPRICE', 1000);

  define('OILPRICE', 2);

  define('SPARKPRICE', 5);

  define('MARPRICE', 500);

  $date = date('H:i, jS F');

   echo '<p>Заказ обработан в ';

  echo $date;

  echo '<br />';

  echo '<p>Список вашего заказа:';

  echo '<br />';

  if( $totalqty == 0 )

  {

    echo 'Вы ничего не заказали на предыдущей странице!<br />';

  }

  else

  {

    if ( $tireqty>0 )

      echo $tireqty.' Гитар Fender<br />';

    if ( $oilqty>0 )

      echo $oilqty.' Медиаторов Ibanez<br />';

    if ( $sparkqty>0 )

      echo $sparkqty.' Струн Diaddario<br />';

     if ( $marqty>0 )

      echo $sparkqty.' Комбоусилителей Marshall<br />';

  }

  $total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE + $marqty * MARPRICE; 

  $total=number_format($total, 2, '.', ' ');

   echo '<P>Итого по заказу: '.$total.'</p>';

  echo '<P>ФИО клиента: '.$fio.'</p>';

   echo '<P>Адрес доставки: '.$address.'<br />';

$products=array("$date", "$tireqty", "$oilqty", "$sparkqty", "$marqty","$total", "$address", "$fio");

//echo "$products[0] <br>";

//echo "$products[1] <br>";

//echo "$products[2] <br>";

//echo "$products[3] <br>";

//echo "$products[4] <br>";

//echo "$products[5] <br>";

//echo "$products[6] <br>";

//echo "$products[7] <br>"; */

  $outputstring = $products[0]."\t".
  $products[1]." Гитар Fender \t".
  $products[2]." Медиаторов Ibanez\t".
  $products[3]." Струн Diaddario\t".
  $products[4]." Комбоусилителей Marshsall\t\$".
  $products[5]."\t Адрес доставки товара\t". 
  $products[6]."\t ФИО клиента:\t".
  $products[7]." \n";


// Открыть файл для добавления

  $fp = fopen("orders_4.txt", 'a');

  flock($fp, LOCK_EX); 

   if (!$fp)

  {

    echo '<p><strong>В настоящий момент ваш запрос не может быть обработан.  '

         .'Пожалуйста, попытайтесь позже.</strong></p></body></html>';

    exit;

  } 

  fwrite($fp, $outputstring);

  flock($fp, LOCK_UN); 

  fclose($fp);

  echo '<p>Заказ сохранен.</p>'; 

?>

<a href="vieworders_4.php"> Интерфейс персонала для просмотра файла заказов </a>

</body>

</html>

<?php

require('footer.inc');

?>

