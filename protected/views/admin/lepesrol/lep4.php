<?php
/* @var $this LepesrolController */

$this->breadcrumbs=array(
	'Lepesrol',
);
?>
<div class="lepes">
<h1><?php echo $title; ?></h1>
<span class="blue"><b><ol start="3">
	<li>
	<p> lépés: Magamról oldal megírása</p>
	</li>
</ol></b></span>

    

Az első feladat egy nem túl régen készült, lehetőleg jpg kiterjesztésű saját fénykép keresése vagy készítése. A fényképnek felesleges nagy felbontásúnak lennie, mivel a jelenlegi képernyők felbontása általában 100 dpi alatt van. A felbontásra utalhat a kép mérete, mindenképp 1 Mbyte alatti képet keressünk vagy képszerkesztővel (pl. InfranView ) csökkentsük a felbontást. Ügyeljünk arra, hogy a kép fájl neve ne tartalmazzon szóközt és ékezetes betűket és jegyezzük meg a kép könyvtárát és nevét.

Ekkor következhet a kép feltöltés, ehhez kattintson a következő linkre: <a href="<?php echo Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']; ?>/admin/kepek/create" target="_blank"> Fénykép feltöltés</a><br>

Ha a két lépésben történő feltöltés sikerült, akkor az új ablak bezárható.</p>

<p>Ekkor következhet papíron vagy szövegszerkesztővel az oldal tartalmának a megírása, ehhez adhat mankót az oldalon jelenleg olvasható címszavak.<br>

Ha készen áll a bevitelre, akkor kérem kattintson a következő linkre:<a href="<?php echo Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']; ?>/admin/contentAdmin/update/id/<?php echo $id;?>" target="_blank"> "Magamról" oldal szerkesztése</a><br> 

Elsőnek javaslom a fénykép beillesztését, majd ezt követően a szöveg beillesztését vagy bevitelét. A szövegszerkesztő széles lehetőséget biztosít a kiemelésre és formázásra.

Ha elkészült, akkor kérem ellenőrizze a látogatói felületen a Magamról oldalt és ha javítani valót talál megint kattintson az előbbi linkre.</p>

Most már két oldal elnyerte a végső formáját. Persze az úgynevezett statikus oldalakat (kezdőlap, magamról, rendelési idő alatti tájékoztató szöveg, sőt saját készítésű új oldal) bármikor módosíthatunk, írhatunk a "Tartalmi oldalak" modulnévnél minden megkötés nélkül.



<p><a  href="<?php echo $bUrl; ?>lep5"><input name="lep5" type="button" value="Tovább a következő oldalra" /></a></p>
</div>