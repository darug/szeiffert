<?php
include_once("config/database.php");
include_once("mysql/mysql_connect.php");
$msq="drop table IF EXISTS `$db_tablanev_table`";
if(mysql_query($msq)){print ("<B>Sikeres törlés</B><br>");} else {print("Adatbáézis kiírási hiba!!!".mysql_error())."<br>";}

$msq="CREATE TABLE  `$db_tablanev_table` (\n
`sorszam` INT( 5 ) UNSIGNED NOT NULL AUTO_INCREMENT, \n`tkezdet`  INT(4 ) UNSIGNED,
`titulus` varchar(10),
`vnev` varchar(32),
`knev` varchar(24),
`lnev` varchar(40),
`szhely` varchar(40),
`szev`  INT(4 ) UNSIGNED,
`szhonap`  INT(2 ) UNSIGNED,
`sznap`  INT(2 ) UNSIGNED,
`irszam`  INT(4 ) UNSIGNED,
`varos` varchar(24),
`utca` varchar(32),
`hazszam` varchar(5),
`ekieg` varchar(12),
`email` varchar(36),
`vtel`  INT(14 ) UNSIGNED,
`mtel`  INT(14 ) UNSIGNED,
`skype` varchar(34),
`egyebmunka` varchar(40),
`kinek` varchar(40),
`csekkszam`  INT(2 ) UNSIGNED,
`megjegyzes` varchar(80),
`egyhtag` varchar(4),
`vallas` varchar(17),
`keresztseg` varchar(17),
`bermalas` varchar(17),
`hazassag` varchar(17),
`papi` varchar(17),
`munkvall` varchar(17),
`munkvallmod` varchar(25),
`jovedelem` varchar(27),
`fizmod` varchar(31),
KEY `sorszam` (`sorszam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci ;";
if(mysql_query($msq)){print ("<B>Sikeres létrehozás</B><br>");} else {print("Adatbáézis kiírási hiba!!!".mysql_error()."<br>");}

?>
