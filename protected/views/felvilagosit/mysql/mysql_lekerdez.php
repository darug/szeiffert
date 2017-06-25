<?php
//adatbázis lekérdezés függvény
function l($lekerdezes){//a változó helyére kell a lekérdezést beilleszteni a lekerdez függvény meghívásakor
include("config/database.php");
	$eredmeny=mysql_query($lekerdezes);
	return($eredmeny);//az $eredmeny változóra lehet hivatkozni a mysql_fetch_array használatakor
}
?>