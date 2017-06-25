<?php
/* @var $this LepesrolController */

$this->breadcrumbs=array(
	'Lepesrol',
);
?>
<div class="lepes">
<h1><?php echo $title; ?></h1>
<span class="blue"><b><ol start="5">
	<li>
	<p> lépés: Rendelési idő és a tájékoztató módosítása  </p>
	</li>
</ol></b></span>


Elsőnek célszerű a rendelési idő táblát kiegészíteni, ha szükséges:<a href="<?php echo Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']; ?>/admin/rendido" target="_blank"> Rendelési idő módosítása</a><br>

Ha a beírt adatok helyesek, de péntekenként változó a rendelés, akkor kattintson  a péntek délelőtti sor Műveletek oszlopban lévő ceruza ikonra és beírhatja a délelőtti rendelés kezdő és befejezési idejét,<br>
majd a megjegyzés rovatba írja be: <u>páros héten:</u> vagy <u>páratlan héten:</u> Fontos hogy a megjegyzésbe írt szövegek az aláhúzott szövegekkel megegyezzenek és a kettős pontot is tartalmazzák!<br />

Ha egyéb javítani való nincs ez az ablak bezárható. Természetesen mielőbb továbblépne célszerű a Rendelési idő-t betölteni és a módosítást ellenőrizni.<br />

A rendelési idővel kapcsolatos tájékoztatót itt módosíthatja:<a href="<?php echo Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']; ?>/admin/contentAdmin/update/id/<?php echo $id;?>" target="_blank"> Rendelési tudnivalók módosítása</a>

Az ellenőrzésről itt se feledkezzünk meg!



<p><a  href="<?php echo $bUrl; ?>lep7"><input name="lep7" type="button" value="Tovább a következő oldalra" /></a></p>
</div>