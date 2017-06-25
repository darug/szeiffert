<?php
/**
 * Egymás alá kiírja az összes választ
 * $name tábla oszlop neve
 * $label kiírandó szöveg
 * $db_tablanev_table adattábla neve
 */
function Inputstat($name,$label,$class,$db_tablanev_table,$mysqli){ // Html input tartakom kiiras

	if($class=="n"){$label.=" összesen:";}	
	$text ='<font color="black">'.$label."</font>\n";
	$s=0; 
	$select="SELECT * from `$db_tablanev_table` where 1 ;";
	if($lis=$mysqli->query($select)){
	    $n=0;
		$sum=0;
		$text.="<span class=\"tered\">\n";

		while($lisar=$lis->fetch_assoc()){

				if($class=="n"){$sum+=$lisar[$name];
					$n++;} 
				else{
					$text.="<br/>".$lisar[$name];
					$n++;}
				}
		
	} else {$text.="adatbeolvasási hiba!";}

	if($n==0){ $text.="<br> -- nincs válasz\n";}
	if($class=="n" && $n>0){$text.=$sum."<br>";}
	$text.="</span>";
	return $text;
}
function Inputunique1($name,$label,$class,$db_tablanev_table,$mysqli){ // Html input tartakom kiiras

	$label.=" különböző összesen:";	
	$text =$label;
	$s=0; 
	$namelist="";
//	echo gettype($name)." ",$name."<br>";
	if(gettype($name)=="string"){$select="SELECT DISTINCT $name AS '$name' from `$db_tablanev_table` where 1 ;";}
	if(gettype($name)=="array"){
		foreach($name as $key=>$value){$namelist.=$value.",";}
		$namelist = substr($namelist, 0, -1);  
		$select="SELECT DISTINCT $namelist as $namelist from `$db_tablanev_table` where 1 ;";
	//	echo $select."<br>";	
	}
	if($lis=$mysqli->query($select)){$lisar=$lis->num_rows;}
	if($lisar==0){ $text.="<br> -- nincs válasz\n";}
	if($lisar>0){$text.=$lisar."<br>";}
	$text.="</span>";
	return $text;
}
function Inputatlag($name,$label,$class,$db_tablanev_table,$mysqli){ // Html input tartakom kiiras

	$label.=" átlaga:";	
	$text =$label;
	$s=0; 
	$sum=0;
	$select="SELECT DISTINCT $name AS '$name' from `$db_tablanev_table` where 1 ;";
	if($lis=$mysqli->query($select)){
	   	$text.="<span class=\"tered\">\n";
		foreach ($lis as $key => $value) {
				$sum+=$value[$name];
				$s++;	
		}

		$lisar=$lis->num_rows;		
	} else {$text.="adatbeolvasási hiba!";}

	if($sum==0){ $text.="<br> -- nincs válasz\n";}
	if($sum>0){$text.=$sum/$s."<br>";}
	$text.="</span>";
	return $text;
}
/**
 * Kördiagram kiíratás
 * $name tábla oszlop neve
 * $label kiírandó szöveg
 * $list a kördiagramban megjelenhető válaszok listája array-ben
 * $db_tablanev_table adattábla neve
 */
function Radiostat($name,$label,$list,$db_tablanev_table,$mysqli){
		$text='<span class="black">'.$label."</span>\n";
		$s=0;
		$ja='';
		//global $mysqli;
		$select="SELECT `$name` from `$db_tablanev_table` ;";
		foreach($list as $key => $value){$num[$key]=0;}
	if($lis=$mysqli->query($select)){
	//	echo "query sikerülta Radiostatban<br>";
		$sum=$lis->num_rows;
	//	echo $sum." sorok száma<br>";
	    $n=0;
		$text.="<span class=\"tered\">\n";
		while($lisar=$lis->fetch_assoc()){
				foreach($list as $key => $value){
					if($lisar[$name]==$value){
						$num[$key]++;
						$s++;}
				}
				$n++;
		}//while
		foreach ($list as $key => $value) {
			$ja.="['$value', $num[$key]],\n";
		}
		$s=$sum-$s;
		$ja.="['Nem töltötte ki', $s]";
		$text.="<script>	var $name = [  $ja ]; </script>
	<div id=\"container_$name\"  class=\"pie\" rel=\"$name\" style=\"display: none; min-width: 500px; height: 300px; margin: 0 auto\"></div> 
		<br>";
	}else {$text.="adatbeolvasási hiba!";}
	return $text;	 
}
/**
 * Multicheckbox kijelzése kördiagramban 2015.02.04. DeGe
 */
function Multicheckstat($name,$label,$list,$db_tablanev_table,$mysqli){
		$text='<span class="black">'.$label."</span>\n";
		$s=0;
		$ja='';
	//	global $mysqli;
		$select="SELECT * from `$db_tablanev_table` ;";
		foreach($list as $key => $value){$num[$key]=0;} 
		//echo var_dump($list, $name)."<- dump<br>";
	if($lis=$mysqli->query($select)){
		$sum=$lis->num_rows;
	    $n=0;
		$text.="<span class=\"tered\">\n";
		while($lisar=$lis->fetch_assoc()){
				foreach($list as $key => $value){
				//	$text.="<br>$name_$key=>".$lisar[$name."_".$value];
					if($lisar[$name."_".$key]!=null){
						$num[$key]++;
						$s++;}
				}
				$n++;
		}//while
		foreach ($list as $key => $value) {
			$ja.="['$value', $num[$key]],\n";
		}
		$s=$sum-$s;
		$ja.="['Nem töltötte ki', $s]";
		$text.="<script>	var $name = [  $ja ]; </script>
	<div id=\"container_$name\"  class=\"pie\" rel=\"$name\" style=\"display: none; min-width: 500px; height: 300px; margin: 0 auto\"></div> 
		<br>";
	}else {$text.="adatbeolvasási hiba!";}
	return $text;	 
}