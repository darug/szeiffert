<?php
/* @var $this ContentController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Hiba az oldalon</h2>
<p class="error">A keresett tartalom nem található, vagy nincs jogosultsága az oldal eléréséhez!</p>
<div class="error">
<?php echo CHtml::encode($message); ?>
<br>
<?php echo CHtml::encode($error); ?>
</div>