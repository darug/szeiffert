<?php
/* @var $this FelvilagositAdminController */
/* @var $model Felvilagosit */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'felvilagosit-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="container">
	<div id="edit">
	<p class="note">A <span class="required">*</span>-gal jelölt mező kitöltése kötelező!</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<span class="blue">Egyedi a tájékoztatásra utaló rövidítés, ékezetet és szóközt ne tartalmazzon!</span><br/>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<span class="blue">A legördölő menüben ez kerül kiírásra:</span><br/>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link');?>
		<span class="blue">A menüpont ugrási címe (ha üres marad, akkor nem ugrik sehova! <br>A külső hivatkozást "http://" kell kezdeni!)<br>A belső hivatkozásnál a tartalmi oldal neve(url-je) írandó!</span><br/>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rovid'); ?>
		<span class="blue">Rövid ismertető, amely Tájékoztató oldalon jelenik meg:</span><br/>
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
		<?php echo $form->labelEx($model,'megjegyzes'); ?><br/>
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>
	
	<div class="row">
				<?php if(Yii::app()->user->name=='admin'){ ?>
							<?php echo $form->labelEx($model,'id_orvos'); ?><br />
							<?php echo $form->textField($model,'id_orvos',array('size'=>10,'maxlength'=>15)); ?>
							<?php echo $form->error($model,'id_orvos'); ?>
				<?php  } else { ?>
							<?php echo $form->labelEx($model,'id_orvos'); ?>: <?php echo Yii::app()->params['orvos']?> 
							<input type="hidden" name="Felvilagosit[id_orvos]" id="Felvilagosit_id_orvos" value="<?php echo Yii::app()->params['orvos']?>" />
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
</div><!-- edit -->
</div>