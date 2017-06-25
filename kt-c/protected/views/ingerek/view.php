<?php
/* @var $this IngerekController */
/* @var $model Ingerek */

$this->breadcrumbs=array(
	'Ingereks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ingerek', 'url'=>array('index')),
	array('label'=>'Create Ingerek', 'url'=>array('create')),
	array('label'=>'Update Ingerek', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ingerek', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ingerek', 'url'=>array('admin')),
);
?>

<h1>View Ingerek #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'inger_hossz',
		'inger',
		'inger_typ',
		'megjegyzes',
		'lastmod',
	),
)); ?>
