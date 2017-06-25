<?php
/* @var $this KorzetController */
/* @var $model Korzet */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'korzet-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="container">
	<div id="edit">
	<p class="note">A <span class="required">*</span>-gal jelölt mező kitöltése kötelező!</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		 <span class="blue">Egyedi az utcára utaló tartalom, ékezetet és szóközt ne tartalmazzon!</span><br/>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		 <span class="blue">A kiírt tartalmat kérem, ne módosítsa!</span><br/>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'value'=>'Körzet')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'irszam'); ?>
		<br/>
		<?php echo $form->textField($model,'irszam'); ?>
		<?php echo $form->error($model,'irszam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'utca'); ?>
		<span class="blue">Ide az utca neve és jellege (tér, stb.) írandó</span><br/>
		<?php echo $form->textField($model,'utca',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'utca'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?><span class="blue"> Belső használatra, a keresőben nem jelenik meg a tartalom!</span>
		<br/>
		<?php echo $form->textField($model,'megjegyzes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>
	<p class="blue">A kezdő és vég számokat csak akkor kell kitölteni, ha nem a teljes utca tartozik a körzethez!<br>
		Ha a végszám nem ismert, akkor helyete a "végig" írható! </p>
	<div class="row">
		<?php echo $form->labelEx($model,'kezdo_szam_paros'); ?>
		<br/>
		<?php echo $form->textField($model,'kezdo_szam_paros',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kezdo_szam_paros'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'veg_szam_paros'); ?>
		<br/>
		<?php echo $form->textField($model,'veg_szam_paros',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'veg_szam_paros'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kezdo_szam_paratlan'); ?>
		<br/>
		<?php echo $form->textField($model,'kezdo_szam_paratlan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kezdo_szam_paratlan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'veg_szam_paratlan'); ?>
		<br/>
		<?php echo $form->textField($model,'veg_szam_paratlan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'veg_szam_paratlan'); ?>
	</div>

	<div class="row">
		<?php if(Yii::app()->user->name=='admin'){ ?>
					<?php echo $form->labelEx($model,'id_orvos'); ?><br />
					<?php echo $form->textField($model,'id_orvos',array('size'=>10,'maxlength'=>15)); ?>
					<?php echo $form->error($model,'id_orvos'); ?>
		<?php  } else { ?>
					<?php echo $form->labelEx($model,'id_orvos'); ?>: <?php echo Yii::app()->params['orvos']?> 
					<input type="hidden" name="Korzet[id_orvos]" id="Korzet_id_orvos" value="<?php echo Yii::app()->params['orvos']?>" />
				<?php } ?>
	</div>
	
	<div class="row">
		<?php if(Yii::app()->user->name=='admin'){ ?>
					<?php echo $form->labelEx($model,'id_rendelo'); ?><br />
					<?php echo $form->textField($model,'id_rendelo',array('size'=>10,'maxlength'=>15)); ?>
					<?php echo $form->error($model,'id_rendelo'); ?>
		<?php  } else { ?>
					<?php echo $form->labelEx($model,'id_rendelo'); ?>: <?php echo $id_rendelo; ?> 
					<input type="hidden" name="Korzet[id_rendelo]" id="Korzet_id_rendelo" value="<?php echo $id_rendelo; ?>" />
				<?php } ?>
	</div>
	<div>
		<?php echo 'Módosítva: '.$model->lastmod; ?>
	</div>
	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
		<?php // echo CHtml::submitButton($model->isNewRecord ? 'Mentés' : 'Felülírás!!!'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div><!-- edit-->
</div>