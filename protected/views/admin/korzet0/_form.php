<?php
/* @var $this Korzet0Controller */
/* @var $model Korzet0 */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'korzet0-form',
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
		<?php echo $form->labelEx($model,'title'); ?>
<br />
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'irszam'); ?>
<br />
		<?php echo $form->textField($model,'irszam'); ?>
		<?php echo $form->error($model,'irszam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?>
<br />
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kezdo_szam_paros'); ?>
<br />
		<?php echo $form->textField($model,'kezdo_szam_paros',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kezdo_szam_paros'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'veg_szam_paros'); ?>
<br />
		<?php echo $form->textField($model,'veg_szam_paros',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'veg_szam_paros'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kezdo_szam_paratlan'); ?>
<br />
		<?php echo $form->textField($model,'kezdo_szam_paratlan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kezdo_szam_paratlan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'veg_szam_paratlan'); ?>
<br />
		<?php echo $form->textField($model,'veg_szam_paratlan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'veg_szam_paratlan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'utca'); ?>
<br />
		<?php echo $form->textField($model,'utca',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'utca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_orvos'); ?>
<br />
		<?php echo $form->textField($model,'id_orvos'); ?>
		<?php echo $form->error($model,'id_orvos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_rendelo'); ?>
<br />
		<?php echo $form->textField($model,'id_rendelo'); ?>
		<?php echo $form->error($model,'id_rendelo'); ?>
	</div>
	<div>
		<?php echo 'Módosítva: '.$model->lastmod; ?>
	</div>
	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->