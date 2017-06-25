<?php
/* @var $this IngerekController */
/* @var $model Ingerek */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ingerek-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'inger_hossz'); ?>
		<?php echo $form->textField($model,'inger_hossz'); ?>
		<?php echo $form->error($model,'inger_hossz'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inger'); ?>
		<?php echo $form->textField($model,'inger',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'inger'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inger_typ'); ?>
		<?php echo $form->textField($model,'inger_typ'); ?>
		<?php echo $form->error($model,'inger_typ'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?>
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastmod'); ?>
		<?php echo $form->textField($model,'lastmod'); ?>
		<?php echo $form->error($model,'lastmod'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->