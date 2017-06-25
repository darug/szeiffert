<?php
/* @var $this UzenetController */
/* @var $model Uzenet */

$this->breadcrumbs=array(
	'Uzenets'=>array('index'),
	'Create',
);

?>

<?php echo $this->renderPartial('../_title'); ?>
<div class="container center">
	<div id="edit" style="width: 980px;">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>