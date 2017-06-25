<?php
/* @var $this KepekAdminController */
/* @var $model Kepek */
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
		<?php echo $form->label($model,'kep'); ?>
		<?php echo $form->textField($model,'kep',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'szoveg'); ?>
		<?php echo $form->textField($model,'szoveg',array('size'=>60,'maxlength'=>128)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'rovid_leiras'); ?>
		<?php echo $form->textField($model,'rovid_leiras',array('size'=>60,'maxlength'=>128)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'fajta'); ?>
		<?php echo $form->textField($model,'fajta',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meret'); ?>
		<?php echo $form->textField($model,'meret',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mertek_egyseg'); ?>
		<?php echo $form->textField($model,'mertek_egyseg',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Keresés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->