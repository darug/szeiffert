<?php 

	if($item->type == "text"){
		echo CHtml::activeLabel($item,"[$i]value");
		?>:<br /><?php
		echo CHtml::activeTextField($item,"[$i]value").
		'&nbsp;&nbsp;&nbsp;Id_orvos: '.$item->id_orvos.
		'&nbsp;&nbsp;&nbsp;Módosítva: '.$item->lastmod;
		?><br /><?php
	}
	elseif($item->type == "textarea"){
		echo CHtml::activeLabel($item,"[$i]value");
		?>:<br /><?php
		echo CHtml::activeTextArea($item,"[$i]value").
		'&nbsp;&nbsp;&nbsp;Id_orvos: '.$item->id_orvos.
		'&nbsp;&nbsp;&nbsp;Módosítva: '.$item->lastmod;	
		?><br /><?php
	}
	elseif($item->type == "checkbox"){
		echo CHtml::activeCheckBox($item,"[$i]value");
		echo CHtml::activeLabel($item,"[$i]value").
		'&nbsp;&nbsp;&nbsp;Id_orvos: '.$item->id_orvos.
		'&nbsp;&nbsp;&nbsp;Módosítva: '.$item->lastmod;
		?><br /><?php
	}
	elseif($item->type == "upload"){
		echo CHtml::activeLabel($item,"[$i]value");
		?>:<br /><?php
		echo CHtml::fileField('Application[word_report]', '', array('id'=>'Application_word_report')).
		'&nbsp;&nbsp;&nbsp;Id_orvos: '.$item->id_orvos.
		'&nbsp;&nbsp;&nbsp;Módosítva: '.$item->lastmod;
		?><br /><?php
	}
	
?>