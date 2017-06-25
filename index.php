<?php
/**********************************************
 * @brief Orvos sorszam feldolgozasa, kivagasa valamint a HOST elmentése tortenik meg ebben a fajlban
 * 
 * Az id_orvos linkben torténő felhasználásával lehet megoldani, hogy mindenki azonos kódot használhasson, 
 * de a saját id-jere vonatkozo tartalmat jelenitsen meg a program
 * 
 * A HOST vizsgálatával lehet a domaineket elválasztani:
 * 		- hazi-orvosok.hu -> hazi- gyemek- es egyebb orvosok
 * 		- e-d.hu Egészségügyi dolgozók
 * 		- terv: k-tc.hu Kontrol-C
 * 		- ter: i-dg.hu saját honlap
 * @var $_SeSSION['ho']['orvos'] = id_orvos
 * @var $file1 id_orvos atadasara szolgal
 * @var $_SESSION['ho']['orvos'] =id_ovos
 * @var $_SESSION['ho']['dname'] =HTTP_HOST  
 * @author Yii + iDG
 * @date 2016.03.04 utolso modositas
 * *********************************************/
session_name("ho");
session_start('ho');
$_SESSION['ho']['dname']=$_SERVER['HTTP_HOST'];
$yii=dirname(__FILE__).'/framework/yii.php';
// config file beállítás
switch ($_SESSION['ho']['dname']) {
		case 'hazi-orvosok.hu':
		case 'localhost':	
		case 'szeiffert.ddstandard.hu':	
			$config=dirname(__FILE__).'/protected/config/main.php';			
			break;
		case 'e-d.hu':
			$config=dirname(__FILE__).'/protected/config/maineu.php';
			break;
//ide kell beszurni  az ujabb domain kezdooldalt!!!!!!!!!!!!!!
		default:
			$config=dirname(__FILE__).'/protected/config/main.php';			
			break;
	}

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
require_once($yii);
//URL feldolgozás
$f=explode("/",$_SERVER["REQUEST_URI"]);

//sajat gep es internet kulonbseg eltuntetese
if($f[1]=="ho" || $f[1]=="hazi-orvosok" || $f[1]=="szeiffert.ddstandard.hu" || $f[1]=="localhost" ){$i=2;}else{$i=1;}
//ueres oldal atiranyitasa
if($f[$i]==''){
	switch ($_SESSION['ho']['dname']) {
		case 'hazi-orvosok.hu':
		case 'szeiffert.ddstandard.hu':
		case 'localhost':
			$f[$i]="1";
			$f[$i+1]="home";			
			break;
		case 'e-d.hu':
			$f[$i]="369";
			$f[$i+1]="klapeu";
			break;
//ide kell beszurni  az ujabb domain kezdooldalt!!!!!!!!!!!!!!
		default:
			$f[$i]="200";
			$f[$i+1]="klap";			
			break;
	}
}
//index.php kivaltasa
if($f[$i]=="index.php" && $_SESSION['ho']['orvos']>0)
	{$f[$i]=$_SESSION['ho']['orvos'];}
//kimaradt orvosszam beszurasa a linkbe
if(intval($f[$i])==False){
	if($_SESSION['ho']['orvos']>0)
		{$elozo=$_SESSION['ho']['orvos'];}
	else {	//--------- ide jon a dname vizsgalat es elag ---------------------
		if($_SESSION['ho']['dname']=="hazi-orvosok.hu" || $_SESSION['ho']['dname']=='szeiffert.ddstandard.hu' ){
			$elozo=1;
			$_SESSION['ho']['orvos']=1;}
		else{
			$elozo=369;
			$_SESSION['ho']['orvos']=369;
			}
		}	
	// előre csúsztatás
		for($j=$i;$j< count($f);$j++){
			$z=$f[$j];
			$f[$j]=$elozo;
			$elozo=$z;
		}
	}
$x=intval($f[$i]);

if(0<$x && $x<2000){ // A felső határ nőhet!!!
//session tartalom váltás, ha kell
	if($x!=$_SESSION['ho']['orvos']){$_SESSION['ho']['orvos']=$x;}
	$file1=$x; //ezt vesz át a config/main.php, ez lesz a Yii::app()->params['orvos'] értéke
	$_SERVER["REQUEST_URI"]="";
	for($j=0;$j< count($f);$j++){ // az URI-ból kivájuk az orvos paramétert, a baseUrl-hez hozzáadjuk
		if($j!=$i){$_SERVER["REQUEST_URI"].=$f[$j]."/";}}
	$_SERVER["REDIRECT_URL"]=$_SERVER["REQUEST_URI"];
    Yii::app()->request->baseUrl.=$f[$i]."/";		
}
Yii::createWebApplication($config)->run();