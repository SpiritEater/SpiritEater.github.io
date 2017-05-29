<h1>Лабораторная работа № 3 по теме сохранение и востановление данных посредством СУРБД - MySQL</h1>


<h2>Музыкальные инструменты от Боба</h2>
<h3>Бланк заказа</h3>

<form action="processorder.php" method=post>

<table border=0>
<tr bgcolor=#cccccc>
  <td width=150>Товар</td>
  <td width=15>Количество</td>
</tr>

<tr>
  <td>Гитары Fender</td>
  <td align="center"><input type="text" name="tireqty" size= "3" maxlength="3"></td>
</tr>
<tr>
  <td>Медиаторы Ibanez</td>
  <td align= "center"><input type="text" name="oilqty" size="3" maxlength="3"></td>
</tr>
<tr>
  <td>Струны Diaddario</td>
  <td align="center"><input type="text" name="sparkqty" size= "3" maxlength="3"></td>
</tr>
<tr>
  <td>Комбоусилители Marshall</td>
  <td align= "center"><input type="text" name="marqty" size="3" maxlength="3"></td>
</tr>
<tr>
  <td>Как вы нашли магазин "Музыкальные инструменты от Боба?"</td>
  <td><select name="find">
        <option value = "Я постоянный клиент">Я постоянный клиент
        <option value = "В телевизионной рекламе">В телевизионной рекламе
        <option value = "В 2ГИС">В 2ГИС
        <option value = "Порекомендовали">Порекомендовали
      </select>
  </td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" value= "Отправить заказ"></td>
</tr>
</table>
</form>