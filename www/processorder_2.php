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

<h1>Лабораторная работа № 2 по теме сохранение и востановление данных посредством текстовых файлов</h1>

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

      echo $marqty.' Комбоусилителей Marshall<br />';

  }

  $total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE + $marqty * MARPRICE; 

  $total=number_format($total, 2, '.', ' ');

  echo '<P>Итого по заказу: '.$total.'</p>';

  echo '<P>ФИО клиента: '.$_POST['fio'].'</p>';

  echo '<P>Адрес доставки: '.$address.'<br />';

  $outputstring = $date."\t".$tireqty." Гитар Fender \t".$oilqty." Медиаторов Ibanez\t"

                  .$sparkqty." Струн Diaddario\t".$marqty." Комбоусилителей Marshall\$".$total

                  ."\t Адрес доставки товара\t ". $address."\t ФИО клиента:" . $fio." \n";
  // Открыть файл для добавления

  $fp = fopen("orders.txt", 'a');

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

<a href="vieworders_2.php"> Интерфейс персонала для просмотра файла заказов </a>

</body>

</html>

<?php

require('footer.inc');

?>

