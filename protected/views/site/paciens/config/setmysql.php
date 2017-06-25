<?php
/* tabla minta:
drop table IF EXISTS `proba3`;
CREATE TABLE `proba3` (
  `sorszam` int(5) NOT NULL AUTO_INCREMENT,
  `tkezdet` int(4) ,
  `tnev` varchar(32),
  PRIMARY KEY (`sorszam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci
*/
include("setarrays.php");
include_once('config/database.php');
include_once('mysql/mysql_connect.php');
$fd=fopen('setmycreate.php','w');
if (!$fd) {
    echo 'Could not open file setmycreate.php';
}else {
print('open setmycreate.php ok: '.$fd.'<br>');}
$d='<?php
include_once("config/database.php");
include_once("mysql/mysql_connect.php");
$msq="drop table IF EXISTS `$db_tablanev_table`";
if(mysql_query($msq)){print ("<B>Sikeres törlés</B><br>");} else {print("Adatbáézis kiírási hiba!!!".mysql_error())."<br>";}

$msq="CREATE TABLE  `$db_tablanev_table` (\n
`sorszam` INT( 5 ) UNSIGNED NOT NULL AUTO_INCREMENT, \n';
foreach ($eltext as $i => $value) {
    print($i." . ".$eltext[$i]['fajta']."<br>");     
switch ($eltext[$i]['fajta']) {
  
    case 't':   //text
       $d.="`".$eltext[$i]['name']."` varchar(".$eltext[$i]['size']."),\n";
       break;
    case 'n': //number
        $d.="`".$eltext[$i]['name']."`  INT(".$eltext[$i]['size']." ) UNSIGNED,\n"; 
       break;
    case 'e':  //email char-kent kezeljuk
        $d.="`".$eltext[$i]['name']."` varchar(".$eltext[$i]['size']."),\n";
        break;
    default:     
     print("$i változónál ismerertlen fajta: ".$eltext[$i]['fajta']);   
}
}
// legordulo adatok 
$lmax=0;
foreach ($elsel as $i => $value) {
    print($elsel[$i]['name']."<br>");
    foreach ($elsel[$i]['list'] as $j => $value){if(strlen($elsel[$i]['list'][$j])>$lmax){$lmax=strlen($elsel[$i]['list'][$j]);} }     
    
       $d.="`".$elsel[$i]['name']."` varchar(".$lmax."),\n";
}
  
$d.="KEY `sorszam` (`sorszam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci ;\";
if(mysql_query(\$msq)){print (\"<B>Sikeres létrehozás</B><br>\");} else {print(\"Adatbáézis kiírási hiba!!!\".mysql_error().\"<br>\");}

?>
";
if(file_put_contents('setmycreate.php', $d,FILE_APPEND)==false ){print('setarrays.php fajlba iras nem sikerult<br>');} else {print('sikeres setarrays.php fajlbairas<br>');}
fclose($fd);

  ?>
