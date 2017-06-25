<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">
	<?php if(isset($uzen))echo "<p class=red>$uzen</p>"; 	?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('veznev')); ?>:</b>
	<?php echo CHtml::encode($data->veznev); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kernev')); ?>:</b>
	<?php echo CHtml::encode($data->kernev); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nem')); ?>:</b>
	<?php echo CHtml::encode($data->nem); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('szul_datum')); ?>:</b>
	<?php echo CHtml::encode($data->szul_datum); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('csapat')); ?>:</b>
	<?php echo CHtml::encode($data->csapat); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('kategoria')); ?>:</b>
	<?php echo CHtml::encode($data->kategoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('authority')); ?>:</b>
	<?php echo CHtml::encode($data->authority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rememberMe')); ?>:</b>
	<?php echo CHtml::encode($data->rememberMe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_old')); ?>:</b>
	<?php echo CHtml::encode($data->id_old); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inger_szelesseg')); ?>:</b>
	<?php echo CHtml::encode($data->inger_szelesseg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inger_szam')); ?>:</b>
	<?php echo CHtml::encode($data->inger_szam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mestime')); ?>:</b>
	<?php echo CHtml::encode($data->mestime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pausetime')); ?>:</b>
	<?php echo CHtml::encode($data->pausetime); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('mestyp')); ?>:</b>
	<?php echo CHtml::encode($data->mestyp); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('mesnum')); ?>:</b>
	<?php echo CHtml::encode($data->mesnum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mini')); ?>:</b>
	<?php echo CHtml::encode($data->mini); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maxi')); ?>:</b>
	<?php echo CHtml::encode($data->maxi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atlag')); ?>:</b>
	<?php echo CHtml::encode($data->atlag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastmod')); ?>:</b>
	<?php echo CHtml::encode($data->lastmod); ?>
	<br />

</div>