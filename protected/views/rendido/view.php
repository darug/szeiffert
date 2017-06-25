<?php
/* @var $this RendidoController */
/* @var $model Rendido */

$this->breadcrumbs=array(
	'Rendidos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Rendido', 'url'=>array('index')),
	array('label'=>'Create Rendido', 'url'=>array('create')),
	array('label'=>'Update Rendido', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Rendido', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rendido', 'url'=>array('admin')),
);
?>

<h1>View Rendido #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'title',
		'start',
		'stop',
		'comment',
	),
)); ?>
