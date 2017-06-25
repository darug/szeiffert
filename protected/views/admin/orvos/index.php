<?php
/* @var $this OrvosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Orvoses',
);

?>

<?php echo $this->renderPartial('../_title'); ?>
<div class="container">
		<table id="lista" >
		<tr>
					<th>ID</th>
						<th>Name</th>
						<th>Sub Link</th>
						<th>Id Rendelo</th>
						<th>Megjegyzes</th>
						<th>Layout</th>
						<th>Végzettség</th>
						<th>Státusz</th>
						<th>Utolsó módosítás</th>
						<th>Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>