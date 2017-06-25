<?php
/* @var $this DataSorController */
/* @var $data DataSor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_data_sum')); ?>:</b>
	<?php echo CHtml::encode($data->id_data_sum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('m_time')); ?>:</b>
	<?php echo CHtml::encode($data->m_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cf')); ?>:</b>
	<?php echo CHtml::encode($data->cf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ff')); ?>:</b>
	<?php echo CHtml::encode($data->ff); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastmod')); ?>:</b>
	<?php echo CHtml::encode($data->lastmod); ?>
	<br />


</div>