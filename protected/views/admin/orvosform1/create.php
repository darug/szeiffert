<?php
/* @var $this Orvosform1Controller */
/* @var $model Orvosform1 */

$this->breadcrumbs=array(
	'Orvosform1s'=>array('index'),
	'Create',
);

?>
<?php echo $this->renderPartial('../_title'); ?>
<div class="container center">
	<div id="edit" style="width: 980px;">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>