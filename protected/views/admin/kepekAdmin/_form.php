<?php
/* @var $this KepekAdmonController */
/* @var $model Kepek */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kepek-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	
	<p class="blue">A <span class="required">*</span>-gal jelöltek kitöltése kötelező!</p>

<?php if(!$model->ft){//echo  $model->uzenet ;} else { ?>
<p class="blue">Használati utasítás:</p>
<span class="blue">a feltöltendő fájl kiválasztásánál az alábbiakra figyeljünk:
<ul>
  <li>A fájlnév ne tartalmazzon ékezetes betüket és szóközt!</li>
  <li>A fájl méret lehetőleg ne haladja meg az 1 MByte-ot, </li>
  <li>Azonos nevű fájlok többszörös feltöltése (angol nyelvű) hibát eredményez!</li>
  <li>A feltöltés kétmenetben történik, az első lépés végén a "Küldés" gombra kell kattintani, ekkor megtörténik a feltöltés és a mezők ellenőrzése.
  Ha a feltöltés sikeres, akkor még ellenőrízhető, módosítható a mezők tartalma, majd a "Mentés" gombra kattintva történik meg az adatbázisba a kiírás. 
  A feltöltött kép csak ezután lesz beszúrható a Tartalmi oldalon! </li>
</ul> </span>
<?php //echo $model->uzenet;
} ?>

	<div class="flash-success"> 
	<div class="row">
		<?php if(!$model->ft){ ?>
		Válaszd ki a feltöltendő képet <span class=\"required\">*</span><br>	
		<input type="file" id="fname" name="fname"></input> <?php ;} else {
		echo $form->labelEx($model,'kep')."<br>";
		echo $form->textField($model,'kep',array('size'=>60,'maxlength'=>64));
		echo $form->error($model,'kep'); } ?>
	</div> 
	<div class="row">
		<?php echo $form->labelEx($model,'szoveg')."<br>"; ?>
		<?php echo $form->textField($model,'szoveg',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'szoveg'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'rovid_leiras')."<br>"; ?>
		<?php echo $form->textField($model,'rovid_leiras',array('size'=>60,'maxlength'=>128,'value'=>$pst['szoveg'])); ?>
		<?php echo $form->error($model,'rovid_leiras'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fajta')."<br>"; ?>
		<?php echo $form->textField($model,'fajta',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'fajta'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'meret').'<span class="blue"> = ahány helyen hivatkozunk rá</span><br>'; ?>
		<?php echo $form->textField($model,'meret',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'meret'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'mertek_egyseg')."<br>"; ?>
		<?php echo $form->textField($model,'mertek_egyseg',array('size'=>80,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'mertek_egyseg'); ?>
	</div>
	<div class="row">
				<?php if(Yii::app()->user->name=='admin'){ ?>
							<?php echo $form->labelEx($model,'id_orvos'); ?><br />
							<?php echo $form->textField($model,'id_orvos',array('size'=>10,'maxlength'=>15)); ?>
							<?php echo $form->error($model,'id_orvos'); ?>
				<?php  } else { ?>
							<?php echo $form->labelEx($model,'id_orvos'); ?>: <?php echo Yii::app()->params['orvos']?> 
							<input type="hidden" name="Kepek[id_orvos]" id="Kepek_id_orvos" value="<?php echo Yii::app()->params['orvos']?>" />
				<?php } ?>
	</div>
	<div class"row">
		<?php echo 'Módosítva: '.$model->lastmod; ?>
	</div>
	
	<div class="row buttons">
	<?php if($model->ft){
			echo '<input type="hidden" id=Kepek_masodik name="Kepek[masodik]" value="true"/>';
			echo CHtml::submitButton($model->isNewRecord ? 'Mentés' : 'Save');}
		else {
			echo '<input type="hidden" id=Kepek_masodik name="Kepek[masodik]" value="false"/>';
		 	echo CHtml::submitButton('Küldés');}?>
	</div>
	</div><!--class="flash-success"-->
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>