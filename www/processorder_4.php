<?php

require('header.inc');

?>

<?php

  // ������� �������� ����� ����������

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

  <title>����������� ����������� �� ���� - ���������� ������</title>

</head>

<body>

<h1>������������ ������ � 4 �� ���� ���������� � ������������� ������ ����������� ������������� �������� � ��������� ������</h1>

<h2>����������� ����������� �� ����</h2>

<h3>���������� ������</h3>

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

   echo '<p>����� ��������� � ';

  echo $date;

  echo '<br />';

  echo '<p>������ ������ ������:';

  echo '<br />';

  if( $totalqty == 0 )

  {

    echo '�� ������ �� �������� �� ���������� ��������!<br />';

  }

  else

  {

    if ( $tireqty>0 )

      echo $tireqty.' ����� Fender<br />';

    if ( $oilqty>0 )

      echo $oilqty.' ���������� Ibanez<br />';

    if ( $sparkqty>0 )

      echo $sparkqty.' ����� Diaddario<br />';

     if ( $marqty>0 )

      echo $sparkqty.' ��������������� Marshall<br />';

  }

  $total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE + $marqty * MARPRICE; 

  $total=number_format($total, 2, '.', ' ');

   echo '<P>����� �� ������: '.$total.'</p>';

  echo '<P>��� �������: '.$fio.'</p>';

   echo '<P>����� ��������: '.$address.'<br />';

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
  $products[1]." ����� Fender \t".
  $products[2]." ���������� Ibanez\t".
  $products[3]." ����� Diaddario\t".
  $products[4]." ��������������� Marshsall\t\$".
  $products[5]."\t ����� �������� ������\t". 
  $products[6]."\t ��� �������:\t".
  $products[7]." \n";


// ������� ���� ��� ����������

  $fp = fopen("orders_4.txt", 'a');

  flock($fp, LOCK_EX); 

   if (!$fp)

  {

    echo '<p><strong>� ��������� ������ ��� ������ �� ����� ���� ���������.  '

         .'����������, ����������� �����.</strong></p></body></html>';

    exit;

  } 

  fwrite($fp, $outputstring);

  flock($fp, LOCK_UN); 

  fclose($fp);

  echo '<p>����� ��������.</p>'; 

?>

<a href="vieworders_4.php"> ��������� ��������� ��� ��������� ����� ������� </a>

</body>

</html>

<?php

require('footer.inc');

?>

