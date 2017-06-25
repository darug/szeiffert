<?php
/* @var $this SiteController */
$burl=Yii::app()->request->baseUrl;
$this->pageTitle=Yii::app()->name . ' - termek';
$this->breadcrumbs=array(
	'Termek',
);
$sz='';
$kep = new Kepek();

$criteria = new CDbCriteria();

$criteria->order = 'id DESC';
if(isset($_POST['Kepek'])){$criteria->compare('szoveg',$_POST['Kepek']['szoveg'],true);}
// ORDER BY `tbl_kepek`.`id` DESC valahogy parameterkent átadandó a következő hívásban
$kepek = $kep->findAll($criteria); 
$i = 1;
?>
<h1>Termékek</h1>

<p>A terméklista folyamatosan bővül! A képre kattintva megnagyított kép jelenik meg, amelynek szélén tovább léphet a következő képre.</p>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Kepek',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'username'); ?>
		Keresés a megnevezésben (szótöredékre is, amely bárhol lehet): 
		<?php echo $form->textField($kep,'szoveg'); ?>
		<?php //echo $form->error($model,'username'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Keresés'); ?>
		<span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Találatok száma: <?php echo count($kepek);?></span>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<!--<form name="search" action="pages/termek" method="post">
Keresés a megnevezésben: <input type="text" name="szoveg">
<input type="submit" value="Keresés">
</form> --> 
<table width="100%" class="termek">
<tr>
<?php foreach($kepek as $key => $data){ ?>
<td><a class="grouped_elements" rel="group1" href="<?php echo $burl; ?>/images/<?php echo $data->kep; ?>" title="<?php if($data->rovid_leiras==''){echo $data->szoveg;} else {echo $data->rovid_leiras;} ?>" /><img alt="<?php echo $data->szoveg; ?>" src="<?php echo $burl; ?>/images/<?php echo $data->kep; ?>" alt="" width="290"/></a>
	<p class="termek"><?php echo $data->szoveg; ?></p>
</td>
<?php 
if($i%3 == 0) { echo "</tr><tr>"; }
$i++;
} 
?>
</tr>

<script>$("a.grouped_elements").fancybox();</script>

</table>