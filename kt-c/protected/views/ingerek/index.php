<?php
/* @var $this IngerekController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ingereks',
);

$this->menu=array(
	array('label'=>'Create Ingerek', 'url'=>array('create')),
	array('label'=>'Manage Ingerek', 'url'=>array('admin')),
);
?>

<h1>Ingereks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
