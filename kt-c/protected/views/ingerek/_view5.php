<?php
/* @var $this IngerekController */
/* @var $data Ingerek */
?>


	<tr>
	<td>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	</td>
	<td><?php  echo  CHtml::encode($data->veznev); ?></td>
	<td><?php  echo  CHtml::encode($data->kernev); ?></td>
	<td><?php  echo  CHtml::encode($data->inger_szelesseg); ?></td>
	<td><?php  echo  CHtml::encode($data->mesnum); ?></td>
	<td><?php  echo  CHtml::encode($data->lastmod); ?></td>
	<td><a href=<?php  echo  Yii::app()->request->baseUrl."/index.php//ingerek/meres4/".$data->id; ?>>ugráshoz kattints ide</a></td>
	</tr>