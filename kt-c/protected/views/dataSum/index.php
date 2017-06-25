<?php
/* @var $this DataSumController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Data Sums',
);

$this->menu=array(
	array('label'=>'Create DataSum', 'url'=>array('create')),
	array('label'=>'Manage DataSum', 'url'=>array('admin')),
);
?>

<h1>Data Sums</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
