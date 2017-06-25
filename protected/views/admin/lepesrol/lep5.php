<?php
/* @var $this LepesrolController */

$this->breadcrumbs=array(
	'Lepesrol',
);
?>

<div class="lepes">
<h1><?php echo $title; ?></h1>
<span class="blue"><b><ol start="4">
	<li>
	<p> lépés: Kezdőlap módosítása </p>
	</li>
</ol></b></span>

  

A módosítás következő linkre kattintva történik:<a href="<?php echo Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']; ?>/admin/contentAdmin/update/id/<?php echo $id;?>" target="_blank"> Kezdő oldal módosítása</a><br> 

Ha fényképet szeretne beilleszteni, akkor azt előbb a képfeltöltés modullal kell külön felvinnie, majd az előző lépésben történt módon kell meghívni.

Ha új linket szeretne bevinni, akkor meg kell keresni a címét (saját oldalnál vigye az egeret a kívánt menüpontra és írja fel a böngésző bal alsó sarkában megjelenő címet, majd kattintson a hivatkozás beillesztése ikonra. A hivatkozás tulajdonságainak megadásánál segítséget jelenthet, ha az egér mutatót egy meglévő hivatkozásra viszi, majd a jobb gombot megnyomva megnézi annak tulajdonságait.

Mentés után az eredmény természetesen a kezdőoldal újratöltésével ellenőrizendő.

<p><a  href="<?php echo $bUrl; ?>lep6"><input name="lep6" type="button" value="Tovább a következő oldalra" /></a></p>
</div>