<?php
/* @var $this IngerDataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inger Datas',
);

$this->menu=array(
	array('label'=>'Create IngerData', 'url'=>array('create')),
	array('label'=>'Manage IngerData', 'url'=>array('admin')),
);
?>

<h1>Inger Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
