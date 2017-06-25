<?php
/* @var $model Orvosform1 */
/* @var $form CActiveForm */
/* @var $this LepesrolController */

$this->breadcrumbs=array(
	'Lepesrol',
);
?>
<div class="lepes">
<h1><?php echo $title; ?></h1>
<span class="blue"><b><ol start="9">
	<li>
	<p> lépés: Visszajelzés </p>
	</li>
</ol></b></span>


<p>Megköszönném, ha párpercet rászánna az alábbi mezők kitöltésére és ezzel is segítenie a honlapunk jobbá tételét.</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orvosform1-orvosform1-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'l_hasznos'); ?>
		<?php echo $form->textField($model,'l_hasznos',array('size'=>2,'maxlength'=>2,'width'=>'10px')); ?>
		<?php echo $form->error($model,'l_hasznos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_ertheto'); ?>
		<?php echo $form->textField($model,'l_ertheto'); ?>
		<?php echo $form->error($model,'l_ertheto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_hasznos'); ?>
		<?php echo $form->textField($model,'h_hasznos'); ?>
		<?php echo $form->error($model,'h_hasznos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_attekint'); ?>
		<?php echo $form->textField($model,'h_attekint'); ?>
		<?php echo $form->error($model,'h_attekint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_celszeru'); ?>
		<?php echo $form->textField($model,'h_celszeru'); ?>
		<?php echo $form->error($model,'h_celszeru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_hiany'); ?>
		<?php echo $form->textField($model,'h_hiany'); ?>
		<?php echo $form->error($model,'h_hiany'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_legjobb'); ?>
		<?php echo $form->textField($model,'h_legjobb'); ?>
		<?php echo $form->error($model,'h_legjobb'); ?>
	</div>

<!--		<div class="row">
		<?php echo $form->labelEx($model,'h_kimaradt'); ?>
		<?php echo $form->textField($model,'h_kimaradt'); ?>
		<?php echo $form->error($model,'h_kimaradt'); ?>
</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'h_felesleg'); ?>
		<?php echo $form->textField($model,'h_felesleg'); ?>
		<?php echo $form->error($model,'h_felesleg'); ?>
</div> 
 <input type="hidden" id="Orvosform1_h_kimaradt" name="Orvosform1[h_kimaradt]" value="<?php echo $_SESSION['ho']['orvos']; ?>" />
	<div class="row">
		<?php echo $form->labelEx($model,'megjegyzes'); ?>
		<?php echo $form->textField($model,'megjegyzes'); ?>
		<?php echo $form->error($model,'megjegyzes'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Küldés'); ?>
	</div>

<?php $this->endWidget(); ?>

<p><a  href="<?php echo $bUrl; ?>lep12"><input name="lep12" type="button" value="Tovább a következő oldalra" /></a></p>
</div><!-- form -->