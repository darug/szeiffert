<?php
/* @var $this IngerDataController */
/* @var $model IngerData */

$this->breadcrumbs=array(
	'Inger Datas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List IngerData', 'url'=>array('index')),
	array('label'=>'Create IngerData', 'url'=>array('create')),
	array('label'=>'Update IngerData', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IngerData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IngerData', 'url'=>array('admin')),
);
?>

<h1>View IngerData #<?php echo $model->id; ?></h1>

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
		'ch',
		'fh',
		'tcorr',
		'megjegyzes',
		'lastmod',
	),
)); ?>
