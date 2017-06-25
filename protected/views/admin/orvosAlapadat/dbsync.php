<?php
/** @var $this OrvosAlapadatController 
 *  \brief actionDbsync eredmenyenek kiirasa
 *  adatbázis tábla kiirás, ellenőrzés és megyik honlapról a másikra átmásolás
 * 
 * @var $dataProvider CActiveDataProvider
 * @package OrvosAlapadat_view
 */ 
?>
<p class="blue" aling="center">Adatbázis összehasonlítás és szinkronizálás</p>
<p class="blue" aling="center">	<?php echo "tábla név: $table_name"; ?></p>
<a href="#beallit"> &nbsp;&nbsp;&nbsp;Ugrás a beállításokra</a>
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
$hiany=array();
//while($value=$szeiffert[$n]){
  for ($j=0; $j<count($szeiffert) ; $j++) { 
      $value=$szeiffert[$j];
	//print "<tr>";
	// foreach($value as $ertek){print "<td>".$ertek."</td>";}
	$n++;
	if(($z=$value[0]-$m)>0){
		for ($i=0; $i <$z ; $i++) {$hiany[]=$m; $m++;}
		} 
		$m++;
		
	}
	$n_szeiffert=count($szeiffert);
?>
<!--
</table>-->
<?php
$ered=sorozat($hiany);
?>
<p class="green"><?php echo "Szeiffert tábla: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sorok száma: ".$n_szeiffert." Hiányzó rekordok száma: ".$ered[0]." Kimaradt id-k: ".$ered[1];?> </p>
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
//while($value=$haziorvos[$n]){
for ($j=0; $j <count($haziorvos) ; $j++) { 
	$value=$haziorvos[$j];
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
$temp="";
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
 <form action="dbsync" method="post">
<input type="hidden" name="form" id="form" value="true" />
<a name="beallit"></a><p class=red>Adatbázis utasítás kiadása</p></a>
	<label for="table:name">Válasszon táblát: </label>
	<select name="table_name" id="table_name">
		<option value="orvos" <?php if(isset($req['table_name'])=="orvos"){print "selected";} ?>>Orvos</option>
		<option value="rendelo" <?php if(isset($req['table_name'])=="rendelo"){print "selected";} ?>>Rendelő</option>
		<option value="user" <?php if(isset($req['table_name'])=="user"){print "selected";} ?>>Felhasználó</option>
		<option value="config" <?php if(isset($req['table_name'])=="config"){print "selected";} ?>>Config</option>
		<option value="content" <?php if(isset($req['table_name'])=="content"){print "selected";} ?>>Content</option>
		<option value="rendido" <?php if(isset($req['table_name'])=="rendido"){print "selected";} ?>>Rendelési idő</option>
		<option value="felvilagosit" <?php if(isset($req['table_name'])=="felvilagosit"){print "selected";} ?>>Tájékoztatások</option>
		<option value="uzenet" <?php if(isset($req['table_name'])=="uzenet"){print "selected";} ?>>Üzenet</option>
	</select>
<label for="muvelet">Válasszon műveletet: </label>
	<select name="muvelet" id="muvelet" >
		<option value="insert" <?php if(isset($req['muvelet'])=="insert"){print "selected";} ?> >Beszúrás</option>		
		<option value="update" <?php if(isset($req['muvelet'])=="update"){print "selected";} ?> >Frissítés</option>
	</select>
	<label for="irany"> Válasszon irányt: </label>
	<select name="irany" id="irany" >
		<option value="nincs" > </option>
		<option value="szeiffert" <?php if(isset($req['irany'])=="szeiffert"){print "selected";} ?>>hazi-orvosok -> szeiffert</option>		
		<option value="haziorvos" <?php if(isset($req['irany'])=="haziorvos"){print "selected";} ?>>szeiffert -> hazi-orvosok</option>
	</select>
	<br>Kezdő id:  <input type="text" name="kezd_id" id="kezd_id" size="6" width="6" MAXLENGTH="6" value=<?php print "\"".isset($req['kezd_id'])."\""; ?> />
	&nbsp;&nbsp;Utolsó id:  <input type="text" name="veg_id" id="veg_id" size="6" width="6" value=<?php print "\"".isset($req['veg_id'])."\""; ?>/>
	&nbsp;&nbsp;Mező sorszám: <input type="text" name="mezo_szam" id="mezo_szam" size="2" width="2" value=<?php print "\"".isset($req['mezo_szam'])."\""; ?>/>
	&nbsp;&nbsp;Mező név: <input type="text" name="mezo_nev" id="mezo_nev" size="20" width="30" value=<?php print "\"".isset($req['mezo_nev'])."\""; ?>/>
	<br><br>
	<input type="submit" value="Mentés" />
<?php

/**
 * Számjegyekből álló sorozatból tömöríti az eggyel növekvő sorozatokat.
 * @var array $hiany
 * @return $ered[0]=elem szám, $ered[1]=lista
 */
function sorozat($hiany){
	$elozo=""; 
	$list=0;
	$elso=0;
	$nn=0;
	$hianyzik="";
	//print "<pre>".var_dump($hiany)."</pre>";
	if(isset($hiany)){
	//	if($hiany[0]>" "){
	foreach($hiany as $key=>$val){
		if($elozo==""){$elozo=$val;} else {
	
		if($elozo==$val-1){
			if(!$list){$elso=$elozo; $elozo=$val;  $list=1;}else{$elozo=$val;}
		} else {
		if($list){$hianyzik.=$elso." - ".$elozo.", "; $list=0; $elozo=$val;} else {$hianyzik.=$val.", ";}
		}
		$nn++;
		}
	}}//}
	else{$hianyzik=' nincs lista!';}
	if($list){$hianyzik.=$elso." - ".$elozo;}
	$ered=array($nn,$hianyzik);
	return $ered;
}
 ?>	
	