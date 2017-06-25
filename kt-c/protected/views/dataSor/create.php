<?php
/* @var $this DataSorController */
/* @var $model DataSor */

$this->breadcrumbs=array(
	'Data Sors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DataSor', 'url'=>array('index')),
	array('label'=>'Manage DataSor', 'url'=>array('admin')),
);
?>

<h1>Create DataSor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>