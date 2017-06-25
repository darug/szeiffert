<?php
/* @var $this KorzetAdminController */
/* @var $model Korzet */

$this->breadcrumbs=array(
	'Korzets'=>array('index'),
	'Create',
);


?>
<?php echo $this->renderPartial('../_title'); ?>


<?php echo $this->renderPartial('_form', array('model'=>$model,
												'id_rendelo'=>$id_rendelo)); ?>