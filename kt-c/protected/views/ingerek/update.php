<?php
/* @var $this IngerekController */
/* @var $model Ingerek */

$this->breadcrumbs=array(
	'Ingereks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ingerek', 'url'=>array('index')),
	array('label'=>'Create Ingerek', 'url'=>array('create')),
	array('label'=>'View Ingerek', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ingerek', 'url'=>array('admin')),
);
?>

<h1>Update Ingerek <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>