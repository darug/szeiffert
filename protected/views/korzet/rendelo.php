<?php
/**
 * Ez a "korzet" tábla view:rendelo része, amely a keresést irányítószám és utcanév alapján végzi.
 * 
 */
/* @var $this KorzetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Korzets',
);

$bUrl = Yii::app()->request->baseUrl; 
$id_orvos=Yii::app()->params['orvos'];
$orvos=Orvos::model()->findByPk($id_orvos);
$id_rendelo=$orvos->id_rendelo;
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
<h2>Keresés irányítószám és utca név alapján</h2>
<p> Kérjük kezdje el bevinni az irányítószámot vagy annak elejét és a címét az utca mellett lévő keretbe, ha az első betük bevitele után látszódik keresett név, 
	akkor kattintson rá és nyomjon entert vagy kattintson a "Keresés" gombra.
</p>
<?php $action=Yii::app()->request->baseUrl."/".$id_orvos."/korzet/rendelo#kstart" ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'korzet-form',
	'enableAjaxValidation'=>false,
	'action'=>$action,
)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'irszam'); ?>
		<?php echo $form->textField($model,'irszam',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'irszam'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'utca'); ?>
		<?php echo $form->textField($model,'utca',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'utca'); ?>
	</div>
<input type="hidden" name="Korzet[id_rendelo]" id="Korzet_id_rendelo" value="<?php echo $rendelo->id; ?>" />
	<div class="row buttons">
		<?php echo CHtml::submitButton('Keresés'); ?>
	</div>
<?php $this->endWidget(); ?>

<p class="<?php echo $color; ?>">
<?php if(isset($uzenet)){ echo "$uzenet"; } ?>
</p>
<pre>
<?php
/*print_r($record);
echo $record->utca."<br>";
echo $record->id."<br>";
echo $record->kezdo_szam_paros."<br>";
echo $record->kezdo_szam_paratlan."<br>";*/

?>
</pre>