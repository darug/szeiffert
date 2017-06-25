<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>64)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'authority'); ?>
		<?php echo $form->textField($model,'authority'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastmod'); ?>
		<?php echo $form->textField($model,'lastmod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->textField($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Keresés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->