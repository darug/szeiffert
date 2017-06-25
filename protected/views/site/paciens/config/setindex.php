<?php
/**
 * 
index.php fájlt állít elő a config.txt alapján
setarrays.php-t állít elő a config.txt alapján, ez hozza létre a $eltext, $elsel és $elmul tömböket,
amelyek a text input, a slect és csoportos checkbox elemeit tartalmazza.
smcreate.php-t, amelyik az adatbázis tábla létrehozását végzi
$eltext=array(''); //mező tömb
$elsel=array('');  //select tömb
$elmul=array();    // multichexbox tömb
$elrad=array();		radio gomb tömb
$d setarrays.php-be kiírandó tartalmat gyűjti
$t index.php elejére kiírandó tartalmat gyűjti
$st index.php/nev.php végére kiírandó tartalmat gyűjti
$m smcreate.php-be kiírandó tartalmat gyűjti
véglegesítve: 2011.07.14 DeGe
*/
/* @todo: 2012.06.30. DeGe
 * atalakitani, hogy:
 * -- kulon fajl es adatbazis nev genralodjon -> nev:-------OK
 * -- kerdoiv valtozok keruljenek a vezerlo fajlba -> $:--------OK
 * -- focim akarhol lehessen---------OK
 * 2015.01. kiegészítés: rögtön készüljön el a fnevstat.php file is!! 
 * kiegészítve *stat.php fajl létrehozásával 2015.01.24. DéGé
 */
 $f=explode("/",$_SERVER["REQUEST_URI"]);
 if($f[1]==dem){ $rt='/dem/'; }
  else{ $rt=''; }

include("form/form_helpers.php");
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"'."\n";
echo "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd".">\r\n"; 
echo '<html xmlns="http://www.w3.org/1999/xhtml">'."\r\n"; 
echo "<head>\r\n"; 
echo '<meta &nbsp http-equiv="content-type"&nbsp content="text/html;&nbsp charset=utf-8" />'."\n"; 

//$d a setarrays.php tartalmát gyűjti
$d="<?php
include_once ('form/form_helpers.php');
";
//setarrays.php fogja tartalmazni a mező, select és multicheckbox leíró tömböket

$fontos=array('f0'=>'&nbsp','f1'=>'1=egyáltalán nem fontos','f2'=>'2=nem fontos','f3'=>'3=normál','f4'=>'4=fontos','f5'=>'5=igen fontos');
$ertekel=array('e0'=>'&nbsp','e1'=>'1=nagyon rossz','e2'=>'2=rossz','e3'=>'3=közepes/semleges','e4'=>'4=jó','e5'=>'5=igen jó');
//radio gombokhoz:
$ertekkelradio=array("egyáltalán nem fontos","nem fontos","normál","fontos", "igen fontos");
$gyakor=array('g0'=>'0=soha','g1'=>'1=hetente','g2'=>"2=havonta",'g3'=>'3=negyedévente','g4'=>'4=félévente','g5'=>'5=évente');
//$t valtozóba gyűjtjük a kiírandó programrész elejét
$d.='$textnum=1;
$selnum=1;
$mulnum=1;
$textnumend=0;
$selnumend=0;
$mulnumend=0;
$combonum=1;
$combonumend=0;
$radnum=1;
$radnumend=0;
';
//$m változóba gyűjtjük az adatbázis kreáló programot
$m='<?php

include_once("../mysql/mysql_connect.php");
$msq="drop table IF EXISTS $db_tablanev_table";
if(mysql_query($msq)){print ("<B>Sikeres törlés</B><br>");} else {print("Adatbáézis kiírási hiba!!!".mysql_error())."<br>";}

$msq="CREATE TABLE  `$db_database`.`$db_tablanev_table` (\n
sorszam INT( 5 ) UNSIGNED NOT NULL AUTO_INCREMENT,\n';
//config.txt tartalmazza a lekérdező oldal létrehozásához szükséges összes információt, kivévé
// az adatbázis táblanevet ez a database.php fájlban található
$fr=fopen('config.txt','r');
if (!$fr) {
    echo 'Could not open file config.txt<br>';
}else {
print('config.txt ok: '.$fr.'<br>');
}

$list[]=array('');
$leg[]=array('');
$textnum=1;
$selnum=1;
$mulnum=1;
$textnumend=0;
$selnumend=0;
$mulnumend=0;
$combonum=1;
$combonumend=0;
$radnum=1;
$radnumend=0;

//$st változóba gyűjtük a végén az fnev.php-be kiírandó programrészt
//$sstat változóba gyüjtjük össze a fnevstat.php-ba írandó programrészt
//if(file_put_contents('index.php', $st,FILE_APPEND)==false ){print('1.fajlba iras nem sikerult<br>');} else {print'1.sikeres fajlbairas<br>';}
//it történik az config.txt első feldolgozása
$st=="";
$stat="";
$t="";
$i=1;
while (($buffer = fgets($fr)) !== false) {
        echo $i.': ' .$buffer.'<br>';
        //később ide még beszúrható egy általánosabb megjegyzés figyelése
        $buf = explode(":", $buffer);
 //       print($buf[1]."<br>");
        $buf[1]=substr($buffer,strpos($buffer,":")+1,strlen($buffer)-1);
        print($buf[1])."<br>";
    If(strpos($buffer,"//")===false){ 
        $z=strpos($buffer,"//");       
    switch ($buf[0]) {
        case 'nev':
            $dbas='<?php

//csatlakozási adatok
$db_host="localhost";//adatbázis szerver címe
$db_user="rcsek";//adatbázis felhasználó
$db_passwd="rcsek123";//adatbázis jelszó
$db_database="ddstandard_dem";//adatbázis neve
$db_encoding="utf8";//kapcsolat karakterkódolása
//adatbázis táblák
$db_content_table="content";';
            $dbas.="\n".'$db_tablanev_table='.'"'.rtrim($buf[1]).'"'."\n?>\n";
//            unlink('database.php');
            $fnv=rtrim($buf[1]); //fajlnev
            if($fdb=fopen('database'.$fnv.'.php','w')){echo 'Sikeres database'.$fnv.'.php fajl megnyitasa!<br>';}else{echo 'database'.$fnv.'.php fajl megnyitasa nem sikerült!<br>';}
            if(fwrite($fdb,$dbas)){echo 'sikeres fajlba iras!!<br>';}else{echo 'sikertelen fajba iras<br>';}
            fclose($fdb);
            //if(!copy("database.php",'../database.php')){print("Nem sikerült a database.php file másolás<br>");}else{echo"database.php fájl másolás sikerült!<br>";}
            $fnev=$fnv.".php";//mentési fajl nev 
            $fnevstat=$fnv."stat.php"; //stat file neve
            break;
        case '$': //változó létrehozása
            $d.=$buf[1]."\n";
            echo $n." sor: ".$buf[1]."<br>";
            break;
        case 'focim': // főcím beállítás
  //      if($i<=1){
  			$tmp='<?php $select="SELECT * from `'.$fnv.'` ;";
			if($lis=mysql_query($select)){
			$sum=mysql_num_rows($lis);} else {$sum=0;} ?>
			';
            $st=str_replace("RCSEK Kérdőív",$buf[1],$st,$count);
            if($count>0){print("title kicserélve!<br>");}
            $st.="<h1>$buf[1]</h1>";
			$st.=$tmp.'<h2>Kitöltött kérdőívek száma: <?php echo $sum; ?></h2>';
			$ststat="<h1>$buf[1] statisztika</h1>";
			$ststat.=$tmp.'<h2>Kitöltött kérdőívek száma: <?php echo $sum; ?></h2>';
  //      }
            break;
        case 'kiir'://kiirja a szöveget
            echo 'kiirando szoveg:'.$buf[1].'</font>';
            $st.=$buf[1];
			$ststat.='<font color="black">'.$buf[1].'</font>';
            break;    
        case '//':
            echo "<font color=\"red\">$i sor megjegyzes régi, kihagyva!<br></font>";
            break;   //megjegyzes, kihagyásra kerül,     
        case 'legstart':  //legend kezdőrész
            $st.="<fieldset>\n";
			$ststat.="<fieldset>\n";
            $st.='<legend align="center"><B> &nbsp'.$buf[1].'&nbsp </B></legend>';
			$ststat.='<legend align="center"><B> &nbsp'.$buf[1].'&nbsp </B></legend>';
            $list[]=$buf[0];
            $leg[]=$buf[1];
            break;
        case 'legend': // </fieldset> kirakása,
            $list[]=$buf[0];
            if($textnumend > 0){
            $textnum+=$textnumend;
            $textnumend=0;
            }
            $st.="</fieldset>\n";
			$ststat.="</fieldset>\n";
            break;
        case 'text':
            $textnumend++;
            $d.="\$eltext[]=text".$buf[1].";\n";
            $ii=$textnum+$textnumend-2;
            $st.='<?php'."\n";
            $st.="\$i=$ii;\n";
            $st.="text1(\$eltext[\$i]['name'],\$eltext[\$i]['label'],\$eltext[\$i]['class'],\$eltext[\$i]['size']);\n" ;
            $st.='?>'."\n<br>";
			$ststat.='<?php'."\n";
			$ststat.="\$i=$ii;\n";
            $ststat.="echo Inputstat(\$eltext[\$i]['name'],\$eltext[\$i]['label'],\$eltext[\$i]['class'],\$db_tablanev_table);\n" ;
            $ststat.='?>'."\n<br>";
            break;
        case 'select':
            $selnumend++; 
            $d.="\$elsel[]= array".$buf[1].";\n";    
            $ii=$selnum+$selnumend-2;
            $st.='<?php'."\n";
            $st.="\$i=$ii;\n";
            $st.="select(\$elsel[\$i]['name'],\$elsel[\$i]['label'],\$elsel[\$i]['list']);\n" ;
            $st.='?>'."\n<br>";
			$ststat.='<?php'."\n";
            $ststat.="\$i=$ii;\n";
            $ststat.="echo Radiostat(\$elsel[\$i]['name'],\$elsel[\$i]['label'],\$elsel[\$i]['list'],\$db_tablanev_table);\n" ;
            $ststat.='?>'."\n<br>";
            break;
        case 'multicheckbox':
            $mulnumend++;
            $d.="\$elmul[]= array".$buf[1].";\n";    
            $ii=$mulnum+$mulnumend-2;
            $st.='<?php'."\n";
            $st.="\$i=$ii;\n";
            $st.="multicheckbox(\$elmul[\$i]['name'],\$elmul[\$i]['label'],\$elmul[\$i]['list']);\n" ;
            $st.='?>'."\n<br>";
			//$ststat még ellenőrzésre vár!!!
			$ststat.='<?php'."\n";
            $ststat.="\$i=$ii;\n";
            $ststat.="echo Multicheckstat(\$elmul[\$i]['name'],\$elmul[\$i]['label'],\$elmul[\$i]['list'],\$db_tablanev_table);\n" ;
            $ststat.='?>'."\n<br>";
            break;
        case 'combo':
            $combonumend++;
            $d.="\$elcom[]= array".$buf[1].";\n";    
            $ii=$combonum+$combonumend-2;
            echo "cnum: $combonum $combonumend $ii <br>";
            $st.='<?php'."\n";
            $st.="\$i=$ii;\n";
            $st.="combo(\$elcom[\$i]['name'],\$elcom[\$i]['label1'],\$elcom[\$i]['list1'],\$elcom[\$i]['kerdes'],\$elcom[\$i]['label2'],\$elcom[\$i]['list2']);\n" ;
            $st.='?>'."\n<br>";
            //$ststat még kidolgozandó!!!
            break; 
		case 'radio':
            $radnumend++;
            $d.="\$elrad[]= array".$buf[1].";\n";    
            $ii=$radnum+$radnumend-2;
            $st.='<?php'."\n";
            $st.="\$i=$ii;\n";
            $st.="radio(\$elrad[\$i]['name'],\$elrad[\$i]['label'],\$elrad[\$i]['list']);\n" ;
            $st.='?>'."\n<br>";
            $ststat.='<?php'."\n";
            $ststat.="\$i=$ii;\n";
            $ststat.="echo Radiostat(\$elrad[\$i]['name'],\$elrad[\$i]['label'],\$elrad[\$i]['list'],\$db_tablanev_table);\n" ;
            $ststat.='?>'."\n<br>";
            break;
        default:     
            print('<font color="RED">'.$i.'. config.txt sorában hibás vezérlő a kettőspont előtt!! '.$z.' <br></font>');
    } //switch
    $i++;
  }// if
else{echo "<font color=\"red\">$i sor megjegyzes új, kihagyva!<br></font>";
        $i++;} //else
} //while (($buffer = fgets($fr)) !== false)
$fd=fopen('setarrays'.$fnv.'.php','w');
if (!$fd) {
    echo 'Could not open file setarrays.php';
}else {
print('239. sor: setarrays'.$fnv.'.php ok: '.$fd.'<br>');
}
//$t0 indexxx.php fajl eleje
$t0="<?php\n"; 
$t0.='session_name("'.$fnev.'");'."\n";
$t0.="session_start('".$fnev."');\n";
$t0.="include ('config/database".$fnv.".php');\n";
$t0.="include ('setarrays".$fnv.".php');\n";
$t0.="include_once ('form/form_helpers.php');\n";
$t0.="include ('form/validation.php');\n";
$t0.="include ('form/form_stat.php');\n";
$t0.="include ('mysql/mysql_connect.php');\n";
$t0.="include ('mysql/mysql_lekerdez.php'); //l() függvény, gyakorlatilag a mysql_query() rövidítése\n";
$t0.= "?>\r\n";
$t0.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"'."\n";
$t0.="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd".">\r\n"; 
$t0.='<html xmlns="http://www.w3.org/1999/xhtml">'."\r\n"; 
$t0.="<head>\r\n"; 
$t0.='<meta http-equiv="content-type" content="text/html; charset=utf-8" />'."\n"; 
$t0stat=$t0;
$t0stat.='<?php  $f=explode("/",$_SERVER["REQUEST_URI"]);
 if($f[1]==dem){ $rt="/dem/"; }
  else{ $rt=""; }
?>'; 
$t0.="<title>".$fnev." Kérdőív</title>\n";
$t0stat.="<title>".$fnev." Kérdőív statisztika</title>\n";
/*$t0stat.='<?php 
$select="SELECT * from `dtk` ;";
	if($lis=mysql_query($select)){
		$sum=mysql_num_rows($lis);}
?>';
$t0stat.='<h2><b>Kitöltött kérdőívek száma:<?php echo $sum; ?></b></h2>';*/
$t0.='<link href="default.css" rel="stylesheet" type="text/css" />'."\n"; 
$t0.='<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$(document).keypress(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});
});
</script>
';
$t0stat.='<link href="<?php echo $rt; ?>default.css" rel="stylesheet" type="text/css" /> 
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo $rt; ?>css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $rt; ?>css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo $rt; ?>css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo $rt; ?>css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $rt; ?>css/form.css" />
	<script src="<?php echo $rt; ?>js/jquery.js"></script>
	<script src="<?php echo $rt; ?>js/highcharts.js"></script>
	<script src="<?php echo $rt; ?>js/modules/exporting.js"></script>
	<script type="text/javascript" src="<?php echo $rt; ?>js/main.js"></script>';
$t0.="</head>\n";
$t0stat.="</head>\n";
$t0.="<body>\n<?php ";
$t0stat.="<body>\n";
$st0="If (!isset(\$_REQUEST['form'])){?>\r\n "; //első futás program ága
$st0.='<form action="'.$fnev.'" method="post">'."\n";
$st0.='<input type="hidden" name="form" id="form" value="true" />'."\n";
$t=$t0.$t;
$tstat=$t0stat.$tstat;
$st=$st0.$st;
$ststat=$st0stat.$ststat;
if(include_once("database".$fnv.".php")){print "295 sorban sikeres adabázis includolás!<br>";};
$fw=fopen($fnev,'w');
$fwstat=fopen($fnevstat,'w');
if (!$fw) {echo 'Could not open file '.$fnev;}
else {print($fnev.' ok: '.$fw.'<br>');}

if (!$fwstat) { echo 'Could not open file '.$fnevstat;}
else {print($fnevstat.' ok: '.$fwstat.'<br>');}

if(file_put_contents($fnev, $t,FILE_APPEND)==false ){print($fnev.' fajlba iras nem sikerult<br>');} else {print $fnev.' sikeres fajlbairas<br>';}
if(file_put_contents($fnevstat, $tstat,FILE_APPEND)==false ){print($fnevstat.' fajlba iras nem sikerult<br>');} else {print $fnevstat.' sikeres fajlbairas<br>';}
$ststat.='</form>
</body>
</html><?php

unset($_SESSION["tarolo"]);
unset($_SESSION["hiba"]);
include ("mysql/mysql_connect.php");
/*}//if($form_valid == FALSE) else  */
//}// elso if else 
?>';

$st.='<br>

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
?> <form action="'.$fnevstat.'" method="post">
<input type="hidden" name="form" id="form" value="true" />
<?php
echo "<p align=\"center\"><font size=\"13\" color=\"blue\" ><B>Adatbázis kiírás<br></B></font></p>";
$kulcs="";
$ertek="";

$i=1;

$dbarray=array();

foreach($_REQUEST as $key => $value){

$dbarray[$key]=$value;
//print($key."=>".$value.", ");
}
';
$c="'";
$c.="'";
echo "<br>$c<br>";
$d.="?>";
//localhost-nal duplikalja a '-4!!!
$d=strtr($d,$c,"'");
echo "<br>setarray.php tartalma: ".$d."<br><br>";
if(file_put_contents("setarrays".$fnv.".php", $d,FILE_APPEND)==false ){print('setarrays.php fajlba iras nem sikerult<br>');} else {print'sikeres setarrays.php fajlbairas<br>';}
fclose($fd);
echo "401. sor $fnv<br>";
if(is_file("setarrays".$fnv.".php")){include("setarrays".$fnv.".php");}
	else {echo "setarrays".$fnv.".php";} 
//ebben hozuk létre az adatbázis táblát megnyitó php kódot
$fm=fopen('smcreate.php','w');
if($fm){print("smcreate.php megnyitás sikerült<br>");}else{print("<font color=\"red\">smcreate.php megnyitás NEM sikerült!</font>");}
echo"<font color=blue size=5>Adatbázi építés kezdete:</font><br>";
$kulcs="";
$ertek="";
$kulcsrad="";
$ertekrad="";
if(isset($eltext)){
foreach ($eltext as $i => $value) {
$kulcs.=$eltext[$i]['name'].",";
$ertek.="`".$dbarray[$kulcs]."',";
switch ($eltext[$i]['fajta']) {
  
    case 't':   //text
       $m.=$eltext[$i]['name']." varchar(".$eltext[$i]['size']."),\n";
       break;
    case 'n': //number
        $m.=$eltext[$i]['name']."  INT(".$eltext[$i]['size']." ) UNSIGNED,\n"; 
       break;
    case 'e':  //email char-kent kezeljuk
        $m.=$eltext[$i]['name']." varchar(".$eltext[$i]['size']."),\n";
        break;
    default:     
     print("<font color=red>$i változónál ismerertlen fajta: ".$eltext[$i]['fajta'."</font><br>"]);   
}//switch

}//foreach
}//if
if(isset($elsel)){
foreach ($elsel as $i => $value) {
$kulcs.=$elsel[$i]['name'].",";
$ertek.="`".$dbarray[$kulcs]."',";
$lmax=0;
foreach ($elsel[$i]['list'] as $j => $value){
print($elsel[$i]['list'][$j]);
if(strlen($elsel[$i]['list'][$j])>$lmax){$lmax=strlen($elsel[$i]['list'][$j]);} }     
    
       $m.=$elsel[$i]['name']." varchar(".$lmax."),\n";
}
}//if
/*echo '<font color="red" size="12"><br>itt a gubanc!!</font><br>';
print_r($elmul);*/
If(isset($elmul)){
  foreach ($elmul as $i=>$key){
       foreach($elmul[$i]['list'] as $kulcsmul1=>$key){
       $m.=$elmul[$i]['name']."_$kulcsmul1 BOOLEAN,\n";
       print($elmul[$i]['name']."_$kulcsmul1 BOOLEAN,<break>");
       }//foreach..'list'
}//foreach
} //if
echo"----<br>";
if(isset($elcom)){
print_r($elcom);
echo"combo adatbázis feldolgozás:<br>";

foreach ($elcom as $i => $key){
 $name1=$elcom[$i]['name']."1";
 $name2=$elcom[$i]['name']."2";
echo"str($i) $name1  $name2<br>";    
       $m.=$name1."  INT(1) UNSIGNED,\n";
       $m.=$name2."  INT(1) UNSIGNED,\n";
}
}//if
//$m=substr($m,0,strlen($m)-2); //utolsó felesleges vessző elhagyása

//combo feldolgozása következik:
//$m.="\n";
//radio feldolgozása:

if(isset($elrad)){
foreach ($elrad as $i => $value) {
$kulcs.=$elrad[$i]['name'].",";
$ertek.="`".$dbarray[$kulcs]."',";
       $m.=$elrad[$i]['name']." varchar(60),\n";
    }//foreach
}//if elrad

$m.='KEY `sorszam` (`sorszam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci ;";
print($msq."<br>");
if(mysql_query($msq)){print ("<B>Sikeres létrehozás</B><br>");
$ok=true;} else {print("<font color=\"red\">Adatbázis létrehozási hiba!!!".mysql_error()."</font>");
$ok=false;}

?>';
$st.='include_once("mysql/mysql_connect.php");
//adatbázisba történő kiírás következik:
$kulcs="sorszam,";
$ertek="null,";
if(isset($eltext)){
foreach ($eltext as $i => $value) {
$kulcs.=$eltext[$i]["name"].",";
$ertek.="\'".$_REQUEST[$eltext[$i]["name"]]."\',";
}
}//if
if(isset($elsel)){
foreach ($elsel as $i => $value) {
$kulcs.=$elsel[$i]["name"].",";
$ertek.="\'".$elsel[$i]["list"][$_REQUEST[$elsel[$i]["name"]]]."\',";
}
}//if
If(isset($elmul)){
  foreach ($elmul as $i=>$key){
       foreach($elmul[$i]["list"] as $kulcsmul1=>$key){
       $mulname='."\$elmul[\$i]['name'].\"_\".\$kulcsmul1;".'
 //      echo "$mulname $_REQUEST[$mulname] <br>";
       if($_REQUEST[$mulname]=="on"){
       $kulcs.=$elmul[$i]["name"]."_".$kulcsmul1.",";
       $ertek.="\'true\',";
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
$ertek.="\'".$_REQUEST[$elrad[$i]["name"]]."\',";
}
}//if

$kulcs=substr($kulcs,0,strlen($kulcs)-1);
$ertek=substr($ertek,0,strlen($ertek)-1);
$insert="INSERT INTO `$db_tablanev_table` ($kulcs) VALUES ($ertek);";
//print($insert."<br>");
if(mysql_query($insert)){print ("<B>Sikeres adatbevitel! Köszönjük a kitöltést!!!</B><br>DD Standard Kft");} else {
print("<font color=\"red\">Adatbázis kiírási hiba!!! ".mysql_error()." </font><br>Köszönjük a kitöltést!<br>DD Standard Kft");}
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


include ("mysql/mysql_connect.php");
/*}//if($form_valid == FALSE) else  */
}// elso if else 
?>';
print($st);
if(file_put_contents($fnev, $st,FILE_APPEND)==false ){print($fnev.' fajlba iras nem sikerult<br>');} else {print"$i. sor sikeres $fnev fajlbairas<br>";}
if(file_put_contents($fnevstat, $ststat,FILE_APPEND)==false ){print($fnevstat.' fajlba iras nem sikerult<br>');} else {print"$i. sor sikeres $fnevstat fajlbairas<br>";}
if(file_put_contents('smcreate.php', $m,FILE_APPEND)==false ){print('<p color="red">smcreate.php fajlba iras nem sikerult!</p>');} else {print"smcreate.php sikeres fajlbairas<br>";}      
echo"<font color=blue size=5>Adatbázis építés vége</font><br>";
fclose($fw);
fclose($fwstat);
fclose($fr);
fclose($fm);
//adatbazis letrehozas
if(include_once("database".$fnv.".php")){print "539. sorban sikeres adabázis includolás!<br>";}
//print $db_user."<br>";
//print $db_passwd;
include("smcreate.php");
echo $db_tablanev_table."<br>";
If(ok){print"Jöhet a fájlok átmásolása!!<br>";}
if(!copy("setarrays".$fnv.".php","../setarrays".$fnv.".php")){print("Nem sikerült a setarrays$fnv.php file másolás<br>");}else{echo"setarrays$fnv.php fájl másolás sikerült!<br>";}
if(!copy($fnev,"../".$fnev)){print("Nem sikerült a(z) $fnev file másolás<br>");}else{echo"$fnev fájl másolás sikerült!<br>";}
// sikeres ellenőrzés után ide jön a $fnevstat átmásolása!!!
if(!copy($fnevstat,"../".$fnevstat)){print("Nem sikerült a(z) $fnevstat file másolás<br>");}else{echo"$fnevstat fájl másolás sikerült!<br>";}
if(!copy("ind1.php","../ind1.php")){print("Nem sikerült a file másolás<br>");}else{echo"ind1.php fájl másolás sikerült!<br>";}
if(!copy("default.css","../default.css")){print("Nem sikerült a default.css file másolás<br>");}else{echo"default.css fájl másolás sikerült!<br>";}
if(!copy("config.txt","config".$fnv.".txt")){print("Nem sikerült a config$fnv.txt file másolás<br>");}else{echo"config$fnv.txt fájl másolás sikerült!<br>";}
?>