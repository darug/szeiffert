<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
if(Yii::app()->user->name=='admin'){
$this->menu=array(
	array('label'=>'Felhasználók listázása', 'url'=>array('index')),
	array('label'=>'Új felhasználó létrehozása', 'url'=>array('create')),
	array('label'=>'Felhasználó megtekintése', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Felhasználók kezelése', 'url'=>array('admin')),
);}
?>

<h1>Update User <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>