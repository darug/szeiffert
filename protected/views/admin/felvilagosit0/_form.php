<?php
/* @var $this Felvilagosit0Controller */
/* @var $model Felvilagosit0 */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'felvilagosit0-form',
	'enableAjaxValidation'=>true,
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
		<?php echo $form->labelEx($model,'link'); ?>
<br />
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rovid'); ?>
<br />
		<?php echo $form->textField($model,'rovid',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rovid'); ?>
	</div>

	<div class="row">
		<p> Figyelem! kép beszúrásakor az útvonalnak <span class="green">"/images/<?php echo $model->id_orvos;?>"/</span> kell megadni a kép neve előtt. Ha jó a cím, akkor a mezőből kilépve meg kell jelenni a képnek!
			<br>Az alábbi szövegszerkesztő piktogramjaira mozgatva a kurzot, kis idő után megjelenik az adott gomb funkciója.
			<br>A legfelső sor balszélső blokkja kérdőív előállítását segítik, ennek használata nem javasolt, mert további programozási tevékenységet igényel!
			<br>A többi funkció értelemszerűen használható. A képbeszúrás a középső sor balszéső blokk első helyén található.
			</p>
		<?php echo $form->labelEx($model,'hosszu'); ?>
		<span class="blue">Hosszú ismertető, amely a Bővebben -re kattintva jelenik meg:</span><br/>
		<?php echo $form->textArea($model,'hosszu',array('class'=>'ckeditor', 'rows'=>10, 'cols'=>70)); ?>
		<?php echo $form->error($model,'hosszu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?>
<br />
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_orvos'); ?>
<br />
		<?php echo $form->textField($model,'id_orvos'); ?>
		<?php echo $form->error($model,'id_orvos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'irszam'); ?>
<br />
		<?php echo $form->textField($model,'irszam'); ?>
		<?php echo $form->error($model,'irszam'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'szak_megnevezes'); ?>
<br />
		<?php echo $form->textField($model,'szak_megnevezes'); ?>
		<?php echo $form->error($model,'szak_megnevezes'); ?>
	</div>
	<div class="row">
		<?php echo  "Módosítva: ".$modet->lastmod; ?>
	</div>
	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->