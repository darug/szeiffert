<?php
/* @var $this Content0Controller */
/* @var $model Content0 */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content0-form',
	'enableAjaxValidation'=>FALSE,
)); ?>

	<p class="note">A <span class="required">*</span>-gal jelölt mezök kitöltése kötelező!</p>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
<br />
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
<br />
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descrption'); ?>
<br />
		<?php echo $form->textField($model,'descrption',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descrption'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'noindex'); ?>
<br />
		<?php echo $form->textField($model,'noindex'); ?>
		<?php echo $form->error($model,'noindex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_active'); ?>
<br />
		<?php echo $form->textField($model,'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_finish'); ?>
<br />
		<?php echo $form->textField($model,'contact_finish',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_finish'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
<br />
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'szak_megnevezes'); ?>
<br />
		<?php echo $form->textField($model,'szak_megnevezes'); ?>
		<?php echo $form->error($model,'szak_megnevezes'); ?>
	</div>

	<div>
		<?php echo 'Módosítva: '.$model->lastmod; ?>
	</div>
	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->