<?php
/* @var $this DataSumController */
/* @var $model DataSum */

$this->breadcrumbs=array(
	'Data Sums'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DataSum', 'url'=>array('index')),
	array('label'=>'Create DataSum', 'url'=>array('create')),
	array('label'=>'View DataSum', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DataSum', 'url'=>array('admin')),
);
?>

<h1>Update DataSum <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>