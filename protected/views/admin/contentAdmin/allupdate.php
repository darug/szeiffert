<?php
/* @var $this ContentAdminController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

?>

<?php echo $this->renderPartial('../_title'); ?>

<div class="container center">
	<div id="edit" style="width: 980px;">
		<?php echo $this->renderPartial('_formallupdate', array('model'=>$model,'uzenet'=>$uzenet)); ?>
	</div>
</div>