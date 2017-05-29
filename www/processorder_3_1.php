<?php
require('class.php');

$Page = new Page();
$Page -> header();
$Page -> connect();
$Page -> processorder ($tireqty, $oilqty, $sparkqty, $fio, $address);
$Page -> footer();

?>