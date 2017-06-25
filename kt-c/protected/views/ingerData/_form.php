<?php
/* @var $this IngerDataController */
/* @var $model IngerData */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inger-data-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inger_szelesseg'); ?>
		<?php echo $form->textField($model,'inger_szelesseg'); ?>
		<?php echo $form->error($model,'inger_szelesseg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inger_start'); ?>
		<?php echo $form->textField($model,'inger_start'); ?>
		<?php echo $form->error($model,'inger_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inger_lepes'); ?>
		<?php echo $form->textField($model,'inger_lepes'); ?>
		<?php echo $form->error($model,'inger_lepes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_eredm'); ?>
		<?php echo $form->textField($model,'id_eredm'); ?>
		<?php echo $form->error($model,'id_eredm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inger_szam'); ?>
		<?php echo $form->textField($model,'inger_szam'); ?>
		<?php echo $form->error($model,'inger_szam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ri'); ?>
		<?php echo $form->textField($model,'ri'); ?>
		<?php echo $form->error($model,'ri'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ch'); ?>
		<?php echo $form->textField($model,'ch'); ?>
		<?php echo $form->error($model,'ch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fh'); ?>
		<?php echo $form->textField($model,'fh'); ?>
		<?php echo $form->error($model,'fh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tcorr'); ?>
		<?php echo $form->textField($model,'tcorr'); ?>
		<?php echo $form->error($model,'tcorr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?>
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>64)); ?>
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