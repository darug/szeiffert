<?php
/* @var $this KorzetAdminController */
/* @var $model Korzet */

$this->breadcrumbs=array(
	'Korzets'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);


?>

<h1>Körzetrész módosítása #<?php echo $model->id ; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,
												'id_rendelo'=>$id_rendelo)); ?>