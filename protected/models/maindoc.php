<?php
/**! \mainpage Háziorvos (hazi-orvosok.hu) oldal dokumentációja
 *
 * \section alt_sec Általános összegzés
 *
 * <b>A honlap önálló részei:</b>
 * <ul>
 * 	<li>Orvosi honlapok <a href=http:66hazi-orvos.hu> hazi-orvosok.hu</a> linkeken érhetők el. Ennek leírása itt található @link page1 @endlink</li>
 *  <li>Általános, közös honlap <a  href=http://home.hazi-orvos.hu>home.hazi-orvosok.hu</a> címen található, Részletek itt @link page2 @endlink nézhető meg.</li>
 *  <li>Admin felulet <a href=http://haziorvosok.hu/admin/>haziorvosok.hu/admin/</a> linken nézhetők meg a bejelentkezés után. Részletek itt @link page3 @endlink nézhető meg.</li>
 * 	<li>Orvos felület létrehozása, karbantartása az admin felületen belül történik. Részletek itt @link page4 @endlink nézhető meg.</li> 
 *
 * A honlap rendszer eredtileg háziorvosok számára készült, de menetközben kiterjesztésre került, a gyermekorvosok számára is.
 * Az orvosok id-je a link-ben kódolásra kerűl, így azonos forrás kódja van minden honlapnak. A tényleges tartalom adatbázisban tárolódik. id=200 a közös oldal kódja.
 *
 *  További kiterjesztés, hogy áldomain neveket is fogad, amelyek külön csoportot alkotnak, így külön hoinlapnak látszódnak.
 *  Jelenleg az e-d.hu, "Az egészégügyik dolgozók honlaprandszere" működőképes.
 * 
 */

/*! \page page1 Az egyedi orvosi honlapok ismertetése
  \tableofcontents
  Minden honlap azonos kódra épül és azonos táblákat használ. Az egyedi tartalmat az orvos táblában az adott orvoshoz tartozó $id vezérli, mert ez alapján kerül szűrésre az orvos saját megjelenítendő tartalma.
  A rendszer lehetőséget biztosít a saját dizájn kialakításra, a dizájn fájlmegnevezését az orvos->layout mező tartalmazza.
 * \section reszl Az egyedi orvosi honlapok részletes ismertetése:
 * <ul> 
 * <li>Egy oldal felépítése:<ul>
 * 		<li>Fejléc: középze kiírásra kerül: Orvos->name Orvos->szak_végzettség "honlapja" (szeiffert.ddstandard-hu-n: "honlapjának teszt oldala!!!")
 * 		<li>Viszintes menü: "*Kezdő oldal","Rendelési idő","*Bemutatkozás","Tájékoztatás!!","Körzet ellenőrzés","Elérhetóség és kapcsolatfelvétel" menüpontokból áll. 
 * A *-gal jelölt menüpontoka content tartalomban találhatók, a !!-lel jelölt menüpont függülegesen legördülő menüt tartalmaz.
 * A *-gal nem jelölt menüpontokhoz külön modulok tartoznak. A viszintes menü automatikusan bővül, ha új content tartalmat visznek be.
 * Az új pontok a létrehozás sorrendjében az utolsó menüpnont elé kerülnek beszúrásra.
 * <span color=black>todo: Ha több vagy hosszú megnevezésű menüponttal bővül a rendszer, akkor megtörik a menüsor és kilóghat a háttérból. Két megoldás közül választhatunk: css fájl módosítás (egyszerübb) vagy az új mneüpontok függőleges legördülő menübe kerülnek.</span>
 * 		<li>Rendelési idő információs sor: amely az napi rendelésről ad tájékoztatás és ha van rendelés akkor naponta háromszor változik:
 * 		<ul><li>Rendelés előtt: "A rendelés x óra y perc múlva kezdődik"
 * 		<li>Rendelés alatt:"A rendelés elkezdődött, x óra y perc múlva lesz vége"
 * 		<li>Rendelés után:"A rendelés már befejeződött, legkozelebb ... lesz rendelés"
 * 		<li>Üzenetek íródnak ki. Ha nincs rendelés, akkor: "Ma nincs rendelés, legkozelebb ... lesz rendelés" felírat jelenik meg. A rajzszög jelre kattintva ez az infó sor elrejthető.
 * 		</ul>
 *     <li>Oldal tartalom: Ha a hivatkozott tartalom Content modulban tárolódik, akkor annak tartalma egy az egyben jelenik meg. Ellenkező esetben a meghívott modul contrellere vezérli a tartalmat.
 * 	   <li>Lábléc: felső sorában a copyright szöveg és az oldal státusza látható. Az alsó blokkban az oldal készítőjeként két link a <a href=http://home.hazi-orvosok.hu>home.hazi-orvosok.hu</a> (amaly a közös oldalra mutat) és a <a href=http://ddstandard.hu>ddstandard.hu</a> látható.
 * </ul>
 * 
 *  \section mod  A honlaprendszer az alábbi modellekre épül:
 <ul>
 <li>\ref config \endref, ebben a honlaprendszerben csak a kapcsolat oldal hivatkozik rájuk</li>
 <li>\ref content \endref </li>
 <li>\ref felvilagosit\endref, az egyes rekord címek függőleges, legördülő menüben jelennek meg.</li>
 <li>\ref kapcsolat\endref.
 <li>\ref korzet\endref.
 <li>\ref orvos\endref. 
 <li>\ref rendelo\endref.
 <li>\ref rendidő \endref model, amely orvosonként 14 rekordban a rendelési időket tartalmazza
 <li>\ref  uzenet \endref
 
 </ul> 
   \subsection config Config model és tábla speciális tartalmak tárolására
  Ez a honlaprendszer csak a kapcsolat oldalon használja az alábbi adatokat:
 * <ul>
 * <li>categor=="oldal" && name=="cim" levelezési cím
 * <li>
 * </ul> 
 * @todo A maindoc.php 48.sortól a felsorolásban lévő hivatkozásokat a viw file tartalom alapján ellenőrizni és kiegészíteni kell kell
 * 
  \subsection content  Content model és tábla statikus tartalmak tárolására 
  Az összes statikus teljes oldal vagy részoldal tartalom it kerül tárolásra.
  A name mező szolgál a tartalom címkézésére. Az alábbi főbb visszatérő megnevezések vannak:
 * <ul>
 * <li> name=="home" A nyitó oldal
 * <li> name=="home0" Összegző oldal, amely akkor látható, ha az orvos nem tart igényt honlapra. Ha ez az oldal jelenik meg, akkor a visszintes menű láthatatlan lesz.
 * <li> name=="rendelesiido/rendelesiido", amely fix, nem változtatható tartalmú rekord, amelynek hatására felül a rendelési idő táblázat, alul a rendeléssel kapcsolatos tájékoztató jelenik meg.
 * <li> name=="bemutatkozás", amely az orvos arcképét és rövid életrajzi adatokat és egyéb bemutatkozást tartalmaz.
 * <li> name=="beteghirado", saját írás a betegtársknak (orvos kilőheti).
 * <li> name=="rendidő" rendelési tájékoztató szövege,
 * <li> name=="rendelocime", rendelői oldal tartalma (max 3 fénykép, orvosok felsorolása,legközelebbi patika, link a kerület patikáihoz). Ez az oldal gépi uton keletkezik és csak egy orvoshoz van kötve.
 * </ul>
  \subsection felvilagosit Felvilagosit model és tábla a lényeges linkek és információk tárolására
 * Ennek a táblának az egy orvoshoz tartozó rekordjai egy legördülő függőleges menüben jelennek meg (title tartalom).
 * A tájékoztatás menüre kattintva az összes rekordtartalom kiírásra kerül az alábbiak szerint:
 * <ul>
 * <li> középra a cím (title),
 * <li> alatta lévő sorban linkként a "rovid" tartalom, ha a linkre kattintunk, akkor új ablakban jelenik meg a kivánt tartalom
 * <li> alatta linkként a bővebben felírat, amely a "hosszu" mező tartalmát jeleníti meg. Ennek a kiíratását js script végzi, amely egyszerre csak egy bóvebben kiíratást enged meg.
 * </ul>
 * A főbb elemek lehetnek:ugyeleti és szakrendelési információk, beteghiradó, influenza tájékoztató, jogsi infó, stb.
 *
 *  \subsection kapcsolat  Kapcsolat model és tábla az orvosnak a honlapról küldött üzenetek tárolására 
  Megjegyzés: a nem véglegesített honlapokról küldött üzenetek a tárolás nellett e-mailben iDG-nek is elküldésre kerülnek.
 * @todo: Az e-mail tárgyában az orvos id mellett a honlap nevét (szeiffert vagy hazi-orvosok) be kell rakni. 
 *   
 *   \subsection korzet  Korzet model és tábla az orvos körzethatárinak tárolására
 * Egy rekord egy utca tárolására szolgál, az alábbiak szerint:
 * <table>
 * <tr><th>Mező név</th><th>Típus</th><th>Tartalom</th><th>Megjegyzés</th></tr>
 * <tr><td>id</td><td>int(11)</td><td>Id</td><td>NOT NULL AUTO_INCREMENT</td></tr>
 * <tr><td>name</td><td>varchar(255)</td><td>ékezetmentes utca név vagy rovidítése</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>title</td><td>varchar(255)</td><td>jelenlegi tartalom: "Körzet"</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>irszam</td><td>int(11)</td><td>az utca irányító száma</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>megjegyzes</td><td>varchar(255)</td><td>Tetszőleges megjegyzés</td><td> csak az admin felületen látható!</td></tr>
 * <tr><td>kezdo_szam_paratlan</td><td>varchar(255)</td><td>páratlan oldal kezdő házszáma</td><td>Teljes utca esetén üresen hagyandó!!</td></tr> 
 * <tr><td>veg_szam_paratlan</td><td>varchar(255)</td><td>páratlan oldal vég házszáma</td><td>Teljes utca, vagy utca vége is ide tartozik, akkor üresen hagyandó!</td></tr>
 * <tr><td>utca</td><td>varchar(255)</td><td>az közterület ékezetes teljes megnevezése (név jelleg)</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>id_orvos</td><td>int(11)</td><td>az orvos_id-je</td><td>NOT NULL </td></tr>
 * <tr><td>id_rendelő</td><td>int(11)</td><td>A rendelő_id-je</td><td>NOT NULL</td></tr>
 * <tr><td>lastmod</td><td>timestamp</td><td>utolsó módosítás ideje</td><td>NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP</td></tr>
 * </table>
 * PRIMARY KEY (`id`)
 
   \subsection orvos  Orvos model és tábla az orvosok adatainak tárolására
 * Ezen a honlaprendszeren csak az id, name, id_rendelő és orvos_megnev mezőtartalmak kerülnek felhasználásra 
 * Az orvos tábla az alábbi mezőket tartalmazza:
 * <table>
 * <tr><th>Mező név</th><th>Típus</th><th>Tartalom</th><th>Megjegyzés</th></tr>
 * <tr><td>id</td><td>int(11)</td><td>Id</td><td>NOT NULL AUTO_INCREMENT</td></tr>
 * <tr><td>name</td><td>varchar(255)</td><td>orvos neve: dr. Vezetéknév Keresztnév</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>sub_link</td><td>varchar(255)</td><td>honlap előtag</td><td>pl: szeiffer.hazi-orvosok.hu (a kód nem hasznáéja)</td></tr>
 * <tr><td>id_rendelő</td><td>int(11)</td><td>Az orvos rendelőjének az id-je</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>megjegyzes</td><td>varchar(255)</td><td>kitöltésre utaló megjegyzés</td><td>legtöbbnél = gépi</td></tr>
 * <tr><td>layout</td><td>varchar(255)</td><td>layout fájl neve</td><td>jelenleg: main és mainold</td></tr> 
 * <tr><td>orvos_megnev</td><td>varchar(255)</td><td>az orvos szakirányú végzettsége</td><td>kötelező! jelenleg: háziorvos, gyermekorvos és fogorvos</td></tr>
 * <tr><td>status</td><td>varchar(255)</td><td>A honlap státusza</td><td>kötelező! OK, ajanlati, kisérleti, demo, elutasítva</td></tr>
 * <tr><td>lastmod</td><td>timestamp</td><td>utolsó módosítás ideje</td><td>NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP</td></tr>
 * </table>
 * PRIMARY KEY (`id`)
 * 
 * Az oldalak fejlécében a name és orvos_megnev tartalom íródik ki.
 * <br>Majdnem minden modul ennek az id-jére szűri a tartalmát.
 * <br>A láblécben a status íródik ki.
 * 
 
  \subsection rendelo  Rendelő model és tábla a rendelők adatainak tárolására
 * Ezen a honlaprendszeren csak az id, name, id_rendelő és orvos_megnev mezőtartalmak kerülnek felhasználásra 
 * Az orvos tábla az alábbi mezőket tartalmazza:
 * <table>
 * <tr><th>Mező név</th><th>Típus</th><th>Tartalom</th><th>Megjegyzés</th></tr>
 * <tr><td>id</td><td>int(11)</td><td>Id</td><td>NOT NULL AUTO_INCREMENT</td></tr>
 * <tr><td>irszam</td><td>int(11)</td><td>az utca irányító száma</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>varos</td><td>varchar(255)</td><td>az közterület ékezetes teljes megnevezése (név jelleg)</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>utca</td><td>varchar(255)</td><td>helyiség név</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>telefon</td><td>varchar(255)</td><td>telefonszám</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>email</td><td>varchar(255)</td><td>E-mail cím</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>rend_neve</td><td>varchar(255)</td><td>Rendelő neve (általában a teljes cim)</td><td>kitöltése kötelező!</td></tr>
 * <tr><td>orvos_szam</td><td>int(11)</td><td>A rendelőhöz tartozó orvosok számae</td><td></td></tr>
 * <tr><td>megjegyzes</td><td>varchar(255)</td><td>kitöltésre utaló megjegyzés</td><td>legtöbbnél = gépi</td></tr>
 * <tr><td>lastmod</td><td>timestamp</td><td>utolsó módosítás ideje</td><td>NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP</td></tr>
 * </table>
 * PRIMARY KEY (`id`)
 * 
 * Az első oldal utolsó sorában lévő link mutat a rendeló oldalra, amely rendelő model és a content('Rendelőnév') alapján jeleníti meg a rendelői oldalt.
 *  
  \subsection rendidő  Rendelési idők model és tábla a rendelők adatainak tárolására, orvosonként 14 db. rekorddal
 * Ennek a tartalma a "Rendelési idő" oldalon jelnik meg
 *  
 * A rendidő tábla az alábbi mezőket tartalmazza:
 * <table>
 * <tr><th>Mező név</th><th>Típus</th><th>Tartalom</th><th>Megjegyzés</th></tr>
 * <tr><td>id</td><td>int(11)</td><td>Id</td><td>NOT NULL AUTO_INCREMENT</td></tr>
 * <tr><td>name</td><td>varchar(255)</td><td>napsorszm+napszak</td><td>kitöltése kötelező!(1de,1du,..,7de,7du)</td></tr>
 * <tr><td>title</td><td>varchar(255)</td><td>nap neve</td><td>kitöltése kötelező!(hétfő,...,vasárnap)</td></tr>
 * <tr><td>start</td><td>varchar(255)</td><td>rendelés kezdőidőpontja</td><td>kitöltése kötelező!(formátum: 08:00)</td></tr>
 * <tr><td>stop</td><td>varchar(255)</td><td>rendelés záró időpontja</td><td>kitöltése kötelező!(formátum: 12:00)</td></tr>
 * <tr><td>comment</td><td>varchar(255)</td><td>Rendelési idő fölé kiírandó megjegyzés</td><td>pl.: páros héten:</td></tr>
 * <tr><td>id_orvos</td><td>int(11)</td><td>Az orvos id-je</td><td></td>kitöltése kötelező</tr>
 * <tr><td>lastmod</td><td>timestamp</td><td>utolsó módosítás ideje</td><td>NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP</td></tr>
 * </table>
 * PRIMARY KEY (`id`)
 * 
  \subsection uzenet  Üzenet model és tábla,amely minden oldal második sorában piros betükkel kiírható határidős üzeneteket tartalmazza. 
 * Több érvényes üzenet esetén a legkisebb id-jű jelenik csak meg!
 *  
 * Az uzenet tábla az alábbi mezőket tartalmazza:
 * <table>
 * <tr><th>Mező név</th><th>Típus</th><th>Tartalom</th><th>Megjegyzés</th></tr>
 * <tr><td>id</td><td>int(11)</td><td>Id</td><td>NOT NULL AUTO_INCREMENT</td></tr>
 * <tr><td>uzenet</td><td>varchar(255)</td><td>A kiírandó üzenet</td><td>kitöltése kötelező!(pl: szabadság, védőoltás, stb.)</td></tr>
 * <tr><td>ervenyes</td><td>date</td><td>utolsó kijelzési nap dátuma</td><td>kitöltése kötelező!(formátum: 2015-05-13)</td></tr>
 * <tr><td>megjegyzés</td><td>varchar(255)</td><td>tetszóleges megjegyzés</td><td></td></tr>
 * <tr><td>valid</td><td>tinyint(1)</td><td> 1-> megjelenik, 0 -> nem látható</td><td></td>A megjelenés további feltétele, hogy az aktuális dátum <=ervenyes</tr>
 * <tr><td>id_orvos</td><td>int(11)</td><td>Az orvos id-je</td><td></td>kitöltése kötelező</tr>
 * <tr><td>lastmod</td><td>timestamp</td><td>utolsó módosítás ideje</td><td>NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP</td></tr>
 * </table>
 * PRIMARY KEY (`id`)
 * 
 * 
 */
 
 
 
/*! \page page2 Általános, nyílvános honlaprendszer ismertetése
 *\tableofcontents
 *Ez a honlaprandszer az előbbivel azonos modellekre és kódra épűl, bár az id=200, de ehhez az id-hez orvos nem tartozik! 
 * Lényegében a páciensek és orvosok számára a teljes honlaprendszer céljáról nyújt felvilágosítást.
 * 
 * \section alt_nyil Az egyes oldalak rövid ismertetése:
 * <ul> 
 * <li>Kezdő oldal <a href=http://szeiffert.ddstandard.hu/200/klap target=_blank> itt látható.</a>
 * Az oldal az eredeti célt ismerteti és más oldalakra való linkeket tartalmaz.
 * Itt is látható az ingyenes honlaphoz jutás akciója
 * <li>Orvosoknak oldal <a href=http://szeiffert.ddstandard.hu/200/orvosok target=_blank> itt látható.</a>
 * A hosszú oldal tartalomjegyzéke az alábbi:
 * 	<ul><li>Szükség van-e a házi- és gyermekorvosi honlapra?
		<li>A hazi-orvosok.hu jellemzői 
		<li>Honlaphoz jutás menete
		<li>Demó oldal használata
		<li>Gyakran Ismételt kérdések (jelenleg üres)
 * 	</ul>
 * 	<li>A Páciensek oldal <a href=http://szeiffert.ddstandard.hu/200/paciens target=_blank> itt látható.</a>
 * 		Ezen az oldalon található a páciensek számára írt <a href=http://szeiffert.ddstandard.hu/200/felvilagosit/paci target=_blank> kérdőív,</a>
 * 		amely segítségével felmérhetjük a véleményüket.
 * 		Alatta található <a href=http://szeiffert.ddstandard.hu/200/felvilagosit/pacistat target=_blank> az összesített eredmény.</a>
 *  <li>A Bemutatkozás oldal <a href=http://szeiffert.ddstandard.hu/200/magunkról target=_blank> itt látható.</a>
 *  <li>A Keresések oldal <a href=http://szeiffert.ddstandard.hu/200/site/keres target=_blank> itt látható.</a>
 *  <li>Az Elérhetőség és kapcsolat felvétel oldal <a href=http://szeiffert.ddstandard.hu/200/kapcsolat/kapcsolat target=_blank> itt látható.</a>
 * </ul>
 *\section alt_elt A modell eltérések rövid ismertetése:
 * A nem használt modellek:
 * 	<ul><li>Rendido
		<li>Felvilagosit 
		<li>Uzenet
 * 	</ul>
 *  Új modellek és elemek:
 * 	<ul><li>../view/site/keres.php amely a keresési lehetőségeket jeleniti meg.
		<li>A háromféle keresés a RendeloController, OrvosController és KorzetController által hivatkozott, az adott modellek view/admin/.../keres.php oldalakkal valósul meg.  
		<li>A páciens kérdőív és statisztika a Felvilagositcontroller hivatkozik, az adatbázisához nem tartozik modell.
 * 			A kérdőív saját készítésű setindex2.php segítségével készül, amely egy szöveges vezérlő fájlból építi fel 
 * 			az adatbázist és a vciew fájlokat. Az index2.php integrálása jelenleg még nem működik!
 * 	</ul>
 * 
*/

/*! \page page3 Admin felület ismertetetése
 *\tableofcontents
 * Ez a honlaprandszer csak az admin és felhadmin usernevet tartalmazó felhasználók számára érhetők el a bejelentkezés után.<br>
 * Feladata a felhasználó számára (felhadminxxx) a tartalom módosítás és az új tartalom készítése lehetséges.
 * Az admin ezen felül törölhet és komplett új oldalakat készíthet.
 * @author ifj. Darvas Gábor
 * \section alt_admin Az egyes oldalak rövid ismertetése:
 * <ul><li> Kedőlap: 
 * 		<ul><li>Három oszlpban az összes nyilvánosan elérhető link megjelenítésre kerül<br>
 * 			<li>A baloldali oszlopban (Modulok kezelése) az első oldalon felsorolt modul szerepel, amely két új linkkel került kiegészítésre (képek adatbázisával és a képek könyvtárával).
 * 			<li>A középső a Beállítások nevet viseli,itt a felhadminxxx felhasználó csak a Jelszóváltoztatást és a Honlpa beállítás (lépésről- lépésre) lehetőségeket érhati el.
 * 			<br>Az admin számára még a következő menüpontok is megjelennek: Oldal beállításai (Config modell), Orvosok, Rendelők, Alaptartalmak (Content0 modell).
		<li>A jobboldali oszlopban az alábbi menüpontok jelennek meg (a *-gal jelöltek csak az adminisztrátor számára): *phpMyadmin,*Tárhely admin felület,*WEBmail felület, Google analitycs, Google AdWords, Google Webmaster tools.  
		</ul>
 * 	  <li>Modell oldalaknál az alábbi közös funkciok érhetők el:
 * 		<ul><li>listázás: egy oldalon 10 rekord kerül kiírásra, elérhető műveletek: új rekord, szerkesztés és törlés. Új lista megjelenítési lehetőségek:ugrás az elejére, végée, előzőze, következőre és a 10 kijelzett oldalra.
 *      <li>Az új rekordnál és a rekord szerkesztésénél az egyes mezőkhöz kitöltést segítő magyarázat tartozik.
 * 		<li>A rendelési időnél nincs új rekord beviteli lehetőség.
 * 		</ul>
 * 	<li>Beállításoknál az alábbi funkciók érhetők el:
 * 	  <ul><li>Jelszó módosítás: felhadmin csak a saját jelszavát látja és azt tudja módosítani. Az admin bárkiét módosíthatja és bárkinek tetszőleges számú felhadmin felhasználót hozhat létre.
 * 	  <li>Beállítások: Honlap beállítás: 12 lépésben vezet végig a testreszabáson. A 11. lépés egy orvosi kérdőív.
 * 	  <li>Admin számára még elérhető:Oldal beállításai (Config), Orvosok (Orvos), Rendelők (Rendelo), Alaptartalmak (Content0) modellek és adatbázisok a moduloknál ismertetett funkciókkal.
 * 		</ul> 
 * 	  <li>A hasznos linkek bővebb kifejtése nem szükséges.	
 * 	</ul>
 * 
*/

/*! \page page4 Orvos felület létrehozásának, karbantartásának és tovább fejlesztési elképzeléseknek ismertetése. 
 * \tableofcontents
 * Az eredeti elképzelés szerint egy kerület vagy helység önkormányzati honlapjának a házi- és gyermekorvosokra vonatkozó adatait kézzel adatbázisba másoljuk, majd aktualizáljuk vagy kiegészítjük az alapadat tartalmakat (Config0, Content0, Felvilagosit0, Korzet0),
 * majd egy action indításával automatikusan genráljuk az új oldalkhoz tartozó rekordokat.
 * Az így kapott honlapok ajánlatra kész állapotuak és a körzethatárok és extra igények nélkül 1 - 3 órai munkával véglegesíthetők.
 * Ezt a rendszert valósítja meg az Orvos_alapadat modell, az admin felület alatti OrvosAlapadatController és az actionEpit($id).
 * Ez egy működő, fokozatosan fejlesztett eljárás.
 * @author id. Darvas Gábor
 * \section epit Az egyes funkciók rövid ismertetése:
 * <ul><li><b>Honlap építés részletezése</b>
 * <br>A funció indításához a link mezőben  az admi/ utáni rész törlendő, helyette ovosAlapadat/index írandó. 
 * Ekkor megjelenik a bevitt orvosi alpadatok listája és a Műveletek oszlopban a szerkesztés és törlés mellett megjelenik az "epit" ikonja is.
 * </li>
 * 	<li><b>Új orvosok beszúrása egy rendelőbe</b><br>
 * 	orvosAlapadat/index listánál a bal felső zöld keresztre kattintva új adatsort viszünk be (!! id-t megkall adni, ezért célszrű megnézni az utolsó adat id-jét!!,
 *  vigyázzunk, hogy ameglévő rendelő címét hibátlanul vigyük be [célszerű egy megélévő rekordból kimásolni!]). Bevitel után mégegyszer ellenőrizzük az adatokat, majd az új rekord épít műveletére kattintva
 * létrehozzuk az orvos honlapját. Elméletileg a rendelői oldal újraíródik és az új orvos bekerül a rendelő orvosai közé. Ezt külön célszerű leellenőrizni!
 * <li><b>Felesleges rekordok törlése</b><br>
 * Ehhez a művelethez nem tartozik link, az admin/orvosAlapadat/javit-ot kézzel kell bevinni!<br>
 * Törli a config, content, felvilagosit, korzet, rendido, user, uzenet táblákból azokat a bejegyzéseket, amelynél az id_orvos nem létezik! 
 A művelet során  kiírja a táblanevet, majd végigmegy a sorokon és kiírja a törlendő sor id-jét és törli azt. 
 * <li><b>Továbbfejlesztési elképzelések</b><br>
 * <OL>
 * 	<li>Jelenleg az új orvosok bevitele a szeiffert.ddstandard.hu oldalon történik és ellenőrzés után az adattábla tartalmat kézzel viszem át (expor és import a PHPmyadmin-on keresztül). Ez nehézkes és hibalehetőségeket rejt magában.
 * Meg kell valósítani az áttöltő programot. <b>Megvalósult a következő fejezetben leírtak szerint</b>,
 * <li>További fejlesztési elképzelés, hogy a községi honlapról az orvos adatokat nagyobb fokú automatizálással vigyük be az orvosAlapadat táblába.
 * </ol>
 * </ul>
 *
 * \section Epit Új honlapok építésének részetes leírása
 * Meghívás: ../admin/orvosAlapadat/index.<br>
 * A használat célszerű lépései:
 * - Megkeressűk azt az önkormányzati oldalt, amelyik az orvosok adatait tartalmazza (rendelő cím, telefon, név, rendelési idő) ezt a böngésző külön ablakában kell nyitva hagyni,
 * - Az előzőleg megnyitott lista végére megyünk és felírjuk az utolsó rekord számát,
 * - Az új orvosAlapadat bevitelre kattintunk:
 * 		* És beírjuk a következő id számát, 
 * 		* Mezőnként átmásoljuk a a kiinduló honlapról az egyes adatokat.
 * 		* A rendelési idő adatokat a kékkel kiírt formára kell átalakítani!
 * 		* Gyermekorvosoknál az S_honlap mezőbe kell beírni a tanácsadás adatait, ennek formáját, már bevitt gyermekorvosoknál lehet megnézni.
 * 		* Egy kerület vagy helyiség összes adataát célszerű egyszerre bevinni.
 * - Ezután a alaprekordok bővítését kell elvégezni az alábbiak szerint:
 * 		* <b>content0:</b> tartalmát akkor kell bővíteni, ha új szakmával bóvül az orvoskör. Ilyenkor a meglevő rekordokat kell átmásolni és szak_megnevezésbe az új szakot kell beírni
 * 		  és a szükség szerinti módosításokat az egyes mezőkben is el kell végezni. Figyelem van 3 változó ($orvosnev,$id_orvos,$szak_megnevezes), amelyek az építés során behelyettesítésbe kerülnek!
 * 		* <b>felvilagosit0:</b> Itt már a területi függőség is belép az irányítószám kapcsán. A változó tartalmat kerületenkét ill. helyiségenként kell összevadászni (ügyeleti és szakrendelési információk, patikák, stb.)
 *		* <b>korzet0:</b> Ezt egyenlőre nem kell módosítani vagy bővíteni, mivel csak mintaként szolgál.
 * - Ezután az vissza kell menni az ovosAlapadat/index táblára:
 * 		* meg kell keresni az első újonan bevitt orvost és az epít  ikonra kell kattintani,
 * 		* ennek hatására elkezdődik az azonos rendelőben lévő összes orvos honlapjainak építése:
 * 			* kiíródik a rendelő címe, a hozzá tartozó orvosok száma,
 * 			* majd orvosonként a felépített oldalak listája siker esetén zöld színnel.
 * 			* végül az orvoshoz tartózó a képek tárolására szolgáló images/$id_orvos/ alkönytár krül létrehozásra.
 * - Az építés után az új oldalak ellenőrzése következik:
 * 		* Ha azok hibátlanok, akkor jöhet a következő új rendelőben lévő orvosok ahonlapjainak építése a fentiek szerint egészen addig mamíg az összes rekord feldolgozásra kerül.
 * 		* Ha hibát találtunk és ez az valamelyik új xyz0 tábla rekord tartalom hibából ered, akkor a következő az eljárás:
 * 			* Ki kell javítani a hibás rekordokat,
 * 			* Törölni kell az adott rekordokból felépített rekordokat,
 * 			* Újra kell indítani az építést! Az épit action észrevesz a már felépített rekordokat és azok építését kihagyja, helyette piros betűs hibaüzenetet küld.
 * 			  A kitörölt rekordokat azonban újraépíti és zöldbetűs üzenetet küld ezekről.
 * 	
 *   
 * @todo Az új orvosAlapadat rekord számának bevitelét automatizálni kell!
 * 
 * 
 * \section Dbsync A hazi-orvosok.hu és szeiffert.ddstandard.hu adatbázisainak összehasonlítása és szinkronizálása
 * Meghívás: ../admin/orvosAlapadat/Dbsync.<br>
 * Alapesetben az orvos adatbázisok kerülnek összehasonlításra.
 * - <b>Az első blokkban</b> az előzőleg végrehajtott művelet ünezeti jelennek meg.
 * - <b>A második blokkban</b> a két adatbázis jellemző adatai kerülnek kiírásra: Táblanév, sorok száma, hiányzó rekordok száma és listája 
 * - <b>A harmadik blokkban</b> az összehasonlító tábla jelenik meg az alábbi jelzéssel: Az első sorban a szeiffert, második sorban a hazi-orvosok.hu adatai láthatok. Jelőlések: egyenlő: <span font_color="#0000FF"> = </span>; <font color="#00FF00">Eltérés: Egymás alatt mind a két tartalom látható</font> ; <font color="#FF0000">Hiányzik: !!</font> 
 * - <b>A negyedik blokk</b> az adatbekérő form (táblanév, művelet, művelei irány kezdő és vég id, oszlop sorszá és megnevezés)
 * Lehetséges műveletek:
 *  - <b>Ha csak a táblákat</b> akarjuk összehasonlítani, akkor az irányt és a többi mezőt üresen kell hagyni
 *  - <b>Irány:</b> üres (nincs), Haziorvos-> Szeiffert vagy Szeiffert -> Haziorvos. Az első csak szinkronizáláshoz kell, általában a második kerül felhasználásra.
 *  - <b>Művelet:</b> üres (nincs),Beszúrás (INSERT) vagy Frissítés (UPDATE)
 *  - <b>Kezdő id</b> bármely kiválasztott műveletnél meg kell adni. Ha csak a kezdő id van megadva vagy a Kezdő id = Vég id, akkor csak egy rekordra lesz végrehajtva a művelet.
 *  - <b>Vég id</b> az utolsó végrehajtandó rekord id-je.
 *  - <b>Mező sorszám:</b> kitöltése csak a Frissítés műveletnél kell megadni
 *  - <b>Mező név:</b> az adott sorszámú mező neve (lásd a táblázat címsorában. 
 * Leggyakoribb művelet sorok:
 *  - Ha a két táblázat sorszámai nem stimmelnek, akkor a hiányzó rekordot a megfelelő irányban Beszúrással kell átvinni
 *  - Általában a szeiffert adatbázisban keletkeznek új rekordok, ezek táblánként egy - egy Beszúrás művelettel átvihetők.
 *  - Oszlop tartalmak módosítására a Frissítés műveletet célszerű használni.
 * @todo célszerű az átkódolást a control fájlban megoldani, így  mező név elhagyható!
 * @todo actionDbsync a tömörítés nem mindig jó!
 * 
 * \section epitContent A content tábla összes azonos nevű bejegyzésének újraépítésére
 * Előfordul, hogy az alaptartalom egyik rekordja módosításra kerül és az összes hozzátartozó már legenerált rekordot célszerű lenne újreépíteni. 
 * Az épít modul egy content tartalom újraépítését nem tesz lehetővé, ezért erre külön actin készült.
 * Ennek használata az alábbi:
 *  - Módosítani kell a megfelelő content0 tartalmakat (admin/alaptartalom)
 *  - phpMyadmin-nal ki kell keresni az újraépítendő rekordokat (vigyázni, kell, hogy a végleges oldalak ne kerüljenek bele!)
 *  - törölni kell az ellenőrzött leválogatást.
 *  - meg kell hívni a .../admin/orvosAlapadat/epitContent/name/home action, amelynek hatására a home nevű rekordok újraépítésre kerülnek az összes olyan orvosnál, 
 *  amelyiknél hiányzik a name=='home' rekord. A rekord a törölt helyére fog kerülni!
 *  - Az újraépítés után kézzel törlendő a id_orvos==200-as  és az összes törölve status-ú orvos rekordját!!! 
 *  - Ha az ellenőrzés a szeiffert honlapon sikerres, akkor a content0  váltotatását és a rekordok törlését a haziorvos adatbázison is végre kell hajtani.
 *  - Ezután a Dbsync content tábla beszúrás paranccsal az új rekordok átviendők.
 * 
 *  @todo {actionEpit id_orvos==200 és orvos->status=="törölve"  generálását automatikusan tiltani kellene!}
*/
