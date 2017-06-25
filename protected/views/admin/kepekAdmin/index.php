<?php
/* @var $this KepekAdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kepeks',
);
?>

<?php echo $this->renderPartial('../_title'); ?>
<div Class="container">
	<div class="edit">
	<h3> &nbsp;&nbsp;&nbsp;Ez az oldal a képek adatainak szerkesztésere alkalmas</h3>
<p class="blue">Magát a képeket a "Kép könyvtár ellenőrzés" modulban lehet ellenőrizni, törölni!</p> 
<div class="container">
		<table id="lista" >
		<tr>
			<th width="4%">ID</th>
			<th width="12%">Kép fájl neve</th>
			<th width="12%">Kép</th>
			<th width="12%">Szöveg a kép azonosítására</th>
			<th width="20%">Rövid leírás</th>
			<th width="10%">Kategória</th>
			<th width="6%">Linkek száma</th>
			<th width="16%">Megjegyzés</th>
			<th width="4%">Orvos ID</th>
			<th>Módosítva</th>
			<th width="4%">Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$kepek,
	'itemView'=>'_view',
)); ?>
</table>
</div>
</div>
 