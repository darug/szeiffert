<?php
/* @var $this Orvosform1Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Orvosform1s',
);

?>

<?php echo $this->renderPartial('../_title'); ?>
<div class="container">
		<table id="lista" >
		<tr>
					<th>ID</th>
						<th>L Hasznos</th>
						<th>L Ertheto</th>
						<th>H Hasznos</th>
						<th>H Attekint</th>
						<th>H Celszeru</th>
						<th>H Hiany</th>
						<th>H Legjobb</th>
						<th>H Kimaradt</th>
						<th>H Felesleg</th>
						<th>Megjegyzes</th>
						<th>Kitoltve</th>
						<th>Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>