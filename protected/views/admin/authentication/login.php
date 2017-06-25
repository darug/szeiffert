<?php
/* @var $this AuthenticationController */

$this->breadcrumbs=array(
	'Authentication'=>array('/admin/authentication'),
	'Login',
);
?>
<div id="login_box">
	<?php //echo $_SESSION['ho']['orvos'].'<br>'; //teszt 
		$action=Yii::app()->request->baseUrl."/".Yii::app()->params['orvos']."/admin/authentication/login";
	?> 
	<div id="title"><h1>DD Standard Kft. Adminisztrációs felület</h1></div>
<!--	<div id="company_info">
	<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/" /><br />
	<span class="bold"><?php echo ""; ?></span>
	<br />
</div> -->
	<div id="login_form">
		<h2><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/_lock.png" />Bejelentkezés</h2>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'User',
			'action'=>$action,
			'enableClientValidation'=>false,
		)); ?>
			<?php echo $form->label($model,'username'); ?> <br />
			<?php echo $form->textField($model,'username'); ?><br />
			<?php echo $form->error($model,'username'); ?>
		
			<?php echo $form->label($model,'password'); ?><br />
			<?php echo $form->passwordField($model,'password'); ?><br />
			<?php echo $form->error($model,'password'); ?>
		
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe'); ?><br />
			<?php echo $form->error($model,'rememberMe'); ?>
			<input name="User[id_orvos]" id="User_id_orvos" type="hidden"  value="<?php echo $_SESSION['ho']['orvos']; ?>" />
			<?php if(FALSE == TRUE){ ?>
			<label for="security_code">Ellenőrző kód:</label><br />
			<img class="sec_img" src="class/securimage/securimage_show.php" /><br />
			<input type="text" name="security_code" id="security_code" /> <a href="#" class="new_sec_img">[Új kép]</a><br />
			<?php } ?>
			<button type="submit" />Belépés <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/button_login.png" /></button>
		<?php $this->endWidget(); ?>
	</div>
</div>