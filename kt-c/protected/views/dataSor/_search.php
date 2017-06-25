<?php
/* @var $this DataSorController */
/* @var $model DataSor */
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
		<?php echo $form->label($model,'id_data_sum'); ?>
		<?php echo $form->textField($model,'id_data_sum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_time'); ?>
		<?php echo $form->textField($model,'m_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cf'); ?>
		<?php echo $form->textField($model,'cf'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ff'); ?>
		<?php echo $form->textField($model,'ff'); ?>
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