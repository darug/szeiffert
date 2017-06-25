<?php
/* @var $this UzenetAdminController */
/* @var $data Uzenet */
if($_SESSION['ho']['orvos'] > 0)
	{$llink=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/uzenetAdmin";} 
else {$llink=Yii::app()->request->baseUrl."/admin";}

?>
		<tr>
			<td><?php echo $data->id; ?></td>
			<td><?php echo CHtml::link(CHtml::encode($data->uzenet), array('update', 'id'=>$data->id)); ?></td>
			<td><?php echo CHtml::encode($data->megjegyzes); ?></td>
			<td><?php echo CHtml::encode($data->ervenyes); ?></td>
			<td><?php echo CHtml::encode($data->valid); ?></td>
			<td><?php echo CHtml::encode($data->id_orvos); ?></td>
			<td><?php echo $data->lastmod; ?></td>
			<td class="button-column">
				<a title="Szerkesztés" href="<?php echo $llink; ?>/update/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
				
				<form action="<?php echo $llink; ?>/delete/id/<?php echo $data->id?>" method="post">
					<button onclick="return confirm('Az id = <?php echo $data->id; ?> rekord véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
				</form>
			</td>
		</tr> 