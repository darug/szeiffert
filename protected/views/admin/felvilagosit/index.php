<?php
/* @var $this FelvilagositController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Felvilagosits',
);
?>

<?php echo $this->renderPartial('../_title'); ?>
<p class="blue">Ezen az oldalon a Tájékoztatás menüpont almenü elemei láthatók, az egyes mezők funkciói a szerkesztés és az új funkcióknál kerül részletezésre</p>
<div class="container">
		<table id="lista" >
		<tr>
			<th width="2%">ID</th>
			<th width="8%">Name</th>
			<th width="8%">Title</th>
			<th width="12%">Link</th>
			<th width="20%">Rövid</th>
			<th width="34%">Hosszú leírás</th>
			<th width="8%">Megjegyzés</th>
			<th width="4%">Orvos id</th>
			<th>Módosítva</th>
			<th width="4%">Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>

