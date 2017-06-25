<?php
/* @var $this OrvosAlapadatController */
/* @var $model OrvosAlapadat */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orvos-alapadat-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">A <span class="required">*</span>-gal jelölt mezök kitöltése kötelező!</p>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
<br />
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nev'); ?>
<br />
		<?php echo $form->textField($model,'Nev',array('size'=>60,'maxlength'=>62)); ?>
		<?php echo $form->error($model,'Nev'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Rendelo'); ?><span class="blue"> Irszám város utca szám </span>
<br />
		<?php echo $form->textField($model,'Rendelo',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Rendelo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefon'); ?>
<br />
		<?php echo $form->textField($model,'telefon',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'telefon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hetfo'); ?><span class="blue"> idő forma: 8 - 10 vagy 8:30 - 11:30, FIGYELEM! - előtt és utána  kötelező  1 db. space!!!.</span>
<br />
		<?php echo $form->textField($model,'hetfo',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'hetfo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kedd'); ?>
<br />
		<?php echo $form->textField($model,'kedd',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'kedd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'szerda'); ?>
<br />
		<?php echo $form->textField($model,'szerda',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'szerda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'csutortok'); ?>
<br />
		<?php echo $form->textField($model,'csutortok',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'csutortok'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pentek'); ?>
<br />
		<?php echo $form->textField($model,'pentek',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'pentek'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'szak_megnevezes'); ?><span class="blue"> Szakvégzetség(ek)</span>
<br />
		<?php echo $form->textField($model,'szak_megnevezes',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'szak_megnevezes'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'s_honlap'); ?><span class="blue"> Eredetileg a saját honlap címe, gyermekorvosnál: Tanácsadás 10-11, Figyelem minden időpontot vesszővel kell lezárni!! </span>
<br />
		<?php echo $form->textField($model,'s_honlap',array('size'=>29,'maxlength'=>29)); ?>
		<?php echo $form->error($model,'s_honlap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?>
<br />
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'dname'); ?>
<br />
		<?php echo $form->textField($model,'dname',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'dname'); ?>
	</div>
	<div>
		<?php echo 'Kitöltve: '.$model->lastmod; ?>
	</div>
	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->