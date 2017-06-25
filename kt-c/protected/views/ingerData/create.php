<?php
/* @var $this IngerDataController */
/* @var $model IngerData */

$this->breadcrumbs=array(
	'Inger Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IngerData', 'url'=>array('index')),
	array('label'=>'Manage IngerData', 'url'=>array('admin')),
);
?>

<h1>Create IngerData</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>