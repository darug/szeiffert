<?php
/* @var $this LepesrolController */

$this->breadcrumbs=array(
	'Lepesrol',
);
?>
<div class="lepes">
<h1><?php echo $title; ?></h1>
<span class="blue"><b><ol start="8">
	<li>
	<p> lépés: Tájékoztatók </p>
	</li>
</ol></b></span>


<p>Sajnos az internet hemzseg a különböző egészségügyi és betegséggel kapcsolatos információktól, amelyek hitelessége nehezen ellenőrizhető. Tájékoztató rovatnak azért tulajdonítunk jelentőséget, mert Önöknek lehetőséget biztosít, a jó és hasznos oldalak linkjeinek beépítésére, saját tudásuk leírására és nem utolsó sorban az erőforrások takarékos felhasználására, amennyiben hajlandók linkjeik, írásaik megosztására.</p>

<p>Honlapjukon az első két tájékoztató a kerületi ügyelettel és a szakrendelésekkel foglalkozik, hasznosságukhoz nem fér kétség.</p>

<p>A harmadik a „Beteghíradó” gyönge kísérlet a letagadhatatlan betegek közötti kommunikációnak pozitívvá tételére. Ha a kísérlet nem tetszik pár másodperces tevékenységgel törölhetik ezt a rekordot (adatbázis sort) és ezzel azonnal eltűnik az oldalukról.</p>

<p>Az influenza ismertető oldal az ANTSZ oldalán található.</p>

A további két bejegyzés üres, ezek kitöltése vagy törlése Önre vár.<br>

A tájékoztatókhoz itt linket nem mellékelünk, az admin oldal Modulok menüben a „Tájékoztatók” pontra kell kattintani és ott megtekinthető, módosíthatók és törölhetők az egyes sorok.

A módosításkor illetve az új sor létrehozásakor részletes útmutatást talál az egyes mezők

kitöltéséhez.<br/>

Amennyiben új sort hoznak létre, akkor a mentés után a felhasználói oldalon megjelenik a legördülő menüben az új elem. Kérem ne feledjék kipróbálni az új elemet, a linkek könnyen hibásak lehetnek!



<p>Ha saját tájékoztatást szeretnének létrehozni, akkor ezt a „Modulok” „Tartalmi oldalak” menüpontjában kell megvalósítaniuk, majd annak a név (url) mezőnek a tartalmát kell az ezt megjelenítő Tájékoztató sor „url” mezőjébe átmásolni.</p>

Konkrét példán ismertetve: A jogosítván tájékoztató használhatóságához az alábbi lépések szükségesek:
<ul>
<li> Rákattint a "Tartalmi oldalak" modulra,</li>

<li>Rákattint az "Új tartalom" feliratra,</li>

<li>Elkezdi kitölteni az űrlapot,</li>

<li>Az "url" mezőbe beírja: jogsi,</li>

<li>A "cím" mezőbe: Általános tudnivalók a jogosítvány kiadásáról vagy ehhez hasonló szöveget írjon be,</li>
<li>
"Tartalom" mezőbe: leírja az árat és egyéb tudnivalókat,</li>
<li>
A "kereső robot tiltása" és "aktív" kockákat nem pipálja ki,</li>
<li>
A „Kapcsolat céloldal (menüpont címe)” mezőt üresen kell hagyni, különben ennek a  mezőnek a címe is megjelenik a vízszintes menüsorban!</li>
<li>
Ha minden hibátlan rákattint a "Mentés" gombra.</li>
<li>
Ezután „Tájékoztató” modul menüre kell kattintani,</li>
<li>
Megkeresi a jogosítvány sort és a sorvégén a szerkesztést jelölő ceruzára kattint:</li>
<li>
A link mezőbe beírja: jogsi (vagy még jobb, ha Ctrl C és Ctrl V segítségével átmásolja a tartalmat!);</li>
<li>
a „Hosszu” mezőbe egy összegző rövidebb ismertetést ír,</li>
<li>
A megjegyzés tartalmát kitörli, vagy saját maga számára ír bele emlékeztetőt,</li>
<li>
Ezután a "Mentés" gombra kattintva elmenti a tartalmat.</li>
<li>
Végül a felhasználói oldalon ellenőrzi az eredményt.</li>
</ul>
Más belső oldalak készítésénél is hasonlóan kell eljárni.<br>

<p>A külső hivatkozások bevitele sokkal egyszerűbb, ott csak a hivatkozási cím hibátlanságára kell figyelni (ezért érdemes ezt is másolni) és a megnevezést és rövid ismertetést bevinni.</p>

Ezzel a honlapunk alap lehetőségeit kihasználtuk és használatra kész.<br>


<p><a  href="<?php echo $bUrl; ?>lep10"><input name="lep10" type="button" value="Tovább a következő oldalra" /></a></p>
</div>