<?php

require('header.inc');

?>

<html>

<head>

  <title>����������� ����������� �� ���� - ���������� ������</title>

</head>

<body>

<h1>������������ ������ � 1 �� ���� �������� ������ �� ����� � �������� ��������� � �� ����������� ���������</h1>

<h2>����������� ����������� �� ����</h2>

<h3>���������� ������</h3>

<?php

  echo '<p>����� ��������� � ';

  echo date('H:i, jS F');

  echo '</p>';

  //������� �������� ����� ���������� 

  $tireqty = $HTTP_POST_VARS['tireqty'];

  $oilqty = $HTTP_POST_VARS['oilqty'];

  $sparkqty = $HTTP_POST_VARS['sparkqty'];

  $marqty = $HTTP_POST_VARS['marqty'];

  echo '<p>������ ������ ������: </p>';

  echo $tireqty . ' ����� Fender</br>';

  echo $oilqty . ' ���������� Ibanez</br>';

  echo $sparkqty . ' ����� Diaddario</br>';

  echo $marqty . ' ��������������� Marshall</br>';

  $totalqty = 0;

  $totalqty = $tireqty + $oilqty + $sparkqty + $marqty;

  echo '�������� �������: '.$totalqty.'</br>';

  $totalamount = 0.00;

  define('TIREPRICE',1000); 

  define('OILPRICE',2);

  define('SPARKPRICE',5);

  define('MARPRICE' , 500);

  $totalamount =  $tireqty * TIREPRICE 

    + $oilqty * OILPRICE

    + $sparkqty * SPARKPRICE + $marqty * MARPRICE ;

  echo '�����: $'.number_format($totalamount,3).'</br>'; 

  $taxrate = 0.10;  // ������� ����� � ������ ���������� 10%

  $totalamount = $totalamount * (1 + $taxrate);

  echo '�����, ������� ����� � ������: $'. number_format($totalamount,2).'<br>';

?>

�� ������ ��� �� ����� ��� ������� ��� ������� �����: <? echo $_POST['find']; ?>

</body>

</html>

<?php

require('footer.inc');

?>

