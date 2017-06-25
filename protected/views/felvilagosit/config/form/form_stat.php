<?php
/**
 * Egymás alá kiírja az összes választ
 *
 * @param string $name tábla oszlop neve
 * @param string $label kiírandó szöveg
 * $db_tablanev_table adattábla neve
 */
function Inputstat($name,$label,$class,$db_tablanev_table){ // Html input tartakom kiiras
	
	if($class=="n"){$label.=" összesen:";}	
	$text ='<font color="black">'.$label."</font>\n";
	$s=0; 
	$select="SELECT * from `$db_tablanev_table` where 1 ;";
	
	if($lis=mysql_query($select)){
	    $n=0;
		$sum=0;
		$text.="<span class=\"tered\">\n";
		while($lisar=mysql_fetch_assoc($lis)){
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
/**
 * Kördiagram kiíratás
 * $name tábla oszlop neve
 * $label kiírandó szöveg
 * $list a kördiagramban megjelenhető válaszok listája array-ben
 * $db_tablanev_table adattábla neve
 */
function Radiostat($name,$label,$list,$db_tablanev_table){
		$text='<span class="black">'.$label."</span>\n";
		$s=0;
		$ja='';
		$select="SELECT `$name` from `$db_tablanev_table` ;";
		foreach($list as $key => $value){$num[$key]=0;}
	if($lis=mysql_query($select)){
		$sum=mysql_num_rows($lis);
	    $n=0;
		$text.="<span class=\"tered\">\n";
		while($lisar=mysql_fetch_assoc($lis)){
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
function Multicheckstat($name,$label,$list,$db_tablanev_table){
		$text='<span class="black">'.$label."</span>\n";
		$s=0;
		$ja='';
		$select="SELECT * from `$db_tablanev_table` ;";
		foreach($list as $key => $value){$num[$key]=0;} 
		//echo var_dump($list, $name)."<- dump<br>";
	if($lis=mysql_query($select)){
		$sum=mysql_num_rows($lis);
	    $n=0;
		$text.="<span class=\"tered\">\n";
		while($lisar=mysql_fetch_assoc($lis)){
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