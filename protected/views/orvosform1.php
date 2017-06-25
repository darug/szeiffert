<?php
/* @var $this Orvosform1Controller */
/* @var $model Orvosform1 */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orvosform1-orvosform1-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'l_hasznos'); ?>
		<?php echo $form->textField($model,'l_hasznos'); ?>
		<?php echo $form->error($model,'l_hasznos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_ertheto'); ?>
		<?php echo $form->textField($model,'l_ertheto'); ?>
		<?php echo $form->error($model,'l_ertheto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_hasznos'); ?>
		<?php echo $form->textField($model,'h_hasznos'); ?>
		<?php echo $form->error($model,'h_hasznos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_attekint'); ?>
		<?php echo $form->textField($model,'h_attekint'); ?>
		<?php echo $form->error($model,'h_attekint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_celszeru'); ?>
		<?php echo $form->textField($model,'h_celszeru'); ?>
		<?php echo $form->error($model,'h_celszeru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_hiany'); ?>
		<?php echo $form->textField($model,'h_hiany'); ?>
		<?php echo $form->error($model,'h_hiany'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_legjobb'); ?>
		<?php echo $form->textField($model,'h_legjobb'); ?>
		<?php echo $form->error($model,'h_legjobb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_kimaradt'); ?>
		<?php echo $form->textField($model,'h_kimaradt'); ?>
		<?php echo $form->error($model,'h_kimaradt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_felesleg'); ?>
		<?php echo $form->textField($model,'h_felesleg'); ?>
		<?php echo $form->error($model,'h_felesleg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?>
		<?php echo $form->textField($model,'megjegyzes'); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->