<?php
/* @var $this IngerDataController */
/* @var $model IngerData */

$this->breadcrumbs=array(
	'Inger Datas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List IngerData', 'url'=>array('index')),
	array('label'=>'Create IngerData', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#inger-data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Inger Datas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inger-data-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_user',
		'inger_szelesseg',
		'inger_start',
		'inger_lepes',
		'id_eredm',
		/*
		'inger_szam',
		'ri',
		'ch',
		'fh',
		'tcorr',
		'megjegyzes',
		'lastmod',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
