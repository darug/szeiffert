<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); 

if(Yii::app()->user->name=='admin'){$all=true;} else {$all=false;}
?>

	<p class="red">A <span class="required">*</span>-gal jelölt mezők kitöltése kötelező!</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php if($all){echo $form->textField($model,'id');} else {echo $model->id;} ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php if($all){echo $form->textField($model,'username',array('size'=>60,'maxlength'=>64));} else {echo $model->username;} ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php if($all){echo $form->textField($model,'title',array('size'=>60,'maxlength'=>64));} else {echo $model->title;} ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'veznev'); ?>
		<?php if($all){echo $form->textField($model,'veznev',array('size'=>32,'maxlength'=>32));} else {echo $model->veznev;} ?>
		<?php echo $form->error($model,'veznev'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kernev'); ?>
		<?php if($all){echo $form->textField($model,'kernev',array('size'=>24,'maxlength'=>24));} else {echo $model->kernev;} ?>
		<?php echo $form->error($model,'kernev'); ?>
	</div>

	<div class="row">
		<p class="blue">Jelszó változtatáskor töröld ki a régít és írd be az újat!</p>
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div>
		<p class="red"> Jelszó ismétlés (!!! csak módosításkor kell kitölteni !!!)</p>
		<input size="60" maxlength="255" name="User[password2]" id="User_password2" type="password" value="" />
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nem'); ?>
		<?php if($all){echo $form->textField($model,'nem',array('size'=>10,'maxlength'=>10));} else {echo $model->nem;} ?>
		<?php echo $form->error($model,'nem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'szul_datum'); ?>
		<?php if($all){echo $form->textField($model,'szul_datum');} else {echo $model->szul_datum;} ?>
		<?php echo $form->error($model,'szul_datum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'csapat'); ?>
		<?php if($all){echo $form->textField($model,'csapat',array('size'=>12,'maxlength'=>12));} else {echo $model->csapat;} ?>
		<?php echo $form->error($model,'csapet'); ?>
	</div>
<?php if($all){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'kategoria'); ?>
		<?php echo $form->textField($model,'kategoria',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'kategoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'authority'); ?>
		<?php echo $form->textField($model,'authority'); ?>
		<?php echo $form->error($model,'authority'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rememberMe'); ?>
		<?php echo $form->textField($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_old'); ?>
		<?php echo $form->textField($model,'id_old',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'id_old'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inger_szelesseg'); ?>
		<?php echo $form->textField($model,'inger_szelesseg'); ?>
		<?php echo $form->error($model,'inger_szelesseg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inger_szam'); ?>
		<?php echo $form->textField($model,'inger_szam'); ?>
		<?php echo $form->error($model,'inger_szam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mestime'); ?>
		<?php echo $form->textField($model,'mestime'); ?>
		<?php echo $form->error($model,'mestime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pausetime'); ?>
		<?php echo $form->textField($model,'pausetime'); ?>
		<?php echo $form->error($model,'pausetime'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'mestyp'); ?>
		<?php echo $form->textField($model,'mestyp'); ?>
		<?php echo $form->error($model,'mestyp'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'mesnum'); ?>
		<?php echo $form->textField($model,'mesnum'); ?>
		<?php echo $form->error($model,'mesnum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mini'); ?>
		<?php echo $form->textField($model,'mini'); ?>
		<?php echo $form->error($model,'mini'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maxi'); ?>
		<?php echo $form->textField($model,'maxi'); ?>
		<?php echo $form->error($model,'maxi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'atlag'); ?>
		<?php echo $form->textField($model,'atlag'); ?>
		<?php echo $form->error($model,'atlag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastmod'); ?>
		<?php echo $form->textField($model,'lastmod'); ?>
		<?php echo $form->error($model,'lastmod'); ?>
	</div>
<?php } ?> 
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->