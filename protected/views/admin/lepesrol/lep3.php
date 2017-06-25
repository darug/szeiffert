<?php
/* @var $this LepesrolController */

$this->breadcrumbs=array(
	'Lepesrol',
);
?>
<div class="lepes">
<h1><?php echo $title; ?></h1>
<span class="blue"><b><ol start="2">
	<li>
	<p>l&eacute;p&eacute;s: Alapadatok be&aacute;ll&iacute;t&aacute;sa</p>
	</li>
</ol></b></span>
<!--<form id="uzenet-form" action="/ho/admin/uzenet/update/id/1/" method="post">-->
<form action="<?php echo $bUrl; ?>lep3"  method="post" id="config" name="config" target="_self">
<p>Kérem ide írja be az e-mail címét, ha az a Kapcsolat oldalon nem látszódik: <input maxlength="64" name="config[email_oldal]" id="config_email_oldal" style="height:0.77cm; width:7.25cm" type="TEXT" value="<?php echo $_POST['config']['email_oldal'];?>" /></p>

<p>Ellenőrizze a rendelő irányítószámát, és ha szükséges javítsa ki azt: <input maxlength="60" name="config[irszam]" id="config_iszam" style="height:0.77cm; width:7.25cm" type="TEXT" value="<?php echo $_POST['config']['irszam'];?>" /></p>

<p>Ellenőrizze a városnevét: <input maxlength="60" name="config[varos]" id="config_varos" style="height:0.77cm; width:7.25cm" type="TEXT" value="<?php echo $_POST['config']['varos'];?>"/></p>

<p>Ellenőrizze a rendelő címét: <input maxlength="60" name="config[cim]" id="config_cim" style="height:0.77cm; width:7.25cm" type="TEXT" value="<?php echo $_POST['config']['cim'];?>"/></p>

<p>Ellenőrizze a rendelői telefonszámát és szükség esetén javítsa ki: <input maxlength="30" name="config[telefonszam]" id="config_telefonszam" style="height:0.77cm; width:7.25cm" type="TEXT" value="<?php echo $_POST['config']['telefonszam'];?>" /></p>

<p class="blue"><input name="config[submit]" id="config_submit" style="height:0.98cm; width:2.01cm" type="SUBMIT" value="Küldés" /></p>
</form>

<p>Kérem a küldés után ellenőrizze a Kapcsolat oldalt, hogy látszódik az e-mail cím? (Lehet, hogy többszöri újratöltés szükséges!)</p>



<p class="blue"><a  href="<?php echo $bUrl; ?>lep4"><input name="lep4" type="button" value="Tovább a következő oldalra" /></a></p>