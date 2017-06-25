<?php
/* @var $this RendidoAdminController */
/* @var $model Rendido */

$this->breadcrumbs=array(
	'Rendidos'=>array('index'),
	'Create',
);

?>
<?php echo $this->renderPartial('../_title'); 
if(Yii::app()->user->name !='admin'){ ?>
<h1>Biztonsági okokból új rekord létrehozása nem megengedett!!</h1>
<?php } else {?>
	
<div class="container center">
	<div id="edit" style="width: 980px;">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div> 
<?php } ?>