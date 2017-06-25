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
 *  array('nev' => $nev, 'meres_szam' => $meres_szam, 'kar_szam' => $kar_szam, 'ing_szam' => $ing_szam, 'mer_ido' => $mer_ido,
 *  'szun_ido' => $szun_ido, 'meres_typ' => $meres_typ, 'mestyp' => $mestyp, 
 * 'd_t' => $d_t, 'ri' => $ri, 'szoras' => $szoras, 'tcorr' => $tcorr, 
 * 'cf' => $cf, 'ff' => $ff, 'ertekel' => $ertekel, 
 * 'mini' => $mini, 'maxi' => $maxi, 'atl' => $atl, 
 * 'percent' => $percent, 'link_enable' => $link_enable, 'id' => $id, )
 */

/*$this->breadcrumbs=array(
	'Ingereks'=>array('meres2'),
//	$model->id,
);*/ 


?>
<script src="http://localhost/dds-yii/js/jquery-1.7.min.js"></script>

<h1><?php $msz=$meres_szam-1; 
	if($ing_szam<50){echo $nev." ".$meres_szam.". tanuló/gyakorló Kontrol-C mérés " ;}
	else {echo $nev." ".$msz.". <b>valódi</b> Kontrol-C mérés " ;} ?></h1>
<font color="black" size="4"> 
<fieldset>
<center><legend><b> Összegzett mérési eredmények </b></legend></center>

<table width="100%">
<tr><td>A mérés karakterszáma: <?php echo $kar_szam; ?></td><td></td><td></td></tr>
<tr><td>Inger szám: <?php echo $ing_szam; ?></td><td>Kijelzési idő: <?php echo $mer_ido; ?> msec</td><td>Szünet idő: <?php echo $szun_ido; ?> msec</td></tr>
<tr><td>Jó inger hibaszám: <?php echo $cf; ?></td><td>False inger hibaszám: <?php echo $ff; ?></td><td>Összes hiba száma: <?php echo $cf+$ff; ?></td></tr>
<tr><td>Átlagos reakció idő: <?php if($ri>250){echo $ri." msec";}else{echo "<B>Az irreálisan alacsony ri miatt nem értékelhető!</B>";} ?> </td>
	<td> Szórás: <?php echo $szoras; ?></td>
	<td> Korrigált reakció idő: <b><font size=5><?php if($ri>250){echo $tcorr." msec";} else {echo "<B>Nem értékelhető!</B>";} ?></font></b></td></tr>
<tr><td colspan="3">Az Ön mérési eredménye: <b><?php echo $ertekel; ?></b></td></tr>
<?php if($meres_szam >4){ ?>
<tr><td>Mérési minimum: <?php echo $mini; ?> </td><td> maximum: <?php echo $maxi; ?></td><td> átlag: <?php echo $atl; ?></td></tr>
<tr><td>Az Ön pillanatnyi teljesítménye:<b> <?php echo $percent; ?>%</b></td></tr>
<?php } ?>
</table>
</fieldset>
</font>
</br>
<?php if($mestyp){ ?>
	<table width="100%"> 
	<tr>
	<td><?php if($link_enable){?><a href="meres">Ugrás egy újabb mérésre </a><?php } else {?><b><font color="red">Ez egy régebbi mérés!</font></b><?php } ?> </td>
	<td> <a href="home">Ugrás a kezdőoldalra </a></td>
	<td> <!--<a href="meres3?id=<?php echo $id; ?>">Részletes eredmány megnézése</a> --></td>
	<td> <a href="meres4/<?php echo Yii::app()->user->getId(); ?>">Összes eredmény grafikus megjelenítése</a></td>
	<td> <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/site/logout">Kilépés </a></td>
	</tr>
	</table>
<?php } else{ if($link_enable){?>
	<a href="meres?mestyp=1">Ugrás a valódi mérésre </a>
<?php } else { ?>
	<b><font color="red">Ez egy régebbi mérés! </font></b>	
<?php }}  ?>