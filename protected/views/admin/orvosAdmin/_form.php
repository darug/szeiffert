<?php
/* @var $this OrvosAdminController */
/* @var $model Orvos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orvos-form',
	'enableAjaxValidation'=>FALSE,
)); ?>

	<p class="note">A <span class="required">*</span>-gal jelölt mezök kitöltése kötelező!</p>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
<br />
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_link'); ?>
<br />
		<?php echo $form->textField($model,'sub_link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sub_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_rendelo'); ?>
<br />
		<?php echo $form->textField($model,'id_rendelo'); ?>
		<?php echo $form->error($model,'id_rendelo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?>
<br />
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'layout'); ?>
<br />
		<?php echo $form->textField($model,'layout',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'layout'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'orvos_megnev'); ?>
<br />
		<?php echo $form->textField($model,'orvos_megnev',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'orvos_megnev'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
<br />
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'dname'); ?>
<br />
		<?php echo $form->textField($model,'dname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'dname'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'lastmod'); ?> : 
		<?php echo $model->lastmod; ?>
	</div>

	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->