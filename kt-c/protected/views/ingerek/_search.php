<?php
/* @var $this IngerekController */
/* @var $model Ingerek */
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
		<?php echo $form->label($model,'inger_hossz'); ?>
		<?php echo $form->textField($model,'inger_hossz'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inger'); ?>
		<?php echo $form->textField($model,'inger',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inger_typ'); ?>
		<?php echo $form->textField($model,'inger_typ'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'megjegyzes'); ?>
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastmod'); ?>
		<?php echo $form->textField($model,'lastmod'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->