<?php
/* @var $this IngerDataController */
/* @var $data IngerData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inger_szelesseg')); ?>:</b>
	<?php echo CHtml::encode($data->inger_szelesseg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inger_start')); ?>:</b>
	<?php echo CHtml::encode($data->inger_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inger_lepes')); ?>:</b>
	<?php echo CHtml::encode($data->inger_lepes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_eredm')); ?>:</b>
	<?php echo CHtml::encode($data->id_eredm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inger_szam')); ?>:</b>
	<?php echo CHtml::encode($data->inger_szam); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ri')); ?>:</b>
	<?php echo CHtml::encode($data->ri); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ch')); ?>:</b>
	<?php echo CHtml::encode($data->ch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fh')); ?>:</b>
	<?php echo CHtml::encode($data->fh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tcorr')); ?>:</b>
	<?php echo CHtml::encode($data->tcorr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('megjegyzes')); ?>:</b>
	<?php echo CHtml::encode($data->megjegyzes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastmod')); ?>:</b>
	<?php echo CHtml::encode($data->lastmod); ?>
	<br />

	*/ ?>

</div>