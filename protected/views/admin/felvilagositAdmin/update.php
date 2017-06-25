<?php
/* @var $this FelvilagositAdminController */
/* @var $model Felvilagosit */

$this->breadcrumbs=array(
	'Felvilagosits'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

?>

<?php echo $this->renderPartial('../_title'); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>