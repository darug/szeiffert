<?php
/**
 * Ez a "orvos" tábla view kres része, amely az orvos keresést támogatja.
 * 
 */
/* @var $this OrvosController */
/* @var $dataProvider CActiveDataProvider
 * @var $model Orvos  */

$this->breadcrumbs=array(
	'Orvos',
);

?>

<?php //echo $this->renderPartial('../_title'); ?>
<h2> Orvosok listázása</h2>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'keres',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'username'); ?>
		Keresés az orvos nevében (szótöredékre is, amely bárhol lehet): 
		<?php echo $form->textField($model,'name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Keresés'); ?>
		<span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Találatok száma: <?php  echo $dataProvider->itemCount;?></span>
	</div>
	<?php $this->endWidget(); ?>

		<table class="item" >
		<tr>
			<th>Orvos neve</th>
			<th>Szakvizsga</th>
			<th>Rendelője</th>
			<th>Honlap</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));  ?>
</table>