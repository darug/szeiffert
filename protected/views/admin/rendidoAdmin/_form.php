<?php
/* @var $this RendidoAdminController */
/* @var $model Rendido */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rendido-form',
	'enableAjaxValidation'=>false,
)); ?>
<p class="blue"> Használati utasítás:</p>
<p>    </p>
<span class="blue">
<ul>
  <li>Name= napsorszama+napszak kötelező formátum! mivel az összes nap kitöltésre került, ezért ez a mező nem módosítható! </li>
  <li>Title= a nap neve, ez a mező nem módosítható! </li>
  <li>Start= kezdés óra:perc formában.Az órát 24 órás formában kell megadni, a perc megadása - két számjeggyel - kötelező!</li>
  <li>Stop= befejezés időpontja, aszabályok azonosak ez előbbivel.</li>
  <li>Comment= egyéb kiírandó szöveg. A páros és páratlan hét után a kettős pont kirakása kötelező!</li>
  <li>Orvos id-je = Az Ön azonosító száma, nem módosítható!</li>
  <li>oszlop_ki= ide nullát írjon, ha az oszlopot meg akarja jeleníteni és 1 -et, ha el akarja rejteni. Figyelem, az elrejtéshez az adott nap mind a két bejegyzésébe 1 -et kell írni!</li>

</ul> 
</span>
	<p class="blue">A <span class="required">*</span>-gal jelölt mezök kitöltése kötelező!</p>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>

		<?php echo $model->name; ?>
		<?php if(yii::app()->user->name=='admin'){
		echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); 
		echo $form->error($model,'name');} ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php if(yii::app()->user->name!='admin'){echo $model->title;}else{echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); 
		echo $form->error($model,'title');} ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start'); ?>
<br />
		<?php echo $form->textField($model,'start',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stop'); ?>
<br />
		<?php echo $form->textField($model,'stop',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'stop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?><span class="blue"> Ha a szövegben sortörést szeretnénk beszúrni, akkor '<'br'>' ('jelek nélkül) kell az adott helyre beírni! </span>
<br />
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
				<?php if(Yii::app()->user->name=='admin'){ ?>
							<?php echo $form->labelEx($model,'id_orvos'); ?><br />
							<?php echo $form->textField($model,'id_orvos',array('size'=>10,'maxlength'=>15)); ?>
							<?php echo $form->error($model,'id_orvos'); ?>
				<?php  } else { ?>
							<?php echo $form->labelEx($model,'id_orvos'); ?>: <?php echo Yii::app()->params['orvos']?> 
							<input type="hidden" name="Rendido[id_orvos]" id="Rendido_id_orvos" value="<?php echo Yii::app()->params['orvos']?>" />
				<?php } ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'oszlop_ki'); ?>
<br />
		<?php echo $form->textField($model,'oszlop_ki',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'oszlop_ki'); ?>
	</div>

	<div class="row">
		<?php echo 'Módosítva: '.$model->lastmod; ?>
	</div>
	<div class="row buttons">
		<?php echo $this->renderPartial('../_submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div><!-- edit-->
</div>