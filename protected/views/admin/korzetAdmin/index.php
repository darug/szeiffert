<?php
/* @var $this KorzetAdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Körzet határ',
);
?>

<?php echo $this->renderPartial('../_title'); ?>
<p class="blue">Ez a tábla a körzethez tartozó utcák nyilvántartására szolgál<br>
	Amennyiben az utca teljes egészében a körzethet tartozik, akkor a kezdő és vészámokat nem szabad kitölteni!
</p>
<div class="container">
		<table id="lista" >
		<tr>
			<th width="4%">ID</th>
			<th width="6%">Name</th>
			<th width="5%">Körzet</th>
			<th width="5%">Irszám</th>
			<th width="17%">Utca név</th>
			<th width="20%">Megjegyzés</th>
			<th width="5%">Kezdő szám páros</th>
			<th width="5%">Kezdő szám páratlan</th>
			<th width="5%">Vég szám páros</th>
			<th width="5%">Vég szám páratlan</>
			<th width="4%">Orvos id</th>
			<th width="4%">Rendelő id</th>
			<th>Módosítva</th>
			<th width="5%">Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>
