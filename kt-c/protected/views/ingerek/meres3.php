<?php
/** @var $this IngerekController */
/** @var	$nev  Teljes név
/*	@var	$meres 
/*	@var	$kar_szam kijelzett karaktarak száma (2,4,6,8)
/*	@var	$ing_szam a mérés ingereinek száma
/*	@var	$mer_ido inger kijelzési idő
/*	@var	$szun_ido két inger közötti szünetidő (sötét képernyő)
/*	@var	$d_t mérés befejezéskor detektált dátum és idő
/*	@var	$ri hagyományosan értelmezett reakció idő átlag
/*	@var'	$szoras szórás, jelenleg nem számolt! @todo: szorás számolásának és tárolásának pótlása (csak, ha már minden működik!)
/*	@var	$tcorr korrigált reakció idő átlag 
/*	@var	$cf correkt ingerekre elkövetett összes hiba
/*	@var	$ff false ingerekre elkövetett összes hiba
/*  @var	$ertekel szöveges értékelés (0="Mérés nem értékelhető", 1="Sajnos most rosszul sikerült", 2="Gyenge", 3="közepes", 4="Jó", 5="Igen jó" )
/*	@var	$mini Az eddigi mérédek legkisebb tcorr értéke
/*	@var	$maxi Az eddigi mérédek legnagyobb tcorr értéke
/*	@var	$atl  Az eddigi mérések súlyozott átlaga
/*	@var	$percent A pillanatnyi eredmény az átlaghoz viszonyított %--os értéke (a jó eredmény 100% feletti!)
 *  @var	$id data_sor id-je
 * 
 */

/*$this->breadcrumbs=array(
	'Ingereks'=>array('meres2'),
//	$model->id,
);*/ 


?>
<script src="http://localhost/dds-yii/js/jquery-1.7.min.js"></script>

<h1><?php echo $nev." ".$meres_szam.". valódi Kontrol-C mérés " ; ?></h1>
<font color="black" size="4"> 
<fieldset>
<center><legend><b> Összegzett mérési eredmények </b></legend></center>
	<br/>

<table BORDER=3 BGCOLOR=silver width="100%" > 
<tr><th>Sorszám</th><th>Inger </th><th>Ingerek tipusa</th><th>Mérési idő </th><th>Jó inger hiba </th><th>False inger hiba</th></tr>
<?php for($i=0;$i<100;$i++){ ?>
<tr><td><?php echo $i+1 ?></td><td><?php echo $sor[$i][0]; ?></td><td><?php echo $sor[$i][1]; ?></td><td><?php echo $sor[$i][2]; ?></td><td><?php echo $sor[$i][3]; ?></td><td><?php echo $sor[$i][4]; ?></td></tr>  
<?php } ?>
</table>
</fieldset>
<br>
<table width="100%">
<tr><td>Jó inger hibaszám: <?php echo $cf; ?></td><td>False inger hibaszám: <?php echo $ff; ?></td><td>Összes hiba száma: <?php echo $cf+$ff; ?></td></tr>
<tr><td>Átlagos reakció idő: <?php if($ri>250){echo $ri."msec";}else{echo "<B>Nem értékelhető!</B>";} ?> </td>
	<td> Szórás: <?php echo $szoras; ?></td>
	<td> Korrigált reakció idő: <b><font size=5><?php if($ri>250){echo $tcorr."msec";} else {echo "<B>Nem értékelhető!</B>";} ?></font></b></td></tr>
<tr><td colspan="3">Az Ön mérési eredménye: <b><?php echo $ertekel; ?></b></td></tr>
<?php if($meres_szam >4){ ?>
<tr><td>Mérési minimum: <?php echo $mini; ?> </td><td> maximum: <?php echo $maxi; ?></td><td> átlag: <?php echo $atl; ?></td></tr>
<tr><td>Az Ön pillanatnyi teljesítménye:<b> <?php echo $percent; ?>%</b></td></tr>
<?php } ?>
</table>

</font>
</br>
<?php if($mestyp){ ?>
	<table width="100%"> 
	<tr>
	<td><?php if($link_enable){?><a href="meres">Ugrás egy újabb mérésre </a><?php } else {?><b><font color="red">Ez egy régebbi mérés!</font></b><?php } ?> </td>
	<td> <a href="home">Ugrás a kezdőoldalra </a></td>
	<td> <!--<a href="meres3?id=<?php echo $id; ?>">Részletes eredmány megnézése</a> --></td>
	<td> <a href="meres4">Összes eredmény grafikus megjelenítése</a></td>
	<td> <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/site/logout">Kilépés </a></td>
	</tr>
	</table>
<?php } else{ if($link_enable){?>
	<a href="meres?mestyp=1">Ugrás a valódi mérésre </a>
<?php } else { ?>
	<b><font color="red">Ez egy régebbi mérés! </font></b>	
<?php }}  ?>