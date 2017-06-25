<?php
/* @var $this LepesrolController */

$this->breadcrumbs=array(
	'Lepesrol',
);
?>
<div class="lepes">
<h1><?php echo $title; ?></h1>
<span class="blue"><b><ol start="6">
	<li>
	<p> lépés: Körzet határok bevitele </p>
	</li>
</ol></b></span>

Ha rendelkezésére áll a körzetéhez tartozó utcák listája, akkor máris kezdheti a bevitelt:<a href="<?php echo Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']; ?>/admin/korzet/create" target="_blank"> Új utca bevitele</a><br/>

A bevitel szabályai az oldalon felsorolásra kerültek, az adatokat utcánként kell bevinni (ahány utca annyi új bevitel). Ez lesz a feltöltés legunalmasabb része, de a pácienseinknek lehetőséget kell biztosítani a könnyű és gyors tájékozódásra.<br/>
Ha az eddig bevitt adatokat szeretné megtekinteni, akkor kattintson a bal felső sorban lévő lévő <span class="blue"><u>Körzet</u></span> szóra.<br>
Ha a táblázatban az adott sorvégén lévő <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /> jelre kattintson, ekkor ennek a sornak a trartalmát rudja módosítani.<br>
Ha a <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" /> jelre kattint, akkor ez a sor helyreállíthatatlanul törlődni fog, ezért ezt aműveletel nagyon körültekintően kell használni!!<br>
Ennél a feladatnál elegendő a szúrópróba szerű ellenőrzés.
Ezek a műveletek az összes modulnál egységesek!<br><br>
Ha idáig eljutott, akkor a honlapja késznek nyilvánítható, hiszen minden oldal aktualizálva és ellenőrizve lett. Természetesen minden honlap továbbfejleszthető és a többi pontban ismertetjük a további lehetőségeket.



<p><a  href="<?php echo $bUrl; ?>lep8"><input name="lep8" type="button" value="Tovább a következő oldalra" /></a></p>