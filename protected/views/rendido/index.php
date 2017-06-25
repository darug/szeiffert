<?php
/* @var $this RendidoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rendidos',
);

$this->menu=array(
	array('label'=>'Create Rendido', 'url'=>array('create')),
	array('label'=>'Manage Rendido', 'url'=>array('admin')),
);
?>

<h1>Rendidos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
