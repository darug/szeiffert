<?php
/**
 * _view file 
 */
 
/* @var $this FelvilagositController */
/* @var $data Felvilagosit */
$bUrl=Yii::app()->request->baseUrl."/".Yii::app()->params['orvos']."/";
?>

<div class="view">

	<fieldset>
	<legend align="center"	><?php echo CHtml::encode($data->title); ?></legend>
	
	<br />

	<a href="<?php if(strpos($data->link,'://')){ echo $data->link;} else {echo $bUrl.$data->link;} ?>">
	<?php echo $data->rovid; ?>
	</a>
	<br />
<?php if($data->hosszu>" "){ ?>
	<a class="more" href="#">Bővebben</a>
	<div class="long_text"><?php echo $data->hosszu; ?></div>
<?php } ?>		
</fieldset>

</div>
