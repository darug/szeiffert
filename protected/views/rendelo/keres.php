<?php
/**
 * Ez a "rendelo" tábla view keres része, amely az id_orvos==200 esetén a rendelők közötti keresést végzi.
 * 
 */
/* @var $this RendeloController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rendelos',
);

?>

<?php //echo $this->renderPartial('../_title'); ?>
<h1> Rendelők listázása</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Kepek',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'username'); ?>
		Keresés a rendelő megnevezésében (szótöredékre is, amely bárhol lehet): 
		<?php echo $form->textField($model,'rend_nev'); ?>
		<?php //echo $form->error($model,'username'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Keresés'); ?>
		<span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Találatok száma: <?php echo $dataProvider->itemCount;?></span>
	</div>
	<?php $this->endWidget(); ?>
		<table id="lista" >
		<tr>
				<!--	<th>ID</th>  -->
						<th width="5%">Irszám</th>
						<th>Varos</th>
						<th>Cim</th>
				<!--		<th>Telefon</th>
						<th>Email</th> -->
						<th>Rendelő Neve</th>
						<th>Orvos szám</th>
				<!--		<th>Megjegyzes</th>
				    	<th>Utolsó módosítás</th> -->
						<th>Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));  ?>
</table>