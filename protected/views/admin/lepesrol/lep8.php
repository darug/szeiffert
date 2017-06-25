<?php
/* @var $this LepesrolController */

$this->breadcrumbs=array(
	'Lepesrol',
);
?>
<div class="lepes">
<h1><?php echo $title; ?></h1>
<span class="blue"><b><ol start="7">
	<li>
	<p> lépés: Határidős üzenetek kiíratása </p>
	</li>
</ol></b></span>



A honlap egyszerű és könnyű lehetőséget biztost rövid figyelem felhívó üzenetek megjelenítésére és határidőhöz kötött – automatikus - levételére. Ennek szabadságolás, helyettesítés, ünnep miatti rendelési idő módosulás vagy éppen védőoltásra történő felhívásnál van jelentősége.

<br>Az ilyen üzenetek minden oldal második sorában piros színnel jelennek meg, egészen a beállított határnapig.

Az üzenet bevitel kipróbáláshoz ide kattintson: <a href="<?php echo Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']; ?>/admin/uzenet/create" target="_blank">Új üzenet írása</a>
<p><a  href="<?php echo $bUrl; ?>lep9"><input name="lep9" type="button" value="Tovább a következő oldalra" /></a></p>