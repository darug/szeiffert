<?php
session_name("paci.php");
//session_start('paci.php');
include ('config/databasepaci.php');
include ('setarrayspaci.php');
include_once ('form/form_helpers.php');
include ('form/validation.php');
include ('form/form_stat1.php');
include ('mysql/mysqli_connect.php');
include ('mysql/mysqli_lekerdez.php'); //l() függvény, gyakorlatilag a mysql_query() rövidítése
?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php  $f=explode("/",$_SERVER["REQUEST_URI"]);
 if($f[1]=="dem"){ $rt="/dem/"; }
  else{ $rt=""; }
?><title>paci.php Kérdőív statisztika</title>
<link href="<?php echo $rt; ?>default.css" rel="stylesheet" type="text/css" /> 
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo $rt; ?>css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $rt; ?>css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo $rt; ?>css/ie.css" media="screen, projection" />
	<![endif]-->

<!--	<link rel="stylesheet" type="text/css" href="<?php echo $rt; ?>css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $rt; ?>css/form.css" />
	<script src="<?php echo $rt; ?>js/jquery-1.10.1.min.js"></script><!-- jquery 
	<script src="<?php echo $rt; ?>js/highcharts.js"></script><!-- highcharts 
	<script src="<?php echo $rt; ?>js/modules/exporting.js"></script>
	<script type="text/javascript" src="<?php echo $rt; ?>js/main.js"></script>
	<script type="text/javascript" src="<?php echo $rt; ?>js/pie.js"></script></head><!-- pie -->

<h1>Kérdőív páciensek számára
 statisztika</h1><?php $select="SELECT * from `paci` ;";
			if($lis=mysqli_query($mysqli,$select)){
			$sum=mysqli_num_rows($lis);} else {$sum=0;} ?>
			<h2>Kitöltött kérdőívek száma: <?php echo $sum; ?></h2><fieldset>
<legend align="center"><B> &nbsp<b> Tájékoztatás </b>
&nbsp </B></legend><font color="black"><b><center> Az adatvédelmi tájékoztató <a href=<?php echo Yii::app()->request->baseUrl."/".Yii::app()->params['orvos']; ?>/site/avnyil target=_blank> itt olvasható!</a> Kérdésekre adott válaszaikat előre is köszönjük! DD Standard Kft.</center></b>
</font></fieldset>
<fieldset>
<legend align="center"><B> &nbsp <B>Gyermek- és háziorvos honlappal kapcsolatos kérdések </B> 
&nbsp </B></legend><font color="black"><b>Az önök válaszai alapján felmért igényekkel szeretnénk biztatni az orvosokat arra, hogy legyen honlapjuk.&nbsp</b> &nbspKérjük, hogy a *-gal jelölt mezőket lehetőleg töltsék ki!<br><br> 
</font><?php
$i=0;
echo Inputstat($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$db_tablanev_table,$mysqli);
?>
<br><?php
$i=1;
echo Inputstat($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$db_tablanev_table,$mysqli);
?>
<br><?php
$i=2;
echo Inputstat($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$db_tablanev_table,$mysqli);
?>
<br><?php
$i=3;
echo Inputstat($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$db_tablanev_table,$mysqli);
?>
<br><?php
$i=0;
echo Radiostat($elsel[$i]['name'],$elsel[$i]['label'],$elsel[$i]['list'],$db_tablanev_table,$mysqli);
?>
<br></fieldset>
<fieldset>
<legend align="center"><B> &nbsp<B>Honlap tartalmával kapcsolatos kérdések </B>
&nbsp </B></legend><?php
$i=0;
echo Multicheckstat($elmul[$i]['name'],$elmul[$i]['label'],$elmul[$i]['list'],$db_tablanev_table,$mysqli);
?>
<br><?php
$i=4;
echo Inputstat($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$db_tablanev_table,$mysqli);
?>
<br><?php
$i=1;
echo Radiostat($elsel[$i]['name'],$elsel[$i]['label'],$elsel[$i]['list'],$db_tablanev_table,$mysqli);
?>
<br><?php
$i=5;
echo Inputstat($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$db_tablanev_table,$mysqli);
?>
<br></fieldset>
<fieldset>
<legend align="center"><B> &nbsp<B>Kitöltőhöz kapcsolható statisztikai kérdések </B>
&nbsp </B></legend><?php
$i=6;
echo Inputstat($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$db_tablanev_table,$mysqli);
?>
<br><?php
$i=2;
echo Radiostat($elsel[$i]['name'],$elsel[$i]['label'],$elsel[$i]['list'],$db_tablanev_table,$mysqli);
?>
<br></fieldset>
</form>
</body>
</html><?php

unset($_SESSION["tarolo"]);
unset($_SESSION["hiba"]);
include ("mysql/mysqli_connect.php");
/*}//if($form_valid == FALSE) else  */
//}// elso if else 
?>