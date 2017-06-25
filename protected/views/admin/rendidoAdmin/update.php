<?php
/* @var $this RendidoAdminController */
/* @var $model Rendido */

$this->breadcrumbs=array(
	'Rendidos'=>array('index'),
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