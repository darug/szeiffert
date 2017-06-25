<?php
/* @var $this DataSorController */
/* @var $model DataSor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'data-sor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_data_sum'); ?>
		<?php echo $form->textField($model,'id_data_sum'); ?>
		<?php echo $form->error($model,'id_data_sum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m_time'); ?>
		<?php echo $form->textField($model,'m_time'); ?>
		<?php echo $form->error($model,'m_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cf'); ?>
		<?php echo $form->textField($model,'cf'); ?>
		<?php echo $form->error($model,'cf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ff'); ?>
		<?php echo $form->textField($model,'ff'); ?>
		<?php echo $form->error($model,'ff'); ?>
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