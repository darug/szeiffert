<?php
/* @var $this Orvosform1Controller */
/* @var $model Orvosform1 */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orvosform1-form',
	'enableAjaxValidation'=>FALSE,
)); ?>

	<p class="note">A <span class="required">*</span>-gal jelölt mezök kitöltése kötelező!</p>

	<div class="row">
		<?php echo $form->labelEx($model,'l_hasznos'); ?>
<br />
		<?php echo $form->textField($model,'l_hasznos'); ?>
		<?php echo $form->error($model,'l_hasznos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_ertheto'); ?>
<br />
		<?php echo $form->textField($model,'l_ertheto'); ?>
		<?php echo $form->error($model,'l_ertheto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_hasznos'); ?>
<br />
		<?php echo $form->textField($model,'h_hasznos'); ?>
		<?php echo $form->error($model,'h_hasznos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_attekint'); ?>
<br />
		<?php echo $form->textField($model,'h_attekint'); ?>
		<?php echo $form->error($model,'h_attekint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_celszeru'); ?>
<br />
		<?php echo $form->textField($model,'h_celszeru'); ?>
		<?php echo $form->error($model,'h_celszeru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_hiany'); ?>
<br />
		<?php echo $form->textField($model,'h_hiany',array('width'=>'500px','maxlength'=>255,'size'=>120)); ?>
		<?php echo $form->error($model,'h_hiany'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_legjobb'); ?>
<br />
		<?php echo $form->textField($model,'h_legjobb',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'h_legjobb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_kimaradt'); ?>
<br />
		<?php echo $form->textField($model,'h_kimaradt',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'h_kimaradt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_felesleg'); ?>
<br />
		<?php echo $form->textField($model,'h_felesleg',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'h_felesleg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?>
<br />
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastmod'); ?>
<br />
		<?php echo $form->textField($model,'lastmod'); ?>
		<?php echo $form->error($model,'lastmod'); ?>
	</div>

	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->