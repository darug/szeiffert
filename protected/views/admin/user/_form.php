<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="container">
	<div id="edit">
	<p class="note">A <span class="required">*</span>-gal jelölt mezők kitöltése kötelező!</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id').": ";?>
		<?php if($model->id!=''){ echo $model->id;} else {
			echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10));
		}  ?> 
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php if(Yii::app()->user->name=='admin'){echo "<br>".$form->textField($model,'username',array('size'=>60,'maxlength'=>64));}
		else {echo $model->username;} ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		
		<p class="blue">Jelszó változtatáskor töröld ki a régít és írd be az újat!</p>
		<?php echo $form->labelEx($model,'password'); ?>
		<br>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div>
		<p> Jelszó ismétlés: * </p>
		<input size="60" maxlength="255" name="User[password2]" id="User_password2" type="password" value="" />
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<br>
		<?php if(!$this->fadmin){echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255));}
		else {echo $model->title;} ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<input type="hidden" name="User[authority]" id="User_authority" value="0" />
   <?php if(Yii::app()->user->name=='admin'){ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'authority'); ?>
		<br>
		<?php echo $form->textField($model,'authority'); ?>
		<?php echo $form->error($model,'authority'); ?>
	</div>
<?php } ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'lastmod'); ?>
		<br>
		<?php echo date("Y-m-d H:m:i",$model->lastmod); ?>
		<?php echo $form->error($model,'lastmod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rememberMe'); ?>
		<br>
		<?php echo $form->textField($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row">
				<?php if(Yii::app()->user->name=='admin'){ ?>
							<?php echo $form->labelEx($model,'id_orvos'); ?><br />
							<?php echo $form->textField($model,'id_orvos',array('size'=>10,'maxlength'=>15)); ?>
							<?php echo $form->error($model,'id_orvos'); ?><br/>
							<?php echo $form->labelEx($model,'id_rendelo'); ?><br />
							<?php echo $form->textField($model,'id_rendelo',array('size'=>10,'maxlength'=>15)); ?>
							<?php echo $form->error($model,'id_rendelo'); ?>
				<?php  } else { ?>
							<?php echo $form->labelEx($model,'id_orvos'); ?>: <?php echo Yii::app()->params['orvos']?><br> 
							<input type="hidden" name="User[id_orvos]" id="User_id_orvos" value="<?php echo Yii::app()->params['orvos']?>" />
							<?php echo $form->labelEx($model,'id_rendelo'); ?>: <?php echo $model->id_rendelo?> 
							<input type="hidden" name="User[id_rendelo]" id="User_id_rendelo" value="<?php echo $model->id_rendelo?>" />
				<?php } ?>
	</div>
					
<?php if(Yii::app()->user->name=='Demo'){ echo '<p class="red">Sajnáljuk, biztonsági okokból a jelszóváltoztatás letiltásra került!</p>';} else { ?>
	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>
<?php } ?>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>