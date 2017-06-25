<?php
/**
 * /dbase könyvtárban lévő dbase adatbázisokból kiolvassa az adatokat és feltölti a user és data_sor adatbázisokat
 * $user és $datasum változók a megnyitott osztályok
 */
echo "<h1>Konvertálás</h1>";
if(file_exists('dbasebvsc/euroatl.csv')){echo "Az EUROATL fájl létezik!<br>";}
else {echo "A fájlt nem találtam!<br>";}
if($ek=fopen('dbasebvsc/euroatl.csv', 'r')){echo "EUROATL megnyitás sikerült<br>";}
else {echo "EUROATL megnyitás nem sikerült<br>";}
$mezo1="";
echo $mz=fgets($ek);
$j=0;
$mz1=explode(",", $mz);
var_dump($mz1);
//$eurokod=array(array());
while ($sor=fgets($ek)) {
	echo $sor."<br>";
	$sor1=explode(",", $sor);
	for ($i=0; $i < count($sor1) ; $i++) { 
		$euroatl[$j][$i]=$sor1[$i];
	}
	$j++;
}
echo "<br><br>";
echo $euroatl[0][0]." ".$euroatl[0][1]." ".$euroatl[0][2]." ".$euroatl[0][3]." ".$euroatl[0][4]." ".$euroatl[0][5]
." ".$euroatl[0][6]." ".$euroatl[0][7]." ".$euroatl[0][8]." ".$euroatl[0][9]."<br> <br>";
fclose($ek);

if(file_exists('dbasebvsc/euroakod.csv')){echo "Az EUROKOD.dbffájl létezik! ";}
else {echo "A fájlt nem találtam!<br>";}
if($ekod=fopen('dbasebvsc/euroakod.csv', 'r')){echo "File megnyitás sikerült<br>";}
else {echo "File megnyitás nem sikerült<br>";}
$mezo=fgets($ekod);
$j=0;
$mezok=explode(",", $mezo);
var_dump($mezok);
while ($sor=fgets($ekod)) {
	echo $sor."<br>";
	$sor1=explode(",", $sor);
	for ($i=0; $i < count($mezok) ; $i++) { 
		$eurokod[$j][$i]=$sor1[$i];
	}
	$j++;
}
echo "<br><br>";
fclose($ekod);


if(file_exists('dbasebvsc/euro.csv')){echo "Az EURO fájl létezik!<br>";}
else {echo "A fájlt nem találtam!<br>";}
if($ekod2=fopen('dbasebvsc/euro.csv', 'r')){echo "EURO file megnyitás sikerült<br>";}
else {echo "EURO file megnyitás nem sikerült<br>";}
$mezo2=fgets($ekod2);
$j=0;
$mezok2=explode(",", $mezo2);
var_dump($mezok2);
//$eurokod=array(array());
while ($sor=fgets($ekod2)) {
	echo $j." ".$sor."<br>";
	$sor1=explode(",", $sor);
	for ($i=0; $i < count($mezok2) ; $i++) { 
		$euro[$j][$i]=$sor1[$i];
	}
	$counteuro=$j++;
}
echo "<br><br>";
echo var_dump($euro);
fclose($ekod2);
/// most jön a átrakás
/// első lépés
$num=count($eurokod); 
echo "Feldolgozandó nevek száma: $num<br>";
/* 
 * 
 *  $eurokod kiosztása:
 *  0 => string ''NEV'' (length=5)
 *  1 => string ''KERESZTNEV'' (length=12
 *  2 => string ''KOD'' (length=5)
 *  3 => string ''SZDATE'' (length=8)
 *  4 => string ''NEM'' (length=5)
 *  5 => string ''MINOSITES'' (length=11)
 *  6 => string ''MSZAM'' (length=7)
 *  7 => string ''TENYMSZ'
 /**
  * @var $log log file handler 
  */
$log=fopen("dbasebvsc/log.html","a"); /// log file handler
$logsor="<br>".date('Y-m-d H:i:s').", ";
for ($i=0; $i <$num ; $i++) { 
	echo $kod=$eurokod[$i][2]; // kód
	echo "<br>";
	if($user->find('id_old=:id_old',array(':id_old'=>$kod))){echo 'Ez a tétel már át lett rakva!';}
	else {echo "Ide jön az átrakás!<br>";
	$usr= new User();
	$u=$usr->findAll();
	echo "<br>User rekordszám: ".count($u)." rekorszám<br>";
	$usr->id=null;
	$usr->username=$kod;
	$usr->title=$eurokod[$i][0]." ".$eurokod[$i][1];
	$usr->veznev=$eurokod[$i][0];
	$usr->kernev=$eurokod[$i][1];
	$usr->nem=$eurokod[$i][4];
	$usr->szul_datum=$eurokod[$i][3];
	$usr->password=$kod.substr($usr->szul_datum, -5);
	$logsor.="<br>".$kod.", ".$usr->password.", ";
	$usr->csapat="BVSC_AT";
	$usr->kategoria=$eurokod[$i][5];
	$tmsz=$eurokod[$i][7];
	$usr->mesnum=$eurokod[$i][6];
	$kod9=$kod.$tmsz;
	$usr->authority=20;
	$usr->id_old=$kod;
	switch ($eurokod[$i][7]) {
		case 3:
			$inger_szelesseg=2;
			$iszam=52;
			break;
		case 4:
		case 5:
		    $inger_szelesseg=4;
			$iszam=52;
			break;
		case 6:
		case 7:
			$inger_szelesseg=6;
			$iszam=100;
			break;
		case 8:
		case 9:
			$inger_szelesseg=8;
			$iszam=100;
			break;
	}
	$usr->inger_szelesseg=$inger_szelesseg;
	$usr->inger_szam=$iszam;
	if($usr->insert()){echo $kod."Sikeres user mentés User id: {$usr->id}<br>";$logsor.="Sikeres user tábla mentés, User id: ".$usr->id.", ";}	
	else {echo $kod."Sikertelen user mentés {$usr->errors}<br>";$logsor.="Sikertelen user tábla mentés {var_dump($usr->errors)}, ";
	print_r($usr->getErrors());} 
/*
 * 0 => string 'KOD' (length=3)
  1 => string 'TMSZ' (length=4)
  2 => string 'MER_SZAM' (length=8)
  3 => string 'MINI' (length=4)
  4 => string 'MAXI' (length=4)
  5 => string 'ATLAG' (length=5)
  6 => string 'EXPO_IDO' (length=8)
  7 => string 'ATL_VEZ' (length=7)
  8 => string 'MERES_NEV' (length=9)
  9 => string 'FURESZ' (length=8)
 */  
// $euroatl feldolgozása
	$atl_ok=False;
	for($j=0;$j<count($euroatl);$j++){
		if(intval($euroatl[$j][1])==intval($tmsz) && $euroatl[$j][0]==$kod){
			$atl_ok=True;
			echo "$j = $tmsz feltétel teljesül<br>";
			if($us=$user->find('id_old=:id_old',array(":id_old"=>$kod))){
				echo "tmsz: {$euroatl[$j][1]} mini: {$euroatl[$j][3]} <br>";
				$id_user=$us->id;
				$us->mestime=$euroatl[$j][6];
				$us->pausetime=500;
				$us->mestyp=0;
				$us->mini=$euroatl[$j][3];
				$us->maxi=$euroatl[$j][4];
				$us->atlag=$euroatl[$j][5];
				if($us->save()){echo $kod."Sikeres user updatelés {print_r($us->errors())}<br>";
							$logsor.="Sikeres user tábla updatelés, ";
							}
				else{echo $kod."Sikertelen user updatelés {$us->errors}<br>";$logsor.="Sikertelen user tábla mentés {var_dump($us->errors)}, ";
					print_r($us->getErrors());}
			} // if(intval())
			else {$logsor.="Hiba: $kod-ot nem találta a user táblában!, ";
					echo "Hiba: $kod-ot nem találja a user táblában<br>";}
			
		}//if(intval(....))vége
	  }//for ($j....)vége
	  		if(!$atl_ok){$logsor.="Hiba: $kod $tmsz-ot nem találta a euroatl-ben, ";
					echo "Hiba: $kod $tmsz -t nem találja az euroatl.ben!<br>";}
		
	  
	} //if($user->find('id_old=:id_old',array(':id_old'=>$kod))) else ág (95.sorban) vége
/**
 * DatSum feltöltés
 * `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `inger_szelesseg` int(5) NOT NULL,
  `mertyp` tinyint(1) NOT NULL,
  `mestime` int(11) NOT NULL,
  `inger_start` int(11) NOT NULL,
  `inger_lepes` int(11) NOT NULL,
  `id_eredm` int(11) NOT NULL COMMENT 'data_sor->id',
  `inger_szam` int(11) NOT NULL,
  `ri` int(11) NOT NULL COMMENT 'reakcio ido atlag',
  `szoras` int(11) NOT NULL,
  `cf` int(7) NOT NULL COMMENT 'correct hibaszam',
  `ff` int(7) NOT NULL COMMENT 'false hibaszam',
  `tcorr` int(11) NOT NULL,
  `megjegyzes` varchar(64) COLLATE utf8_hungarian_ci NOT NULL,
  `lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 * 
 * EURO strukturája:
 * 0 => string 'KOD' (length=3)
 * 1 => string 'NEV' (length=3)
 * 2 => string 'KERESZTNEV' (length=10)
 * 3 => string 'KOR' (length=3)
 * 4 => string 'SZDATE' (length=6)
 * 5 => string 'MDATE' (length=5)
 * 6 => string 'MTIME' (length=5)
 * 7 => string 'MSZAM' (length=5)
 * 8 => string 'KOZER' (length=5)
 * 9 => string 'SUMC_1' (length=6)
 * 10 => string 'SUMF_1' (length=6)
 * 11 => string 'TAVG_1' (length=6)
 * 12 => string 'STD_1' (length=5)
 * 13 => string 'TCORR_1' (length=7)
 * 14 => string 'MERESI_IDO' (length=12)
 */
 echo "<br>Euro rekordszam: ".count($euro)." : ".$counteuro;
echo "<br> Kesendő kód: ".$kod.$tmsz." kod9: $kod9<br>"; 
for ($k=$counteuro ;$k>=0; $k--) { echo "$k ";
	if(rtrim($euro[$k][0])==rtrim($kod9))
	{//echo $k." ".$euro[$k][7];
		$ds=new DataSum();
 		$ds->id=null;
 		$ds->id_user=$id_user;
 		$ds->inger_szelesseg=$inger_szelesseg;
 		$ds->mertyp=1;
 	//	$ds->mestime=$us->mestime;
 		$ds->inger_start=0;
 		$ds->inger_lepes=1;
 		$ds->inger_szam=$usr->inger_szam; //Ellenőrizni 0-t ír be!!!
 		$ds->ri=$euro[$k][11];
		$ds->szoras=$euro[$k][12];
		$ds->cf=$euro[$k][9];
		$ds->ff=$euro[$k][10];
		$ds->tcorr=$euro[$k][13];
		$ds->mestime=$euro[$k][14];
		$ds->megjegyzes="gépi konvertálás: ".date('Y-m-d H:i:s');
		$ds->lastmod=$euro[$k][5]." ".$euro[$k][6];
		if($ds->insert()){echo "Sikeres DataSum mentés, id: ".$ds->id."=$k<br>";$logsor.="{$ds->id}=$k ";}	
	else {echo $kod."Sikertelen DataSum mentés: {print_r($ds->errors)}<br>";$logsor.="Sikertelen user tábla mentés {var_dump($ds->errors)}, ";
	print_r($ds->getErrors());} 		
	} else 
	{;}
}//for($k)	

}// for($i... )vége
$logsor.=",<br>";
echo "<br>A feldolgozás befejezödőtt!";
fwrite($log, $logsor);
fclose($log);
// folytatásban a DataSum tárolása következik