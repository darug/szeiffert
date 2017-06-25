<?php
/* @var $this KepekController */
/* @var $model Kepek */
/* @var $form CActiveForm */
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kepek-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	<div class="container">
	<div id="edit">
	<?php echo $form->errorSummary($model); ?>
	<div class="flash-success">
	<div class="row">
		<?php echo $form->labelEx($model,'kep'); ?><br>
		<?php echo $form->textField($model,'kep',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'kep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'szoveg'); ?><br>
		<?php echo $form->textField($model,'szoveg',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'szoveg'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'rovid_leiras'); ?><br>
		<?php echo $form->textField($model,'rovid_leiras',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'rovid_leiras'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'fajta'); ?><br>
		<?php echo $form->textField($model,'fajta',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'fajta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meret'); ?><span class="blue"> = ahány helyen hivatkozunk rá</span><br>
		<?php echo $form->textField($model,'meret',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'meret'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mertek_egyseg'); ?><br>
		<?php echo $form->textField($model,'mertek_egyseg',array('size'=>80,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'mertek_egyseg'); ?>
	</div>
	<div class="row">
				<?php if(Yii::app()->user->name=='admin'){ ?>
							<?php echo $form->labelEx($model,'id_orvos'); ?><br />
							<?php echo $form->textField($model,'id_orvos',array('size'=>10,'maxlength'=>15)); ?>
							<?php echo $form->error($model,'id_orvos'); ?>
				<?php  } else { ?>
							<?php echo $form->labelEx($model,'id_orvos'); ?>: <?php echo Yii::app()->params['orvos']?> 
							<input type="hidden" name="Kepek[id_orvos]" id="Kepek_id_orvos" value="<?php echo Yii::app()->params['orvos']?>" />
				<?php } ?>
	</div>
	<div class"row">
		<?php echo 'Módosítva: '.$model->lastmod; ?>
	</div>
	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>