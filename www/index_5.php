<?php 
  require ('page_5.inc');

  $homepage = new Page();

  $homepage -> SetContent('<p> Лабораторная работа по теме ООП на РНР </p>');

  $homepage -> SetTitle('Лабораторная работа по теме: ООП на РНР');

  $homepage -> Setnazvanie('Лабораторные работы по курсу "Веб-программирование" <br> Студента группы ПИc-141: Барменко Максима Евгеньевича <br> Проверил: к.т.н. доц. Назимов А.С.');

  $homepage -> Display();

?>

