<?
class Page
{

function header ()

{
	
	?>
	<html>
	<head>
	<title>Российский экономический университет имени Г.В Плеханова</title>
	
	</head>
	<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0" bottommargin="0" bgcolor="#ffffff">
	<link href="index.css" type="text/css" rel="STYLESHEET">
	<table border=1 width=100% height=20%>
	<tr>
	<td width=100% height=20% align=center> Лабораторные работы по курсу "Веб-программирование" <br> Студента группы ПИс-141: Барменко Максима Евгеньевича <br> Проверил: к.т.н. доц. Назимов А.С. </td>
	</table>
	<table border=1 width=100% >
	<td width=30% align=left valign=top>
	<a href="orderform.php"> Первая лабораторная работа </a>
	<br><br>
	<a href="orderform_2.php"> Вторая лабораторная работа </a>
	<br><br>
	<a href="orderform_3.php"> Третья лабораторная работа </a>
	<br><br>
        <a href="orderform_3_1.php">  Третья лабораторная работа (ООП) </a>
        <br><br>
	<a href="orderform_4.php"> Четвертая лабораторная работа </a>
	<br><br>
	<a href="index_5.php"> Пятая лабораторная работа </a>
	<br><br>
	<a href="index_6.php"> Шестая лабораторная работа </a>
	
	</td>
	<td width=70% align=center>

	<?
	
}

function footer()

{

	?>
	</td>
	</table>
	<table border=1 width=100% height=10%>
	<td width=100% height=10% align=center> Российский экономический университет имени Г.В Плеханова, Кафедра информационных технологий и прикладной информатики, 2017 </td>
	</table>
	</body>
	</html>
	<?
}

function orderform()
{
?>
	<html>
		<head>
			<title>Музыкальные инструменты от Боба</title>
		</head>
		<body>
			<h1>Лабораторная работа № 3 по теме сохранение и востановление данных посредством СУРБД - MySQL</h1>
			<h2>Музыкальные инструменты от Боба</h2>
			<h3>Бланк заказа</h3>
			<form action="processorder_3_1.php" method=post>
			<table border=0>
				<tr bgcolor=#cccccc>
				<td width=150>Товар</td>
				<td width=15>Количество</td>
				</tr>
				<tr>
				<td>Автопокрышки</td>
				<td align="left"><input type="text" name="tireqty" size= "3" maxlength="3"></td>
				</tr>
				<tr>
				<td>Машинное масло</td>
				<td align= "left"><input type="text" name="oilqty" size="3" maxlength="3"></td>
				</tr>
				<tr>
				<td>Свечи зажигания</td>
				<td align="left"><input type="text" name="sparkqty" size= "3" maxlength="3"></td>
				</tr>
				<tr>
				<td>ФИО клиента</td>
				<td align="left"><input type="text" name="fio" size= "40" maxlength="40"></td>
				</tr>
				<tr>
				<td>Адрес доставки</td>
				<td align="left"><input type="text" name="address" size= "40" maxlength="40"></td>
				</tr>
				<tr>
				<td colspan="2" align="center"><input type="submit" value= "Отправить заказ"></td>
				</tr>
			</table>
			</form>
		</body>
	</html>
	
<?
}

function connect()

//подключаемся к базе данных
{
	$hostname="localhost";
	$user="root";
	$password="";
	$db="lab_3";
	
	if(!$link = mysql_connect ($hostname, $user, $password))
	{
		echo "<br>Не могу соедениться с сервером базы данных<br>";
		exit();
	}
		echo "<br>Соединение с сервером базы данных прошло успешно<br>";
		
	if (!mysql_select_db($db, $link))
	{
		echo "<br>Не могу выбрать базу данных<br>";
		exit();
	}
	else
	{
		echo "<br>Выбор базы данных прошел успешно<br>";
	}

}

function processorder ($tireqty, $oilqty, $sparkqty, $fio, $address)

{
	
?>

	<html>
		<head>
		  <title>Музыкальные инструменты от Боба - Результаты заказа</title>
		</head>
		<body>
			<h1>Лабораторная работа № 3 по теме сохранение и востановление данных посредством СУРБД - MySQL</h1>
			<h2>Музыкальные инструменты от Боба</h2>
			<h3>Результаты заказа</h3>

		<?


		  $totalqty = 0;

		  $totalqty += $tireqty;

		  $totalqty += $oilqty;

		  $totalqty += $sparkqty;

		  $totalamount = 0.00;

		  define('TIREPRICE', 100);

		  define('OILPRICE', 10);

		  define('SPARKPRICE', 4);

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

			  echo $tireqty.' автопокрышек<br />';

			if ( $oilqty>0 )

			  echo $oilqty.' бутылок с маслом<br />';

			if ( $sparkqty>0 )

			  echo $sparkqty.' свечей зажигания<br />';
		  }
		  $total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE; 
		  $total=number_format($total, 2, '.', ' ');
		  echo '<P>Итого по заказу: '.$total.'</p>';
		  echo '<P>ФИО клиента: '.$fio.'</p>';
		  echo '<P>Адрес доставки: '.$address.'<br />';
		  $outputstring = $date."\t".$tireqty." автопокрышек \t".$oilqty." масла\t"

						  .$sparkqty." свечей\t\$".$total

						  ."\t Адрес доставки товара\t ". $address."\t ФИО клиента:".$fio." \n";

		$date_1=date ( "Y-m-d H:i:s",mktime ());
		$query="insert into zakaz (fio,adress,data) values ('$fio','$address','$date_1')";
		$result=mysql_query ($query);
		$query_1="select zakaz.id  from zakaz where  zakaz.fio='$fio' ";
		$result_1=mysql_query ($query_1);
		while ($row=mysql_fetch_array ($result_1)) {
		$id=$row["id"];
		}
		$query="insert into tovar (id, tiregty,oilgty,sparkgty) values ('$id','$tiregty','$oilgty','$sparkgty')";

		$result=mysql_query ($query);
		echo '<p>Заказ сохранен.</p>'; 

		?>

		<a href="vieworders_3_1.php"> Интерфейс персонала для просмотра файла заказов </a>

		</body>

	</html>

<?
}

function vieworders()
{
		//Создать короткие имена переменных
         
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
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
$query_1="select zakaz.id, zakaz.fio, zakaz.adress, zakaz.data, tovar.id, tovar.tiregty, tovar.oilgty, tovar.sparkgty FROM zakaz, tovar where  zakaz.id=tovar.id order by zakaz.data";

$result_1=mysql_query ($query_1);

?>

<table border=1 color=black width=100% height=100%>

<tr>

<td><b>№</b></td><td><b>ФИО</b></td><td><b>Адрес</b></td><td><b>Дата заказа</b></td><td><b>покрышки</b></td><td><b>масла</b></td><td><b>свечи</b></td>

<?

	while ($row_1=mysql_fetch_array ($result_1)) {

	$id=$row_1["id"];

	$fio=$row_1["fio"];

	$adress=$row_1["adress"];

	$data=$row_1["data"];

	$tireqty=$row_1["tiregty"];

	$oilqty=$row_1["oilgty"];

	$sparkqty=$row_1["sparkgty"];

?><tr>

<td> <? echo $id ?> </td><td> <? echo $fio ?> </td><td> <? echo $adress ?> </td><td> <? echo $data ?> </td><td> <? echo $tireqty ?> </td><td> <? echo $oilqty ?> </td><td> <? echo $sparkqty ?> </td>

</tr>

<?
}
?> 
	</table> 

	</body>

	</html>

<?
}
}
?>





		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		