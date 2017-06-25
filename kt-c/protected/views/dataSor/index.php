<?php
/* @var $this DataSorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Data Sors',
);

$this->menu=array(
	array('label'=>'Create DataSor', 'url'=>array('create')),
	array('label'=>'Manage DataSor', 'url'=>array('admin')),
);
?>

<h1>Data Sors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
