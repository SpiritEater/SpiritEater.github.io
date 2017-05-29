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

<h1>������������ ������ � 2 �� ���� ���������� � ������������� ������ ����������� ��������� ������</h1>

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

      echo $marqty.' ��������������� Marshall<br />';

  }

  $total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE + $marqty * MARPRICE; 

  $total=number_format($total, 2, '.', ' ');

  echo '<P>����� �� ������: '.$total.'</p>';

  echo '<P>��� �������: '.$_POST['fio'].'</p>';

  echo '<P>����� ��������: '.$address.'<br />';

  $outputstring = $date."\t".$tireqty." ����� Fender \t".$oilqty." ���������� Ibanez\t"

                  .$sparkqty." ����� Diaddario\t".$marqty." ��������������� Marshall\$".$total

                  ."\t ����� �������� ������\t ". $address."\t ��� �������:" . $fio." \n";
  // ������� ���� ��� ����������

  $fp = fopen("orders.txt", 'a');

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

<a href="vieworders_2.php"> ��������� ��������� ��� ��������� ����� ������� </a>

</body>

</html>

<?php

require('footer.inc');

?>

