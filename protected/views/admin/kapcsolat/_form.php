<?php
/* @var $this KapcsolatController */
/* @var $model Kapcsolat */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kapcsolat-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">A <span class="required">*</span>-gal jelölt mezök kitöltése kötelező!</p>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
<br />
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
<br />
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
<br />
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'email_to'); ?>
<br />
		<?php echo $form->textField($model,'email_to',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email_to'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
<br />
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_orvos'); ?>
<br />
		<?php echo $form->textField($model,'id_orvos'); ?>
		<?php echo $form->error($model,'id_orvos'); ?>
	</div>

	<div class="row">
		<?php echo 'Módosítva: '.$model->lastmod; ?>
	</div>
	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->