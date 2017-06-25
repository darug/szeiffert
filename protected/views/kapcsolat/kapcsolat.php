<?php
/**
 * Ez a "kapcsolat" tábla view: kapcsolat része, amely a lényegi információkat írja ki és lehetőséget biztosít az üzenet küldésre.
 * 
 */
/* @var $this KapcsolatController */
/* @var $model Kapcsolat */
/* @var $form CActiveForm */
?>
<h1>Elérhetőség</h1>

<?php if (isset($content)){ echo $content->content;}  //beszúrva 2015.11.07. DeGe
/*$record=$mod2->find('item=:item',array(':item'=>'irszam'));
$cim=$record->value;
$record=$mod2->find('item=:item',array(':item'=>'varos'));
$cim.=" ".$record->value;
$record=$mod2->find('item=:item',array(':item'=>'cim'));
$cim.=" ".$record->value;
$record=$mod2->find('item=:item',array(':item'=>'email_oldal'));
$em=$record->value;
$record=$mod2->find('item=:item',array(':item'=>'telefonszam'));
$tel=$record->value;*/
?> 
<p>Levelezési cím: <?php echo $model->cim() ;?></p>
<p>E-mail cím: <?php echo $model->config('email_oldal') ;?></p>
<p>Telefon: <?php echo $model->config('telefonszam') ;?></p>
<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>Ha Önnek kérdése van kérem, hogy az alábbiak kitöltésével közölje velem.
<span class=red> Kérem vegye figyelembe, hogy levele elolvasási ideje bizonytalan, ezért sürgős üzeneteket ne küldjön!</span><br> 
Fáradozását előre is köszönöm!</p>
<p class="note">A <span class="required">*</span>-gal jelölt mezők kitöltése kötelező.</p>
<?php if($model->config('email_oldal')==''){?>
<p class="red">Figyelem! A fenti e-mail cím hiánya miatt a levél a rendszergazdának kerül elküldésre!!!<br>
	A levél továbbítására a rendszergazdának sincs lehetősége, ezért javasoljuk a telefonon vagy személyesen történő megkeresést!
</p>
<?php } ?>	
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<span style="color: #ffffff; margin: 10px;">
		<?php echo $form->errorSummary($model); ?>
	</span>
	<div class="row">
		<?php echo $form->labelEx($model,'* Neve:') ; ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'* email címe:'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'* tárgy:'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'* Üzenet:'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Kérem, hogy az ábrán látható betűket írja be.
		<br/>A kis és nagy betűket nem különböztetjük meg.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Küldés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
<?php // nem tudom mit akartam kiiratni!!!!!!!!!!!!!!!!!!!!!!!!!!! echo $mod2->posta; ?>
</div><!-- form -->