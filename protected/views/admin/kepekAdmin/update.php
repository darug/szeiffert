<?php
/* @var $this KepekAdminController */
/* @var $model Kepek */

$this->breadcrumbs=array(
	'Kepeks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<?php echo $this->renderPartial('../_title'); ?>

<?php echo $this->renderPartial('_formu', array('model'=>$model)); ?>