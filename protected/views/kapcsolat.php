<?php
/* @var $this KapcsolatController */
/* @var $model Kapcsolat */
/* @var $form CActiveForm */
?>
<h1>Elérhetőség</h1>
<h2></h2>
<?php /*
$record=$model->find('item=:item',array(':item'=>'irszam'));
$cim=$record->value;
$record=$model->find('item=:item',array(':item'=>'varos'));
$cim.=" ".$record->value;
$record=$model->find('item=:item',array(':item'=>'cim'));
$cim.=" ".$record->value;*/
?>
<p>Levelezési cím: aaa<?php echo $model->cim() ;?></p>
<p>E-mail cím: <?php echo $model->config('email_oldal') ;?></p>
<p>Telefon: <?php echo $model->config('telefon') ;?></p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kapcsolat-kapcsolat-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">A <span class="required">*</span>-gal jelzett mezők kitöltése kötelező!</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'item'); ?>
		<?php echo $form->textField($model,'item'); ?>
		<?php echo $form->error($model,'item'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value'); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'label'); ?>
		<?php echo $form->textField($model,'label'); ?>
		<?php echo $form->error($model,'label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category'); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Küldés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->