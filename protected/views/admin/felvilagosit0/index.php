<?php
/* @var $this Felvilagosit0Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Felvilagosit0s',
);

?>

<?php echo $this->renderPartial('../_title'); ?>
<div class="container">
		<table id="lista" >
		<tr>
					<th>ID</th>
						<th>Name</th>
						<th>Title</th>
						<th>Link</th>
						<th>Rovid</th>
						<th>Hosszu</th>
						<th>Megjegyzes</th>
						<th>Id Orvos</th>
						<th>Irszam</th>
						<th>Szakterület</th>
						<th>Módosítva</th>
						<th>Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>