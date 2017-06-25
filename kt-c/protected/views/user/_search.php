<?php
/* @var $this UserController */
/* @var $model User */
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
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'veznev'); ?>
		<?php echo $form->textField($model,'veznev',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kernev'); ?>
		<?php echo $form->textField($model,'kernev',array('size'=>24,'maxlength'=>24)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nem'); ?>
		<?php echo $form->textField($model,'nem',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'szul_datum'); ?>
		<?php echo $form->textField($model,'szul_datum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kategoria'); ?>
		<?php echo $form->textField($model,'kategoria',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'authority'); ?>
		<?php echo $form->textField($model,'authority'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->textField($model,'rememberMe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_old'); ?>
		<?php echo $form->textField($model,'id_old',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inger_szelesseg'); ?>
		<?php echo $form->textField($model,'inger_szelesseg'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inger_szam'); ?>
		<?php echo $form->textField($model,'inger_szam'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mestime'); ?>
		<?php echo $form->textField($model,'mestime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pausetime'); ?>
		<?php echo $form->textField($model,'pausetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mesnum'); ?>
		<?php echo $form->textField($model,'mesnum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mini'); ?>
		<?php echo $form->textField($model,'mini'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maxi'); ?>
		<?php echo $form->textField($model,'maxi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'atlag'); ?>
		<?php echo $form->textField($model,'atlag'); ?>
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