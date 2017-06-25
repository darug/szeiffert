<?php //új érték a menü linkekhez!
if(Yii::app()->params['orvos'] > 0)
	{$bUrllink=Yii::app()->request->baseUrl."/".Yii::app()->params['orvos'];} 
else {$bUrllink=Yii::app()->request->baseUrl;}
?>
<li><a href="<?php echo $bUrllink; ?>/admin/contentAdmin/index">Tartalmi oldalak</a></li>
<li><a href="<?php echo $bUrllink; ?>/admin/uzenetAdmin/">Üzenetek</a></li>
<li><a href="<?php echo $bUrllink; ?>/admin/KapcsolatAdmin/">Honlapon küldött üzenetek</a></li>
<li><a href="<?php echo $bUrllink; ?>/admin/korzetAdmin/">Körzet</a></li>
<li><a href="<?php echo $bUrllink; ?>/admin/felvilagositAdmin/">Tájékoztatók</a></li>
<li><a href="<?php echo $bUrllink; ?>/admin/rendidoAdmin/">Rendelési idő</a></li>
<li><a href="<?php echo $bUrllink; ?>/admin/kepekAdmin/">Kép feltöltés</a></li>
<li><a href="<?php echo $bUrllink; ?>/admin/imagesAdmin/">Kép könyvtár ellenőrzés</a></li>