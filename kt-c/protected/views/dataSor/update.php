<?php
/* @var $this DataSorController */
/* @var $model DataSor */

$this->breadcrumbs=array(
	'Data Sors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DataSor', 'url'=>array('index')),
	array('label'=>'Create DataSor', 'url'=>array('create')),
	array('label'=>'View DataSor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DataSor', 'url'=>array('admin')),
);
?>

<h1>Update DataSor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>