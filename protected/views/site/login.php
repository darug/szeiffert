<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Kérem töltse ki az alábbiakat:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">A <span class="required">*</span>-gal jelzett mezók kitöltése kötelező!</p>

	<div class="row">
		<?php //echo $form->labelEx($model,'username'); ?>
		Felhasználói név<span class="required">*</span>: 
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'password'); ?>
		Jelszó<span class="required">*</span>: 
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php //echo $form->label($model,'rememberMe'); ?>
		Emlékezzen rám 
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Bejelentkezés'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
