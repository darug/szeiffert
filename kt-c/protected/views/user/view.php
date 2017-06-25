<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->title,
);
if(Yii::app()->user->name=='admin'){
$this->menu=array(
	array('label'=>'Felhasználók listázása', 'url'=>array('index')),
	array('label'=>'Új felhasználó létrehozása', 'url'=>array('create')),
	array('label'=>'Felhasználó módosítása', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Felhasználó törlése', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Felhasználók kezelése', 'url'=>array('admin')),
);}
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'title',
		'veznev',
		'kernev',
		'password',
		'nem',
		'szul_datum',
		'kategoria',
		'authority',
		'rememberMe',
		'id_old',
		'inger_szelesseg',
		'inger_szam',
		'mestime',
		'pausetime',
		'mesnum',
		'mini',
		'maxi',
		'atlag',
		'lastmod',
	),
)); ?>
