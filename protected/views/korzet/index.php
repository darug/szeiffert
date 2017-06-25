<?php
/**
 * Ez a "korzet" tábla view:index() része, amely a keresett tartalmat írja ki
 * 
 */
/* @var $this KorzetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Korzets',
);
/*
$this->menu=array(
	array('label'=>'Create Korzet', 'url'=>array('create')),
	array('label'=>'Manage Korzet', 'url'=>array('admin')),
); */

$bUrl = Yii::app()->request->baseUrl; 
if(Yii::app()->params['orvos']>0){$bOrv="/".Yii::app()->params['orvos'];} else {$bOrv="";}
?>
	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/js/jquery-ui-1.10.3/themes/base/jquery.ui.all.css"" media="all" />
	<script src="<?php echo $bUrl; ?>/js/jquery-ui-1.10.3/jquery-1.9.1.js" ></script>
	<script src="<?php echo $bUrl; ?>/js/jquery-ui-1.10.3/ui/jquery.ui.core.js" ></script>
	<script src="<?php echo $bUrl; ?>/js/jquery-ui-1.10.3/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo $bUrl; ?>/js/jquery-ui-1.10.3/ui/jquery.ui.position.js"></script>
	<script src="<?php echo $bUrl; ?>/js/jquery-ui-1.10.3/ui/jquery.ui.menu.js"></script>
	<script src="<?php echo $bUrl; ?>/js/jquery-ui-1.10.3/ui/jquery.ui.autocomplete.js"></script>

<script>
var street_names = <?php echo $json ; ?>;
$(document).ready(function(){
	$('#Korzet_utca').autocomplete({ source: street_names});
});

</script>
<address><a name="kstart"></a></address>
<h1>Körzet ellenőrzés</h1>
<p> Kérjük kezdje el bevinni a címét az utca mellett lévő keretbe, ha az első betük bevitele után látszódik keresett név, 
	akkor kattintson rá és nyomjon entert vagy kattintson a "Keresés" gombra.
</p>
<?php $action=Yii::app()->request->baseUrl."/".Yii::app()->params['orvos']."/korzet/index#kstart" ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'korzet-form',
	'enableAjaxValidation'=>false,
	'action'=>$action,
)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'utca'); ?>
		<?php echo $form->textField($model,'utca',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'utca'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Keresés'); ?>
	</div>
<?php $this->endWidget(); ?>

<p class="<?php echo $color; ?>">
<?php if(isset($uzenet)){ echo "$uzenet"; } ?>
</p>
<p><a href="<?php echo $bUrl.$bOrv; ?>/rendelo/index" >Ha a keresett címet nem találja kattintson ide, itt rendelő orvosai között kereshet!</a></p>
<?php
/*print_r($record);
echo $record->utca."<br>";
echo $record->id."<br>";
echo $record->kezdo_szam_paros."<br>";
echo $record->kezdo_szam_paratlan."<br>";*/
?>
