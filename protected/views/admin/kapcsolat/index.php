<?php
/* @var $this KapcsolatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kapcsolats',
);

?>

<?php echo $this->renderPartial('../_title'); ?>
<p class="blue">Ebben a táblában a kapcsolat oldalon keresztül elküldött üzenetek láthatók</p>
<div class="container">
		<table id="lista" >
		<tr>
					<th>ID</th>
						<th>Küldő neve</th>
						<th>Tárgy</th>
						<th>Email cím</th>
						<th>Fogadó email címe</th>
						<th>Üzenet</th>
						<th>Orvos id</th>
						<th>Módosítva</th>
						<th>Műveletek</th>
		</tr>
		
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>