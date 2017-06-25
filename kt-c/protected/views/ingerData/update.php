<?php
/* @var $this IngerDataController */
/* @var $model IngerData */

$this->breadcrumbs=array(
	'Inger Datas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List IngerData', 'url'=>array('index')),
	array('label'=>'Create IngerData', 'url'=>array('create')),
	array('label'=>'View IngerData', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage IngerData', 'url'=>array('admin')),
);
?>

<h1>Update IngerData <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>