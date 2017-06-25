<?php
/* @var $this KepekAdminController */
/* @var $model Kepek */

$this->breadcrumbs=array(
	'Kepeks'=>array('index'),
	'Create',
);
?>

<?php echo $this->renderPartial('../_title'); ?>

<div class="container center">
	<div id="edit" style="width: 980px;">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>