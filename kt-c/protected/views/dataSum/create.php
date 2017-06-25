<?php
/* @var $this DataSumController */
/* @var $model DataSum */

$this->breadcrumbs=array(
	'Data Sums'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DataSum', 'url'=>array('index')),
	array('label'=>'Manage DataSum', 'url'=>array('admin')),
);
?>

<h1>Create DataSum</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>