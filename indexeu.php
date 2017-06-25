<?php
/**********************************************
 * @brief Orvos sorszam feldolgozasa, kivagasa tortenik meg ebben a fajlban
 * 
 * Az id_orvos linkben torténő felhasználásával lehet megoldani, hogy mindenki azonos kódot használhasson, 
 * de a saját külön adatbázisban tárolt tartalmat jelenitsen meg a program
 * 
 * @var $_SeSSION['ho']['orvos'] = id_orvos
 * @var $file1 id_orvos atadasara szolgal
 *   
 * @author Yii + iDG
 * 
 * *********************************************/
session_name("ho");/**** session_name=ho */
session_start('ho');
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/maineu.php';
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
require_once($yii);

$f=explode("/",$_SERVER["REQUEST_URI"]);
/* print_r($f);
if($f[1]=='') {echo "True";} else {echo "False";}
exit; */
/*for ($k=0;$k<count($f);$k++){
	echo $f[$k]." = $k<br>";
}*/
///sajat gep es internet kulonbseg eltuntetese és a meghívó domainnév eltárolása
if($f[1]=="ho" OR $f[1]=="szeiffert" OR $f[1]=="hazi-orvosok" OR $f=="e-d"){$i=2; $_SESSION['ho']['dname']=$f[1];}else{$i=1;}
//ueres oldal atiranyitasa

if($f[$i]==''){
	$f[$i]="1";
	$f[$i+1]="home";
}
/** index.php kivaltasa  */
if($f[$i]=="indexeu.php" && $_SESSION['ho']['orvos']>0)
	{$f[$i]=$_SESSION['ho']['orvos'];}
/** kimaradt orvosszam beszurasa a linkbe */
if(intval($f[$i])==False){
	if($_SESSION['ho']['orvos']>0)
		{$elozo=$_SESSION['ho']['orvos'];}
	else {$elozo=1;
	$_SESSION['ho']['orvos']=1;	
	}
	for($j=$i;$j< count($f);$j++){
		$z=$f[$j];
		$f[$j]=$elozo;
		$elozo=$z;
	}
}
/* */
echo $f[0]." ".$f[1]." ".$f[2]." ".$f[3]." i= ".$i;
echo "<br>session: ".$_SESSION['ho']['orvos']." munber? ".intval($f[$i])." i=".$i." cont(f)=".count($f);
//exit;// */
$x=intval($f[$i]);
echo "<br>x=".$x; //kikomment!!
if(0<$x && $x<2000){ /// A felső határ nőhet!!! jelenleg: 2000 !
///session tartalom váltás, ha kell
	if($x!=$_SESSION['ho']['orvos']){$_SESSION['ho']['orvos']=$x;}
	$file1=$x; ///ezt vesz át a config/main.php, ez lesz a Yii::app()->params['orvos'] értéke
	$_SERVER["REQUEST_URI"]="";
	for($j=$i;$j< count($f);$j++){ /// az URI-ból kivájuk az orvos paramétert, a baseUrl-hez hozzáadjuk
		if(intval($f[j])!=$x){$_SERVER["REQUEST_URI"].=$f[$j]."/";}}
	$_SERVER["REDIRECT_URL"]=$_SERVER["REQUEST_URI"];
    Yii::app()->request->baseUrl.=$f[$i]."/";		
}
echo "<br>".$_SERVER["REQUEST_URI"];
exit;
Yii::createWebApplication($config)->run();