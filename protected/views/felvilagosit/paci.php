<?php
/**
 * Ez a "felvilagosit" tábla view: paci része, amely a paciens kérdőívet írja ki.
 * 
 */
session_name("paci.php");
session_start('paci.php');
include ('config/databasepaci.php');
include ('setarrayspaci.php');
include_once ('form/form_helpers.php');
include ('form/validation.php');
include ('form/form_stat1.php');
include ('mysql/mysqli_connect.php');
include ('mysql/mysqli_lekerdez.php'); //l() függvény, gyakorlatilag a mysql_query() rövidítése
?>
<!--><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>paci.php Kérdőív</title>
<link href="default.css" rel="stylesheet" type="text/css" /><!-->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$(document).keypress(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});
});
</script>
</head>
<body><!---->
<?php If (!isset($_REQUEST['form'])){?>
 <form action="paci" method="post">
<input type="hidden" name="form" id="form" value="true" />
<h1>Kérdőív páciensek számára
</h1><?php $select="SELECT * from `paci` ;";
			if($lis=mysqli_query($mysqli,$select)){
			$sum=mysqli_num_rows($lis);} else {$sum=0;}
		//	echo "név: ".$name; ?>
			<h2>Kitöltött kérdőívek száma: <?php echo $sum; ?></h2><fieldset>
<legend align="center"><B> &nbsp<b> Tájékoztatás </b>
&nbsp </B></legend><b><center> Az adatvédelmi tájékoztató <a href=http://ddstandard.hu/adatvedelmi_nyilatkozat target=_blank> itt olvasható!</a> Kérdésekre adott válaszaikat előre is köszönjük! DD Standard Kft.</center></b>
</fieldset>
<fieldset>
<legend align="center"><B> &nbsp <B>Gyermek- és háziorvos honlappal kapcsolatos kérdések </B> 
&nbsp </B></legend><b>Az önök válaszai alapján felmért igényekkel szeretnénk biztatni az orvosokat arra, hogy legyen honlapjuk.&nbsp</b> &nbspKérjük, hogy a *-gal jelölt mezőket lehetőleg töltsék ki!<br><br> 
<?php if($name=="Házi- és Gyermekorvosok"){
$i=0;
text1($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$eltext[$i]['size']);
?>
<br><?php
$i=1;
text1($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$eltext[$i]['size']);
?>
<br><?php
$i=2;
text1($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$eltext[$i]['size']);
?>
<br><?php
$i=3;
text1($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$eltext[$i]['size']);
} else { ?>
	<input type="hidden" name="orvosnev" id="orvosnev" value="<?php echo $name ?>" /> 
	<input type="hidden" name="rend_irsz" id="rend_irsz" value="<?php echo $rend_irsz ?>" /> 
	<input type="hidden" name="rend_var" id="rend_var" value="<?php echo $rend_var ?>" />
	<input type="hidden" name="rend_cim" id="rend_cim" value="<?php echo $rend_cim ?>" />	
<?php } ?>
<br><?php
$i=0;
select($elsel[$i]['name'],$elsel[$i]['label'],$elsel[$i]['list']);
?>
<br></fieldset>
<fieldset>
<legend align="center"><B> &nbsp<B>Honlap tartalmával kapcsolatos kérdések </B>
&nbsp </B></legend><?php
$i=0;
echo multicheckbox($elmul[$i]['name'],$elmul[$i]['label'],$elmul[$i]['list']);
?>
<br><?php
$i=4;
text1($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$eltext[$i]['size']);
?>
<br><?php
$i=1;
select($elsel[$i]['name'],$elsel[$i]['label'],$elsel[$i]['list']);
?>
<br><?php
$i=5;
text1($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$eltext[$i]['size']);
?>
<br></fieldset>
<fieldset>
<legend align="center"><B> &nbsp<B>Kitöltőhöz kapcsolható statisztikai kérdések </B>
&nbsp </B></legend><?php
$i=6;
text1($eltext[$i]['name'],$eltext[$i]['label'],$eltext[$i]['class'],$eltext[$i]['size']);
?>
<br><?php
$i=2;
select($elsel[$i]['name'],$elsel[$i]['label'],$elsel[$i]['list']);
?>
<br></fieldset>
<br>

<input type="submit" value="Mentés" />
</form>
</body>
</html>

<?php

unset($_SESSION["tarolo"]);
unset($_SESSION["hiba"]);

}
/*
else{
foreach ($eltext as $i => $value) {
    $vtemp=$eltext[$i];
    text_validate($vtemp);  
}


if($form_valid == FALSE){

//visszaadom a kapott változókat az űrlapba
foreach($_REQUEST as $key => $value){

$_SESSION["tarolo"][$key]=htmlspecialchars(stripslashes($value));

}
header("location: ".$_SERVER["PHP_SELF"]);
exit;

} */
else{ 
//minden adat jó, lehet menteni
?> <form action="pacistat" method="post"><!-   yii-ben megváltoztandó!!! -->
<input type="hidden" name="form" id="form" value="true" />
<?php
echo "<p align=\"center\"><font size=\"13\" color=\"#B06000\" ><B>Adatbázis kiírás<br></B></font></p>";
$kulcs="";
$ertek="";

$i=1;

$dbarray=array();

foreach($_REQUEST as $key => $value){

$dbarray[$key]=$value;
//print($key."=>".$value.", ");
}
include_once("mysql/mysqli_connect.php");
//adatbázisba történő kiírás következik:
$kulcs="sorszam,";
$ertek="null,";
if(isset($eltext)){
foreach ($eltext as $i => $value) {
$kulcs.=$eltext[$i]["name"].",";
$ertek.="'".$_REQUEST[$eltext[$i]["name"]]."',";
}
}//if
if(isset($elsel)){
foreach ($elsel as $i => $value) {
$kulcs.=$elsel[$i]["name"].",";
$ertek.="'".$elsel[$i]["list"][$_REQUEST[$elsel[$i]["name"]]]."',";
}
}//if
If(isset($elmul)){
  foreach ($elmul as $i=>$key){
       foreach($elmul[$i]["list"] as $kulcsmul1=>$key){
       $mulname=$elmul[$i]['name']."_".$kulcsmul1;
 //      echo "$mulname $_REQUEST[$mulname] <br>";
       if($_REQUEST[$mulname]=="on"){
       $kulcs.=$elmul[$i]["name"]."_".$kulcsmul1.",";
       $ertek.="'true',";
       }
     } // foreach ($elmul
}// foreach ($elmul as $i=>$key)
}//if
if(isset($elcom)){
   foreach ($elcom as $i=>$key){
      
       $comname=$elcom[$i]["name"]."1";
       if($_REQUEST[$comname]>="0"){
       $kulcs.=$comname.",";
       $ertek.=substr($_REQUEST[$comname],1,1).",";
       }
       $comname=$elcom[$i]["name"]."2";
       if($_REQUEST[$comname]>="0"){
       $kulcs.=$comname.",";
       $ertek.=substr($_REQUEST[$comname],1,1).",";
       }
     } // foreach ($elcom
}//if
if(isset($elrad)){
foreach ($elrad as $i => $value) {
$kulcs.=$elrad[$i]["name"].",";
$ertek.="'".$_REQUEST[$elrad[$i]["name"]]."',";
}
}//if

$kulcs=substr($kulcs,0,strlen($kulcs)-1);
$ertek=substr($ertek,0,strlen($ertek)-1);
$insert="INSERT INTO `$db_tablanev_table` ($kulcs) VALUES ($ertek);";
//print($insert."<br>");
if(mysqli_query($mysqli,$insert)){print ("<B>Sikeres adatbevitel! Köszönjük a kitöltést!!!</B><br>DD Standard Kft");} else {
print("<font color=\"red\">Adatbázis kiírási hiba!!! ".mysqli_error($mysqli)." </font><br>Köszönjük a kitöltést!<br>DD Standard Kft");}
?>
<br><br>
<input type="submit" value="Tovább a statisztikai összegzés oldalra" />
<!--
<b>Hogyan tovább? </b>
<SELECT NAME="HT">
<OPTION>folytat
<OPTION>kilép
<OPTION SELECTED>folytat
</SELECT> 
<br><input type="submit" value="OK" />
-->
<?php


include ("mysql/mysqli_connect.php");
/*}//if($form_valid == FALSE) else  */
}// elso if else 
?>