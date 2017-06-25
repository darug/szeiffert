<?php
/* @var $this ContentAdminController */
/* @var $model Content */
/* @var $form CActiveForm */
$orvos=Yii::app()->params['orvos'];
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content',
	'enableAjaxValidation'=>FALSE,
	//'action'=>'http://localhost/ho/admin/content/update/id/1/'
)); ?>
	<!--<div class="container">
	<div id="edit">-->

	<p class="note">A <span class="required">*</span>-gal jelölt mezök kitöltése kötelező!</p>
		
	<?php echo $form->hiddenField($model,'id'); ?>
	<?php echo $form->hiddenField($model,'id_orvos',array('value'=>$orvos)); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?><br />
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?><br />
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descrption'); ?><span class="blue"> (internetes keresést segítő címszavak)</span><br />
		<?php echo $form->textField($model,'descrption',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descrption'); ?>
	</div>

	<!--div class="row">
		<?php echo $form->labelEx($model,'content'); ?><br /><br />
		<?php echo $form->textArea($model,'content',array('class'=>'ckeditor', 'rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div-->
	
	<div class="row">
		<p> Figyelem! kép beszúrásakor az útvonalnak <span class="green">"/images/<?php echo $model->id_orvos;?>"/</span> kell megadni a kép neve előtt. Ha jó a cím, akkor a mezőből kilépve meg kell jelenni a képnek!
			<br>Az alábbi szövegszerkesztő piktogramjaira mozgatva a kurzot, kis idő után megjelenik az adott gomb funkciója.
			<br>A legfelső sor balszélső blokkja kérdőív előállítását segítik, ennek használata nem javasolt, mert további programozási tevékenységet igényel!
			<br>A többi funkció értelemszerűen használható. A képbeszúrás a középső sor balszéső blokk első helyén található.
			</p>
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('class'=>'ckeditor', 'rows'=>10, 'cols'=>70)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	<div class="row">
		<?php echo $form->checkBox($model,'noindex'); ?>
		<?php echo $form->labelEx($model,'noindex'); ?>		
		<?php echo $form->error($model,'noindex'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->checkBox($model,'is_active'); ?>
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>
	<div class="row"> <!--checkbox -> textfield modositva 2013.08.21 oDG-->
		<?php echo $form->labelEx($model,'contact_finish')." (menüpont címe)"; ?><span class="blue"> Ha üresen marad nem jelenik meg a viszintes menüsorban!</span><br>
		<?php echo $form->textfield($model,'contact_finish',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_finish'); ?>
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
	<div class="row">
		<?php echo 'Módosítva: '.$model->lastmod; ?>
	</div>
	
	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<!--</div><!-- edit 
</div>-->