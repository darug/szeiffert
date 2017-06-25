<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);


?>

<?php echo $this->renderPartial('../_title'); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>