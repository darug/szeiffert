<?php
class Ellenorzes
{
/****
 * Inger adatbázis átfésülése és korrigálása ismétlés vagy rorlódás esetén
 * első menetben csakaz első 2000 rekord
 */
 /**
 * inger megfelelőség ellenőrzés
 * azonos karakterek ne szerepeljenek benne,
 * max két azonos fajta legyen egymás mellett
 */
 public  $betu_hiba=0;
 public  $number_hiba=0;
 public  $elrend_hiba='';
 public  $betuk='AFHKLMRU';
 public  $szamok='23456789';
 public	 $bclen = 8; // ha valtozik a fenti hossz valtoztasd az erteket!
 public  $new_inger="";
 
 
 /**
  * Feltárja az azonos betük és számok számát és az elrendezési (betű és szám torlódás) hibát
  */
function ellen($inger){
	$this->betu_hiba=$this->number_hiba=0;
	$this->elrend_hiba='';
	$this->new_inger="";
	$hossz=strlen($inger);
	$n=$b=$bh=$nh=0;
	$be=$ne=array();
	$ered=$elozo="";
	$nb=$eh='';
	for($j=0; $j<$hossz; $j++){
		if($inger[$j]>'9'){$betu.=$inger[$j];$nb.="0";} 
		else {$number.=$inger[$j];$nb.="1";}
	} ///------------------itt hagytam abba!!!
	$ebn=count_chars($betu,3);
	$bmax=strlen($betu)-strlen($ebn);if($bmax>0)$bmax++;
	if($bmax>0){
		$ab=" Azonos betűk száma: ".$bmax;
		$this->betu_hiba=$bmax;}
	$nbn=count_chars($number,3);
	$nmax=strlen($number)-strlen($nbn);if($nmax>0)$nmax++;
	if($nmax>0){
		$an=" Azonos számok száma: ".$nmax;
		$this->number_hiba=$nmax; }
	//1=szám, 0=betű
	$bad=array('111000','011100','001110','000111','111001','011101','101110','010111','111100','011110',
				'001111','000011','100001','110000','000101','111010','111001','000110','100010','010001','101000','011000');
	for($i=0;$i<count($bad);$i++){
		if(strcmp($nb, $bad[$i])==0){
			$eh=" Elrendezési hiba $nb ";
			$this->elrend_hiba=$i;
			break;}
	}
	$ered="betű: ".strlen($betu)." szám: ".strlen($number)."<font color=red>".$ab.$an." ".$eh."</font>";
	
	return $ered;
	}//function ellen
/**
 * Kijavítja a nem megfelelőnek találtingereket
 * -- több azonos betűt, vagy
 * -- több azonos számot, vagy
 * -- elzendezési hibákat 
 * 
 */
function javit($inger){
	$veg=strlen($inger);
	$uzenet="";
	$this->new_inger="";
	$ing=array();
	if($this->betu_hiba>0 || $this->number_hiba>0 ){// betű hiba korrigálás
		for($i=0; $i<$veg-1;$i++){
			$ing[$i]=$inger[$i]; $talal=False;
			for($j=$i+1;$j<$veg;$j++){
				if($ing[$i]==$inger[$j]){
					$ing[$i]=array($inger[$i]=>$j); $talal=True;}
			}
		if(!$talal)unset($ing[$i]);
		}
	}
		if(count($ing)==0)
		{unset($ing);} else
//Most jon a karakter csere
{//van ezonos karakter
	foreach($ing as $key=>$value){
		foreach ($value as $key1 => $value1) {
				$uzenet.=" $key1 => $value1 ";
				do{
					$r= intval(mt_rand(0, $this->bclen-1));
					$uzenet.=" vsz: $r ";
					if($key1>"9"){$bn=$this->betuk[$r];} 
					else {$bn=$this->szamok[$r];}
					$l=0;
					for($i=0;$i<$veg;$i++){
						if($bn==$inger[$i]) $l++;
					}
				} while ($l>0);			
			   $inger[$value1]=$bn;
			   $uzenet.=" javitas: $bn;";
		}
	}
	unset($key);
	
}
	if($this->number_hiba>0){// szám hiba korrigálás
		
	}
	if($this->elrend_hiba>=0){
		switch ($this->elrend_hiba) {
			case 0:
			case 3:
			case 4:
			case 21:
				$a=$inger[1];
				$b=$inger[4];
				$inger[1]=$b;
				$inger[4]=$a;
				break;
			case 1:
				$a=$inger[2];
				$b=$inger[5];
				$inger[2]=$b;
				$inger[5]=$a;
				break;
			case 2:
			case 10:
				$a=$inger[3];
				$b=$inger[0];
				$inger[3]=$b;
				$inger[0]=$a;
				break;
			case 5:
			case 18:				
				$a=$inger[0];
				$b=$inger[1];
				$inger[0]=$b;
				$inger[1]=$a;
				break;
			case 6:
				$a=$inger[5];
				$b=$inger[6];
				$inger[5]=$b;
				$inger[6]=$a;
				break;	
			case 7:
				$a=$inger[2];
				$b=$inger[3];
				$inger[2]=$b;
				$inger[3]=$a;
				break;
			case 8:
				$a=$inger[1];
				$b=$inger[5];
				$inger[1]=$b;
				$inger[5]=$a;
				break;
			case 9:
			case 12:
				$a=$inger[3];
				$b=$inger[5];
				$inger[3]=$b;
				$inger[5]=$a;
				break;
			case 11:
				$a=$inger[1];
				$b=$inger[4];
				$inger[1]=$b;
				$inger[4]=$a;
				break;
			case 13:
				$a=$inger[0];
				$b=$inger[4];
				$inger[0]=$b;
				$inger[4]=$a;
				break;
			case 14:
			case 15:
				$a=$inger[1];
				$b=$inger[5];
				$inger[1]=$b;
				$inger[5]=$a;
				break;
			case 16:
			case 17:
			case 20:
				$a=$inger[2];
				$b=$inger[3];
				$inger[2]=$b;
				$inger[3]=$a;
				break;
			case 19:
				$a=$inger[4];
				$b=$inger[5];
				$inger[4]=$b;
				$inger[5]=$a;
				break;
			default:
/*				$k = mt_rand(0,2);//Random(2);
				$a=$inger[$k];
				$b=$inger[$k+3];
				$inger[$k]=$b;
				$inger[$k+3]=$a; */
				break;
		}
	}
	$GLOBALS['new_inger']=$inger;
	$this->new_inger=$inger;
	return $inger." "."<br>$uzenet";
//	<pre>". var_dump($ing) .</pre>";
}
}//class 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<title>ingerek korrigálása</title>
</head>

<body>
<h1>Ingerek korrigálása</h1>

 <table width="100%">
 <tr>
 <th>id</th><th>régi inger</th><th>inger típus</th><th>új inger</th><th>eredmény</th>	
 </tr>
<?php	
	$ell= new Ellenorzes;
	$errnum=0;
 for ($i=1; $i <=1000 ; $i++) {
 	$new_inger=""; 
	$uzen=""; 
 	echo " <tr>";	
   $ing=$model->findByPk($i);
   $ered=$ell->ellen($ing->inger);
   $hossz=strlen($ered);
   if($hossz>42){$errnum++;
		$jav_inger=$ell->javit($ing->inger); }
   
   if($ell->new_inger>""){
   		$ing->inger=$ell->new_inger;
   		if( $ing->update()){$uzen="<font color=green>Sikeres kiírás</font>";} 
		else {$uzen="<font color=red>Sikertelen kiírás!!! {$ing->errors}</font>";}
   } 
   echo "<td>".$ing->id."</td><td>".$ing->inger."</td><td>".$ing->inger_typ."</td>
   <td>".$ered."</td><td>{$ell->betu_hiba} {$ell->number_hiba} {$ell->elrend_hiba} {$jav_inger} $uzen {$ell->new_inger}</td>";
   echo "</tr>"; 
  // echo "<pre> {var_dump($ing)}</pre>";
 
   unset($jav_inger);
  
 }
   $ha=$errnum/10;
  echo "<tr><td>Hibás sorok száma:  $errnum</td><td>Hiba arány: $ha% </td></tr>";   
?>

</tr>
</table>
</body>
