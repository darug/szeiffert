<?php
session_name("ho");
session_start('ho');
$_SESSION['ho']['dname']=$_SERVER['HTTP_HOST'];
$yii=dirname(__FILE__).'/framework/yii.php';
if($_SESSION['ho']['dname']=="hazi-orvosok.hu"){
	$config=dirname(__FILE__).'/protected/config/main.php';} else {
	$config=dirname(__FILE__).'/protected/config/maineu.php';
}
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
//sajat gep es internet kulonbseg eltuntetese
if($f[1]=="ho"){$i=2;}else{$i=1;}
//ueres oldal atiranyitasa
if($f[$i]==''){
	$f[$i]="1";
	$f[$i+1]="home";
}
//index.php kivaltasa
if($f[$i]=="index.php" && $_SESSION['ho']['orvos']>0)
	{$f[$i]=$_SESSION['ho']['orvos'];}
//kimaradt orvosszam beszurasa a linkbe
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
/* 
echo $f[0]." ".$f[1]." ".$f[2]." ".$f[3]." i= ".$i;
echo "<br>session: ".$_SESSION['ho']['orvos']." munber? ".intval($f[$i]);
exit;// */
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