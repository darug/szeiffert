<?php
/* @var $this RendeloController */
/* @var $model Rendelo */

$this->breadcrumbs=array(
	'Rendelos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Rendelo', 'url'=>array('index')),
	array('label'=>'Create Rendelo', 'url'=>array('create')),
	array('label'=>'Update Rendelo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Rendelo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rendelo', 'url'=>array('admin')),
);
?>

<h1>View Rendelo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'irszam',
		'varos',
		'cim',
		'telefon',
		'email',
		'rend_nev',
		'orvos_szam',
		'megjegyzes',
		'lastmod',
	),
)); ?>
