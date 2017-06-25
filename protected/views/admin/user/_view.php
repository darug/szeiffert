<?php
/* @var $this UserController */
/* @var $data User */
?>


<tr>
		<td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></td>
		<td><?php echo CHtml::encode($data->username); ?></td>
		<td><?php echo CHtml::encode($data->password); ?></td>
		<td><?php echo CHtml::encode($data->title); ?></td>
		<td><?php echo CHtml::encode($data->authority); ?></td>
		<td><?php echo CHtml::encode(date("Y-m-d H:m:i",$data->lastmod)); ?></td>
		<td><?php echo CHtml::encode($data->rememberMe); ?></td>
		<td><?php echo CHtml::encode($data->id_orvos); ?></td>
		<td><?php echo CHtml::encode($data->id_rendelo); ?></td>
		<td class="button-column">
				<a title="Szerkesztés" href="<?php echo $this->createAbsoluteUrl($this->uniqueid); ?>/update/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
				
				<form action="<?php echo $this->createAbsoluteUrl($this->uniqueid); ?>/delete/id/<?php echo $data->id?>" method="post">
					<button onclick="return confirm('Az id=<?php echo $data->id; ?> rekord véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
				</form>
			</td>
</tr>
