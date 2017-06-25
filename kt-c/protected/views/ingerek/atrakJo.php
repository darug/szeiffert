<?php
/**
 * /dbase kĂ¶nyvtĂˇrban lĂ©vĹ‘ dbase adatbĂˇzisokbĂłl kiolvassa az adatokat Ă©s feltĂ¶lti a user Ă©s data_sor adatbĂˇzisokat
 * $user Ă©s $datasum vĂˇltozĂłk a megnyitott osztĂˇlyok
 */
echo "<h1>KonvertĂˇlĂˇs</h1>";
if(file_exists('dbase/EUROAKOD.csv')){echo "A fĂˇjl lĂ©tezik!<br>";}
else {echo "A fĂˇjlt nem talĂˇltam!<br>";}
if($ekod=fopen('dbase/EUROAKOD.csv', 'r')){echo "File megnyitĂˇs sikerĂĽlt<br>";}
else {echo "File megnyitĂˇs nem sikerĂĽlt<br>";}
$mezo=fgets($ekod);
$j=0;
$mezok=explode(",", $mezo);
var_dump($mezok);
//$eurokod=array(array());
while ($sor=fgets($ekod)) {
	echo $sor."<br>";
	$sor1=explode(",", $sor);
	for ($i=0; $i < count($mezok) ; $i++) { 
		$eurokod[$j][$i]=$sor1[$i];
	}
	$j++;
}
echo $eurokod[0][0]."<br><br>";
var_dump($eurokod);