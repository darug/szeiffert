<?php
/* @var $this RendidoController */
/* @var $model Rendido */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rendido-form',
	'enableAjaxValidation'=>true,
)); ?>
<h3> Használati utasítás:</h3>
<p>    </p>
<ul>
  <li>Name= napsorszama+napszak kötelező formátum! mivel az összes nap kitöltésre került, ezért ez a mezőnek a módosítható! </li>
  <li>Title= a nap neve, ez a mező nem módosítható! </li>
  <li>Start= kezdés óra:perc formában.Az órát 24 órás formában kell megadni, a perc megadása kötelező!</li>
  <li>Stop= befejezés időpontja, aszabályok azonosak ez előbbivel.</li>
  <li>Comment= egyéb kiírandó szöveg. A páros és páratlan hét után a kettős pont kirakása kötelező!</li>
</ul> 

	<p class="note">A <span class="required">*</span>-gal jelölt mezök kitöltése kötelező!</p>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>

		<?php echo $model->name; ?>
		<?php //echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php // echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $model->title; ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start'); ?>
<br />
		<?php echo $form->textField($model,'start',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stop'); ?>
<br />
		<?php echo $form->textField($model,'stop',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'stop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
<br />
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->