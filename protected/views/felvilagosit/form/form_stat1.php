<?php
/*************************
 * @fn Inputstat
 * @brief text input-ok statisztikai kijelzése 
 * 		újabb verzió a $class változó vezérli 
 * 
 * @param  $name = input fom neve
 * @param  $label = kiírandó szöveg
 * @param  $stat = statisztikai fekdolgozási mód {t,n,s,u,a} 
 * 		t =text,
 * 		n= számok összege,
 * 		s= kitöltött mezők száma,
 * 		u= eltérő mezők száma mezők száma
 * 		a= átlag
 * 		"" vagy fel nem sorolt betű = üres eredmény
 * @param $db_tablanev_table = adattábla név
 * @param $mysqli tábla tartalom (osztály)
 * @author iDG.
 * @date  2015.06.07.
 ***********************/
function Inputstat($name,$label,$stat,$db_tablanev_table,$mysqli){ // Html input tartakom kiiras
	$select="SELECT * from `$db_tablanev_table` where 1 ;";
	if($lis=$mysqli->query($select)){
	    $n=0;
		$sum=0;
		switch ($stat) {
			case 'n':
				while($lisar=$lis->fetch_assoc()){
					$sum+=$lisar[$name];
					$n++;}
					$label.=" összesen: ";
					$text.="<span class=black>".$label."</span><span class=blue>".$sum."</span>";					 
				break;
			case 'a':
				while($lisar=$lis->fetch_assoc()){
					$sum+=$lisar[$name];
					$n++;}
					$sum=$sum/$n;
					$label.=" átlaga: ";
					$text.="<span class=black>".$label."</span><span class=blue>".$sum."</span><br>";
				break;
			case 's':
				while($lisar=$lis->fetch_assoc()){
					if($lisar[$name]>''){$sum++;}
					$n++;}
					$label.=" kitöltések száma: ";
					$text.="<span class=black>".$label."</span><span class=blue>".$sum."</span>";
				break;
			case 'u':
					$label.=" különböző összesen: ";	
				//	$text =$label;
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
					if($lisar==0){ $sum="-- nincs válasz<br>";}
					if($lisar>0){$sum=$lisar."<br>";}
					$text.="<span class=black>".$label."</span><span class=blue>".$sum."</span>";	
					break;
			case 't': //case 't':
				$text.='<span class=black>'.$label.'</span><span class=blue>';
				while($lisar=$lis->fetch_assoc()){
					$text.="<br/>".$lisar[$name];
					$n++;}
				$text.='</span>';
				break;
			default:
				$text="";
		}
	
	}  else {$text.="<span class=red>adatbeolvasási hiba!</span>";}
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
 * @fn Radiostat
 * @brief  Kördiagram kiíratás
 * 
 * @param $name = digram neve
 * @param $label = kiírandó szöveg
 * @param $list = a kördiagramban megjeleníthető válaszok listája array-ben
 * @param $db_tablanev_table = adattábla neve
 * @param $mysqli tábla tartalom (osztály)
 * @author iDG
 * 
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
 * @fn Multicheckstat
 * @brief  Multicheckbox kijelzése kördiagramban
 * 
 * @param $name = digram neve
 * @param $label = kiírandó szöveg
 * @param $list = a kördiagramban megjeleníthető válaszok listája array-ben
 * @param $db_tablanev_table = adattábla neve
 * @param $mysqli tábla tartalom (osztály)
 * @author iDG
 * @date 2015.02.04. 
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