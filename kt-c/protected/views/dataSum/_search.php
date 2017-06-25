<?php
/* @var $this DataSumController */
/* @var $model DataSum */
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
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inger_szelesseg'); ?>
		<?php echo $form->textField($model,'inger_szelesseg'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inger_start'); ?>
		<?php echo $form->textField($model,'inger_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inger_lepes'); ?>
		<?php echo $form->textField($model,'inger_lepes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_eredm'); ?>
		<?php echo $form->textField($model,'id_eredm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inger_szam'); ?>
		<?php echo $form->textField($model,'inger_szam'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ri'); ?>
		<?php echo $form->textField($model,'ri'); ?>
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
		<?php echo $form->label($model,'tcorr'); ?>
		<?php echo $form->textField($model,'tcorr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'megjegyzes'); ?>
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>64)); ?>
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