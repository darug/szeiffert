<?php
/* @var $this UzenetController */
/* @var $model Uzenet */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'uzenet-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="blue">A <span class="required">*</span>-gal jelölt mezök kitöltése kötelező!</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->hiddenField($model,'id'); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'uzenet'); ?><br />
		<?php echo $form->textField($model,'uzenet',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'uzenet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ervenyes'); ?><span class="blue"> Az üzenet a beírt dátum napján már nem jelenik meg! (Dátum formája: 2014-02-14)</span><br />
		<?php echo $form->textField($model,'ervenyes'); ?>
		<?php echo $form->error($model,'ervenyes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?><br />
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>

	<div class="row">
		<?php echo $form->checkBox($model,'valid'); ?>
		<?php echo $form->labelEx($model,'valid'); ?> <span class="blue"> Tovább fejlesztéshez, jelenleg nem használt!</span>
		<?php echo $form->error($model,'valid'); ?>
	</div>

	<div class="row">
<?php if(Yii::app()->user->name=='admin'){ ?>
		<?php echo $form->labelEx($model,'id_orvos'); ?><br />
		<?php echo $form->textField($model,'id_orvos',array('size'=>10,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'id_orvos'); ?>
<?php  } else { ?>
		<?php echo $form->labelEx($model,'id_orvos'); ?>: <?php echo Yii::app()->params['orvos']?> 
		<input type="hidden" name="Uzenet[id_orvos]" id="Uzenet_id_orvos" value="<?php echo Yii::app()->params['orvos']?>" />
<?php } ?>
	</div>
	<div>
		<?php echo 'Módosítva: '.$model->lastmod; ?>
	</div>
		
	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
