<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);
?>

<?php echo $this->renderPartial('../_title'); ?>
<?php if(Yii::app()->user->name=='admin'){ ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php } else {echo "<p class=\"red\">Önnek nincs jogosultsága új felhasználó létrehozására!</p>";}?>
