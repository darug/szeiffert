<?php
/** @var $this OrvosAlapadatController 
 *  \brief proba php programok eredmenyenek kiirasa
 * 
 * @var $dataProvider CActiveDataProvider
 * @package OrvosAlapadat_view
 */ 


 

/* @var $this orvosAlapadatController */
/* @var $cim cim */
/* @var $szoveg szoveg*/
/* @var $eredmeny eredmeny */
?>

<?php  
// adatbázis tábla kiirás, ellenőrzés és megyik honlapról a másikra átmásolás

//műköedő változat beépítésre került az epit function-ba
/*
$rend=new Rendelo;
$rec=$rend->findByPk(5); 
$tartalom=Content::model()->find('title=:title', array(':title'=>$rec->rend_nev
));
?>
<h1>Orvosi rendelő orvos lista újra generálása, ha az új és eltárolt orvosszám eltér Rendelő: <?php echo $rec->rend_nev;?> </h1>
<p><?php if($tartalom){echo "megtalálta, id= <?php echo $tartalom->id;?>";}else {echo "Nem találta!";}?></p>
<p><?php echo $tartalom->id;?> </p>
<p><?php echo $szoveg=$tartalom->content;?></p>
<span>kivágás előtti rész:</span>
<p><?php echo $ujszov=substr($szoveg,0,strpos($szoveg,"<!--K-->"));?> </p>
<span>kivágás utáni rész:</span>
<p><?php echo $ujszov=substr($szoveg,strpos($szoveg,"<!--V-->")+8,strlen($szoveg));?> </p>
<?php 
$orvos_szam=OrvosAlapadat::model()->count('Rendelo=:Rendelo',array(':Rendelo'=>$rec->rend_nev));
$regi_orvosszam=$rec->orvos_szam;
?>
<p class="blue">Rendelői táblában nyilvántartott orvos szám: <?php echo $regi_orvosszam;?>, tényleges orvos szám: <?php echo $orvos_szam;?>  </p>

<!--<h1><?php echo $cim." Orvos neve: ".$orvos;?></h1> **************************************************-->
<?php   
// működő verzió preg_match_all("(H:.\d.*,|K:.\d.*,|K:.\d.*|Sz:.\d.*,|Sz:.\d.*|Cs:.\d.*|P:.\d.*)",$szoveg,$out);echo $out;
/*$szoveg="K: 8-10, Sz: 14-16";
/* lezárva 2014.04.22.
$szoveg="K: 8-9,  P: 1-16:10, Cs: 16:15-18:35";
$szoveg="H: 08:45-11:30, K: 10-11, Sz: 10:30 - 13:45, Cs: 16:15-18, P: 11-12,";
$szoveg="H: 8  -  11:30, K: 10-11, Sz: 13:30 - 15:30, P: 11-12,";
$feltetel="((H:|K:|Sz:|Cs:|P:)(.\d.{0,5}-.{0,4}\d.{0,5}(?=,))|(H:|K:|Sz:|Cs:|P:)(.\d.{0,4}-\d.{0,4}(?=,))|(H:|K:|Sz:|Cs:|P:)(.*-\d*:*\d*))";*/
/* lezárva 2014.04.22.
$feltetel="((H:|K:|Sz:|Cs:|P:)(.\d.{0,5}-.{0,4}\d.{0,5}(?=,)){0,5})";
	preg_match_all($feltetel,$szoveg,$out);
	
 ?>
 <!--
<p><?php  echo "Szöveg: ".$szoveg; 
	echo "<br>Keresés: ".$feltetel;
	?></p>
Eredmény:
<pre><?php print_r($out); ?></pre>
<?php 
   echo "találatok száma: ".count($out[0])."<br>";
	$t1=$out[1][0];
	$n=strpos($out[0][0],":");
	$t2=$out[2][0];
	/*if($out[3][1]>""){$t3=$out[3][1];}else{$t3=$out[3][0];};
	if($out[4][1]>""){$t4=$out[4][1];}else{$t4=$out[4][0];};*/
	/* lezárva 2014.04.22.
	$t3=$out[1][1];
	$t4=$out[2][1];
	$t5=$out[1][2];
	$t6=$out[2][2];

 echo "<span class=\"blue\"> ".$t1."-".$t2."<br> ".$t3."-".$t4."<br> ".$t5."-".$t6."</span><br>";
	$rend_name=array('1de','1du','2de','2du','3de','3du','4de','4du','5de','5du','6de','6du','7de','7du');
	$rend_nap=array('H:','H:','K:','K:','Sz:','Sz','Cs','Cs','P:','P:');
/* régi
	if($t1=="H:" && intval($t2)<=12){ echo $comment=' 1de Tanácsadás: '.$t2;}
	if($t1=="H:" && intval($t2)>12 ){ echo $comment=' 1du Tanácsadás: '.$t2;}	
	if($t1=="K:" && intval($t2)<=12){ echo $comment=' 2de Tanácsadás: '.$t2;}
	if($t1=="K:" && intval($t2)>12 ){ echo $comment=' 2du Tanácsadás: '.$t2;}
	if($t1=="Sz:" && intval($t2)<=12){ echo $comment=' 3de Tanácsadás: '.$t2;}
	if($t1=="Sz:" && intval($t2)>12 ){ echo $comment=' 3du Tanácsadás: '.$t2;}
	if($t1=="Cs:" && intval($t2)<=12){ echo $comment=' 4de Tanácsadás: '.$t2;}
	if($t1=="Cs:" && intval($t2)>12 ){ echo $comment=' 4du Tanácsadás: '.$t2;}
	echo "<br>";
	if($t3=="P:" && intval($t4)<=12){ echo $comment=' 5de Tanácsadás: '.$t4;}
	if($t3=="P:" && intval($t4)>12 ){ echo $comment=' 5du Tanácsadás: '.$t4;}	
	if($t3=="K:" && intval($t4)<=12){ echo $comment=' 2de Tanácsadás: '.$t4;}
	if($t3=="K:" && intval($t4)>12 ){ echo $comment=' 2du Tanácsadás: '.$t4;}
	if($t3=="Sz:" && intval($t4)<=12){ echo $comment=' 3de Tanácsadás: '.$t4;}
	if($t3=="Sz:" && intval($t4)>12 ){ echo $comment=' 3du Tanácsadás: '.$t4;}
	if($t3=="Cs:" && intval($t4)<=12){ echo $comment=' 4de Tanácsadás: '.$t4;}
	if($t3=="Cs:" && intval($t4)>12 ){ echo $comment=' 4du Tanácsadás: '.$t4;}
	echo "<br>";
	if($t5=="P:" && intval($t6)<=12){ echo $comment=' 5de Tanácsadás: '.$t6;}
	if($t5=="P:" && intval($t6)>12 ){ echo $comment=' 5du Tanácsadás: '.$t6;}	
	if($t5=="K:" && intval($t6)<=12){ echo $comment=' 2de Tanácsadás: '.$t6;}
	if($t5=="K:" && intval($t6)>12 ){ echo $comment=' 2du Tanácsadás: '.$t6;}
	if($t5=="Sz:" && intval($t6)<=12){ echo $comment=' 3de Tanácsadás: '.$t6;}
	if($t5=="Sz:" && intval($t6)>12 ){ echo $comment=' 3du Tanácsadás: '.$t6;}
	if($t5=="Cs:" && intval($t6)<=12){ echo $comment=' 4de Tanácsadás: '.$t6;}
	if($t5=="Cs:" && intval($t6)>12 ){ echo $comment=' 4du Tanácsadás: '.$t6;} */
	/* lezárva 2014.04.22.
	echo "<br>-----------------------------------<br>";
	for($i=0;$i<10;$i+=2){
		for($j=0;$j<count($out[0]);$j++){
			if($rend_nap[$i]==$out[1][$j]){if(intval($out[2][$j])<=12){echo $rend_name[$i]." Tanácsadás: ".$out[2][$j]."<br>";}
					else {echo $rend_name[$i+1]." Tanácsadás: ".$out[2][$j]."<br>";}
			}
		}
		echo '<p class="red">---------------</p>';
	} */
?>
<p class="blue">Adatbázis összehasonlítás próba</p>
<p class="blue" aling="center">	<?php echo "tábla név: $table_name"; ?></p>
<a href="#beallit">Ugrás a beállításokra</a>
<p><?php print $uzenet; ?></p>
<!--<p class="red">szeiffert.ddstandard.hu adattábla tartalma:</p>
<table width=100%>
<tr>
	<?php 
	$m=0;
	foreach($head as $value){echo //"<th>".$value."</th>";
		$m++;
	}
	$num_mezo=$m;  ?>
</tr> -->
<?php $n=0;
/**
 * aktualisan következo id
 */
$m=1;
while($value=$szeiffert[$n]){
	//print "<tr>";
	// foreach($value as $ertek){print "<td>".$ertek."</td>";}
	$n++;
	if(($z=$value[0]-$m)>0){
		for ($i=0; $i <$z ; $i++) {$hiany[]=$m; $m++;}
		} 
		$m++;
		
	}
	$n_szeiffert=$n;
?>
<!--
</table>-->
<?php
$ered=sorozat($hiany);
?>
<p class="green"><?php echo "Szeiffert tábla: Sorok száma: ".$n_szeiffert." Hiányzó rekordok száma: ".$ered[0]." Kimaradt id-k: ".$ered[1];?> </p>
<!--<p class="red">Házi-orvosok.hu adattábla tartalma:</p>
<table width=100%>
<tr>
<?php foreach($head as $value){echo "<th>".$value."</th>";} ?>	
</tr> -->
<?php $n=0;$hiany='';
/**
 * aktualisan következo id
 */
$m=1;
while($value=$haziorvos[$n]){
	$n++;
	if(($z=$value[0]-$m)>0){
		for ($i=0; $i <$z ; $i++) {$hiany[]=$m; $m++;}
		}
		$m++;		
	}

?> <!--
</table> -->

<p class="green"><?php 
$ered=sorozat($hiany);
echo "hazi-orvosok.hu tábla: Sorok száma: ".$n." Hiányzó rekordok száma: ".$ered[0]." Kimaradt id-k: ".$ered[1];?> </p>
<p class="red" align=center>Összehasonlító tábla</p>
<p class="blue">Az első sorban a szeiffert, második sorban a hazi-orvosok.hu adatai láthatok. Jelőlések: <span class=green>egyenlő: = </span>; 
Eltérés: <span class=red>Egymás alatt mind a két tartalom látható </span>; <span class=blue>Hiányzik: !! </span></p>
<table width=100%>
<tr>
	
<?php 
$n=0;
foreach($head as $value){echo "<th>".$value."<br>".$n."</th>";$n++;} ?>	
</tr>
<?php for($i=0;$i<$n_szeiffert;$i++){
	echo "<tr>";
	for($j=0;$j<$num_mezo;$j++){
		$temp.="<td>".$szeiffert[$i][$j]."<br>";
		if(isset($haziorvos[$i][$j])){
			if($szeiffert[$i][$j]==$haziorvos[$i][$j]){$temp.="<span class=green><B> = </B></span></td>";}
				else {$temp.="<span class=red><B>".$haziorvos[$i][$j]."</b></span></td>";}
		} else {$temp.="<span class=blue> !! </span></td>";}
		echo $temp;
		$temp=""; 
		}
	echo "</tr>";
} ?>

</table>
<pre>
<?php //echo var_dump($head[0]); ?>	
</pre>	
<pre>
<?php //echo $head; ?>
</pre>	
 <form action="proba" method="post">
<input type="hidden" name="form" id="form" value="true" />
<a name="beallit"></a><p class=red>Adatbázis utasítás kiadása</p></a>
	<label for="table:name">Válasszon táblát: </label>
	<select name="table_name" id="table_name">
		<option value="orvos" <?php if($req['table_name']=="orvos"){print "selected";} ?>>Orvos</option>
		<option value="rendelo" <?php if($req['table_name']=="rendelo"){print "selected";} ?>>Rendelő</option>
		<option value="user" <?php if($req['table_name']=="user"){print "selected";} ?>>Felhasználó</option>
		<option value="config" <?php if($req['table_name']=="config"){print "selected";} ?>>Config</option>
		<option value="content" <?php if($req['table_name']=="content"){print "selected";} ?>>Content</option>
		<option value="rendido" <?php if($req['table_name']=="rendido"){print "selected";} ?>>Rendelési idő</option>
		<option value="felvilagosit" <?php if($req['table_name']=="felvilagosit"){print "selected";} ?>>Tájékoztatások</option>
		<option value="uzenet" <?php if($req['table_name']=="uzenet"){print "selected";} ?>>Üzenet</option>
	</select>
<label for="muvelet">Válasszon műveletet: </label>
	<select name="muvelet" id="muvelet" >
		<option value="insert" <?php if($req['muvelet']=="insert"){print "selected";} ?> >Beszúrás</option>		
		<option value="update" <?php if($req['muvelet']=="update"){print "selected";} ?> >Frissítés</option>
	</select>
	<label for="irany"> Válasszon irányt: </label>
	<select name="irany" id="irany" >
		<option value="nincs" > </option>
		<option value="szeiffert" <?php if($req['irany']=="szeiffert"){print "selected";} ?>>hazi-orvosok -> szeiffert</option>		
		<option value="haziorvos" <?php if($req['irany']=="haziorvos"){print "selected";} ?>>szeiffert -> hazi-orvosok</option>
	</select>
	<br>Kezdő id:  <input type="text" name="kezd_id" id="kezd_id" size="6" width="6" MAXLENGTH="6" value=<?php print "\"".$req['kezd_id']."\""; ?> />
	&nbsp;&nbsp;Utolsó id:  <input type="text" name="veg_id" id="veg_id" size="6" width="6" value=<?php print "\"".$req['veg_id']."\""; ?>/>
	&nbsp;&nbsp;Mező sorszám: <input type="text" name="mezo_szam" id="mezo_szam" size="2" width="2" value=<?php print "\"".$req['mezo_szam']."\""; ?>/>
	&nbsp;&nbsp;Mező név: <input type="text" name="mezo_nev" id="mezo_nev" size="20" width="30" value=<?php print "\"".$req['mezo_nev']."\""; ?>/>
	<br><br>
	<input type="submit" value="Mentés" />
<?php

/**
 * Számjegyekből álló sorozatból tömöríti az eggyel növekvő sorozatokat.
 * @var array $hiany
 * @return $ered[0]=elem szám, $ered[1]=lista
 */
function sorozat($hiany){
	$elozo=""; $list=0;$elso=0;$nn=0;
	foreach($hiany as $key=>$val){
		if($elozo==""){$elozo=$val;} else {
	
		if($elozo==$val-1){
			if(!$list){$elso=$elozo; $elozo=$val;  $list=1;}else{$elozo=$val;}
		} else {
		if($list){$hianyzik.=$elso." - ".$elozo.", "; $list=0; $elozo=$val;} else {$hianyzik.=$val.", ";}
		}
		$nn++;
		}
	}
	if($list){$hianyzik.=$elso." - ".$elozo;}
	$ered=array($nn,$hianyzik);
	return $ered;
}
 ?>	
	