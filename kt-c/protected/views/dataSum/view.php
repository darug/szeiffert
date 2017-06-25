<?php
/* @var $this DataSumController */
/* @var $model DataSum */

$this->breadcrumbs=array(
	'Data Sums'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DataSum', 'url'=>array('index')),
	array('label'=>'Create DataSum', 'url'=>array('create')),
	array('label'=>'Update DataSum', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DataSum', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DataSum', 'url'=>array('admin')),
);
?>

<h1>View DataSum #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user',
		'inger_szelesseg',
		'inger_start',
		'inger_lepes',
		'id_eredm',
		'inger_szam',
		'ri',
		'cf',
		'ff',
		'tcorr',
		'megjegyzes',
		'lastmod',
	),
)); ?>
