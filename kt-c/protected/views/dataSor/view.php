<?php
/* @var $this DataSorController */
/* @var $model DataSor */

$this->breadcrumbs=array(
	'Data Sors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DataSor', 'url'=>array('index')),
	array('label'=>'Create DataSor', 'url'=>array('create')),
	array('label'=>'Update DataSor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DataSor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DataSor', 'url'=>array('admin')),
);
?>

<h1>View DataSor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_data_sum',
		'm_time',
		'cf',
		'ff',
		'lastmod',
	),
)); ?>
