<?php
/* @var $this KapcsolatController */
/* @var $model Kapcsolat */

$this->breadcrumbs=array(
	'Kapcsolats'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

?>
<?php echo $this->renderPartial('../_title'); ?>
<div class="container center">
	<div id="edit" style="width: 980px;">
		<?php echo  $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>