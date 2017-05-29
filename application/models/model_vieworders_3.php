<?php

class Model_vieworders_3 extends Model
{
	
	public function get_data( )
	{	
		
		// Здесь мы просто сэмулируем реальные данные.
		
// Создать короткие имена переменных
  $tireqty = $HTTP_POST_VARS['tireqty'];
  $oilqty = $HTTP_POST_VARS['oilqty'];
  $sparkqty = $HTTP_POST_VARS['sparkqty'];
  $marqty = $HTTP_POST_VARS['marqty'];
  $address = $HTTP_POST_VARS['address'];
  $fio = $HTTP_POST_VARS['fio'];
  $DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];

// Подключаемся к базе данных

$hostname="localhost";
$user="root";
$password="";
$db="lab3";

if(!$link = mysql_connect($hostname, $user, $password))

{
//echo "<br> Не могу соединиться с сервером базы данных <br>";
exit();
}
//echo "<br> Cоедининение с сервером базы данных прошло успешно <br>";

if (!mysql_select_db($db, $link))
{ 
//echo "<br> Не могу выбрать базу данных<br>";
exit();
}
else
{
//echo "<br> Выбор базы данных прошел успешно <br>";
}


$query_1="select zakaz.id, zakaz.fio, zakaz.adress, zakaz.data, tovar.id, tovar.tiregty, tovar.oilgty, tovar.sparkgty, tovar.margty FROM zakaz, tovar where  zakaz.id=tovar.id order by zakaz.data";
$result_1=mysql_query ($query_1);

//$data_2=mysql_fetch_array ($result_1);
//print_r ($data_2);

ob_start( );

?>

<table border=1 color=black width=100% height=100%>

<tr>

<td><b>№</b></td><td><b>ФИО</b></td><td><b>Адрес</b></td><td><b>Дата заказа</b></td><td><b>Гитар Fender</b></td><td><b>Медиаторов Ibanez</b></td><td><b>Струн Diaddario</b></td><td><b>Комбоусилителей Marshall</b></td>

<?

echo $data;

//$data=mysql_fetch_array($result_1);
//print_r($data);

while ($row_1=mysql_fetch_array ($result_1)) {

$data2[ ] = $row_1;

$id=$row_1["id"];
$fio=$row_1["fio"];
$adress=$row_1["adress"];
$data=$row_1["data"];
$tireqty=$row_1["tiregty"];
$oilqty=$row_1["oilgty"];
$sparkqty=$row_1["sparkgty"];
$marqty=$row_1["margty"];

?><tr>

<td> <? echo $id ?> </td><td> <? echo $fio ?> </td><td> <? echo $adress ?> </td><td> <? echo $data ?> </td><td> <? echo $tireqty ?> </td><td> <? echo $oilqty ?> </td><td> <? echo $sparkqty ?> </td><td> <? echo $marqty ?> </td>

</tr>

<?

}

?>
</table>

<?

$data = ob_get_contents ( );
//$out1 = iconv( 'UTF-8' , 'windows-1251' , $out1);
//$data = mb_convert_enconding($data, "UTF-8" , "windows-1251");

ob_end_clean( );

//echo $data1;

//echo $data1 [1];
print_r ($data2);

//return $data;
//return $result_1;

return array($data, $data2);
}

}

