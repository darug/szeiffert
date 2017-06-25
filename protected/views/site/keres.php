<?php
$this->pageTitle='Orvos keresési lehetőségek';
$bUrl = Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos'];
?>

<h1><i><?php echo CHtml::encode($this->pageTitle); ?></i></h1>

<p class="blue">Ezen az oldalon <b>jelenleg</b> csak az általunk üzemeltetett honlapok között tud keresni, az alábbi lehetőségek alapján: </p>
<table>
	<tr><th aling=left size=35%>Keresési lehetőség</th><th aling= left size=65%>Összegző információk</th></tr>
	<tr><td><a href="<?php echo $bUrl; ?>/rendelo/keres">Keresés a rendelők között</a></td><td>Irányítószámok száma: <?php echo count($irszam_szam) ?> 
		db&nbsp;&nbsp;Rendelők száma: <?php echo count($rendelo_szam) ?> db</td></tr>
	<tr><td><a href="<?php echo $bUrl; ?>/orvos/keres">Keresés az orvosok között</a></td><td>Orvosok száma: <?php echo count($orvos_szam) ?></td></tr>
	<tr><td><a href="<?php echo $bUrl; ?>/korzet/keres">Keresés a lakcím alapján</a></td><td>Kitöltött körzetek száma: <?php echo count($orvos_korzet_ok) ?> db</td></tr>
</table>
