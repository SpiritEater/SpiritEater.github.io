<?
class Page
{

function header ()

{
	
	?>
	<html>
	<head>
	<title>���������� ������������� ����������� ����� �.� ���������</title>
	
	</head>
	<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0" bottommargin="0" bgcolor="#ffffff">
	<link href="index.css" type="text/css" rel="STYLESHEET">
	<table border=1 width=100% height=20%>
	<tr>
	<td width=100% height=20% align=center> ������������ ������ �� ����� "���-����������������" <br> �������� ������ ���-141: �������� ������� ����������� <br> ��������: �.�.�. ���. ������� �.�. </td>
	</table>
	<table border=1 width=100% >
	<td width=30% align=left valign=top>
	<a href="orderform.php"> ������ ������������ ������ </a>
	<br><br>
	<a href="orderform_2.php"> ������ ������������ ������ </a>
	<br><br>
	<a href="orderform_3.php"> ������ ������������ ������ </a>
	<br><br>
        <a href="orderform_3_1.php">  ������ ������������ ������ (���) </a>
        <br><br>
	<a href="orderform_4.php"> ��������� ������������ ������ </a>
	<br><br>
	<a href="index_5.php"> ����� ������������ ������ </a>
	<br><br>
	<a href="index_6.php"> ������ ������������ ������ </a>
	
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
	<td width=100% height=10% align=center> ���������� ������������� ����������� ����� �.� ���������, ������� �������������� ���������� � ���������� �����������, 2017 </td>
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
			<title>����������� ����������� �� ����</title>
		</head>
		<body>
			<h1>������������ ������ � 3 �� ���� ���������� � ������������� ������ ����������� ����� - MySQL</h1>
			<h2>����������� ����������� �� ����</h2>
			<h3>����� ������</h3>
			<form action="processorder_3_1.php" method=post>
			<table border=0>
				<tr bgcolor=#cccccc>
				<td width=150>�����</td>
				<td width=15>����������</td>
				</tr>
				<tr>
				<td>������������</td>
				<td align="left"><input type="text" name="tireqty" size= "3" maxlength="3"></td>
				</tr>
				<tr>
				<td>�������� �����</td>
				<td align= "left"><input type="text" name="oilqty" size="3" maxlength="3"></td>
				</tr>
				<tr>
				<td>����� ���������</td>
				<td align="left"><input type="text" name="sparkqty" size= "3" maxlength="3"></td>
				</tr>
				<tr>
				<td>��� �������</td>
				<td align="left"><input type="text" name="fio" size= "40" maxlength="40"></td>
				</tr>
				<tr>
				<td>����� ��������</td>
				<td align="left"><input type="text" name="address" size= "40" maxlength="40"></td>
				</tr>
				<tr>
				<td colspan="2" align="center"><input type="submit" value= "��������� �����"></td>
				</tr>
			</table>
			</form>
		</body>
	</html>
	
<?
}

function connect()

//������������ � ���� ������
{
	$hostname="localhost";
	$user="root";
	$password="";
	$db="lab_3";
	
	if(!$link = mysql_connect ($hostname, $user, $password))
	{
		echo "<br>�� ���� ����������� � �������� ���� ������<br>";
		exit();
	}
		echo "<br>���������� � �������� ���� ������ ������ �������<br>";
		
	if (!mysql_select_db($db, $link))
	{
		echo "<br>�� ���� ������� ���� ������<br>";
		exit();
	}
	else
	{
		echo "<br>����� ���� ������ ������ �������<br>";
	}

}

function processorder ($tireqty, $oilqty, $sparkqty, $fio, $address)

{
	
?>

	<html>
		<head>
		  <title>����������� ����������� �� ���� - ���������� ������</title>
		</head>
		<body>
			<h1>������������ ������ � 3 �� ���� ���������� � ������������� ������ ����������� ����� - MySQL</h1>
			<h2>����������� ����������� �� ����</h2>
			<h3>���������� ������</h3>

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

			  echo $tireqty.' ������������<br />';

			if ( $oilqty>0 )

			  echo $oilqty.' ������� � ������<br />';

			if ( $sparkqty>0 )

			  echo $sparkqty.' ������ ���������<br />';
		  }
		  $total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE; 
		  $total=number_format($total, 2, '.', ' ');
		  echo '<P>����� �� ������: '.$total.'</p>';
		  echo '<P>��� �������: '.$fio.'</p>';
		  echo '<P>����� ��������: '.$address.'<br />';
		  $outputstring = $date."\t".$tireqty." ������������ \t".$oilqty." �����\t"

						  .$sparkqty." ������\t\$".$total

						  ."\t ����� �������� ������\t ". $address."\t ��� �������:".$fio." \n";

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
		echo '<p>����� ��������.</p>'; 

		?>

		<a href="vieworders_3_1.php"> ��������� ��������� ��� ��������� ����� ������� </a>

		</body>

	</html>

<?
}

function vieworders()
{
		//������� �������� ����� ����������
         
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>

<head>

  <title>����������� ����������� �� ���� - ������ ��������</title>

</head>

<body>

<h1>������������ ������ � 3 �� ���� ���������� � ������������� ������ ����������� ����� - MySQL</h1>

<h2>����������� ����������� �� ����</h2>

<h3>������ ��������</h3>

<?
$query_1="select zakaz.id, zakaz.fio, zakaz.adress, zakaz.data, tovar.id, tovar.tiregty, tovar.oilgty, tovar.sparkgty FROM zakaz, tovar where  zakaz.id=tovar.id order by zakaz.data";

$result_1=mysql_query ($query_1);

?>

<table border=1 color=black width=100% height=100%>

<tr>

<td><b>�</b></td><td><b>���</b></td><td><b>�����</b></td><td><b>���� ������</b></td><td><b>��������</b></td><td><b>�����</b></td><td><b>�����</b></td>

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





		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		