<?php
/* @var $this KorzetAdminController */
/* @var $data Korzet */
if($_SESSION['ho']['orvos'] > 0)
	{$llink=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/korzetAdmin";} 
else {$llink=Yii::app()->request->baseUrl."/admin";}
?>

<tr>
			<td><?php echo $data->id; ?></td>
			<td><?php echo CHtml::link(CHtml::encode($data->name), array('update', 'id'=>$data->id)); ?></td>
			<td><?php echo CHtml::encode($data->title); ?></td>
			<td><?php echo CHtml::encode($data->irszam); ?></td>
			<td><?php echo CHtml::encode($data->utca); ?></td>
			<td><?php echo CHtml::encode($data->megjegyzes); ?></td>
			<td><?php echo CHtml::encode($data->kezdo_szam_paros); ?></td>
			<td><?php echo CHtml::encode($data->kezdo_szam_paratlan); ?></td>
			<td><?php echo CHtml::encode($data->veg_szam_paros); ?></td>
			<td><?php echo CHtml::encode($data->veg_szam_paratlan); ?></td>
			<td><?php echo CHtml::encode($data->id_orvos); ?></td>
			<td><?php echo CHtml::encode($data->id_rendelo); ?></td>
			<td><?php echo 'Módosítva: '.$data->lastmod; ?></td>
			<td class="button-column">
				<a title="Szerkesztés" href="<?php echo $llink; ?>/update/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
				
				<form action="<?php echo $llink; ?>/delete/id/<?php echo $data->id?>" method="post">
					<button onclick="return confirm('Az id=<?php echo $data->id; ?> rekord véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
				</form>
			</td>
		</tr>
