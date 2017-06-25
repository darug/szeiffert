<?php
/* @var $this OrvosController */
/* @var $model Orvos */

$this->breadcrumbs=array(
	'Orvoses'=>array('index'),
	'Create',
);

?>
<?php echo $this->renderPartial('../_title'); ?>
<div class="container center">
	<div id="edit" style="width: 980px;">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>