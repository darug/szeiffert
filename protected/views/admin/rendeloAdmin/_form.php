<?php
/* @var $this RendeloAdminController */
/* @var $model Rendelo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rendelo-form',
	'enableAjaxValidation'=>FALSE,
)); ?>

	<p class="note">A <span class="required">*</span>-gal jelölt mezök kitöltése kötelező!</p>

	<div class="row">
		<?php echo $form->labelEx($model,'irszam'); ?>
<br />
		<?php echo $form->textField($model,'irszam'); ?>
		<?php echo $form->error($model,'irszam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'varos'); ?>
<br />
		<?php echo $form->textField($model,'varos',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'varos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cim'); ?>
<br />
		<?php echo $form->textField($model,'cim',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cim'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefon'); ?>
<br />
		<?php echo $form->textField($model,'telefon',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telefon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
<br />
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rend_nev'); ?>
<br />
		<?php echo $form->textField($model,'rend_nev',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rend_nev'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orvos_szam'); ?>
<br />
		<?php echo $form->textField($model,'orvos_szam'); ?>
		<?php echo $form->error($model,'orvos_szam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?>
<br />
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastmod'); ?>
		<?php echo $model->lastmod; ?>
		<?php echo $form->error($model,'lastmod'); ?>
	</div>

	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->