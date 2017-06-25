<?php
/* @var $this IngerekController */
/* @var $model Ingerek */

$this->breadcrumbs=array(
	'Ingereks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ingerek', 'url'=>array('index')),
	array('label'=>'Manage Ingerek', 'url'=>array('admin')),
);
?>

<h1>Create Ingerek</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>