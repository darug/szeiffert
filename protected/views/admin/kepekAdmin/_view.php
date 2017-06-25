<?php
/* @var $this KepekAdminController */
/* @var $data Kepek */
$ido=Yii::app()->params['orvos']."/";
if($_SESSION['ho']['orvos'] > 0)
	{$llink=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/kepekAdmin";} 
else {$llink=Yii::app()->request->baseUrl."/admin";}

?>
<tr>
			<td><?php echo $data->id; ?></td>
			<td><?php echo CHtml::link(CHtml::encode($data->kep), array('update', 'id'=>$data->id)); ?></td>
			<td><img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $ido.$data->kep; ?>" style="float:left; margin:5px 10px; width:100px" /></td>
			<td><?php echo CHtml::encode($data->szoveg); ?></td>
			<td><?php echo CHtml::encode($data->rovid_leiras); ?></td>
			<td><?php echo CHtml::encode($data->fajta); ?></td>
			<td><?php echo CHtml::encode($data->meret); ?></td>
			<td><?php echo CHtml::encode($data->mertek_egyseg); ?></td>
			<td><?php echo CHtml::encode($data->id_orvos); ?></td>
			<td><?php echo 'Módosítva: '.$data->lastmod; ?></td>
			<td class="button-column">
				<a title="Szerkesztés" href="<?php echo $llink; ?>/update/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
				
				<form action="<?php echo $llink; ?>/delete/id/<?php echo $data->id?>" method="post">
					<button onclick="return confirm('Az id=<?php echo $data->id; ?> rekord adatai véglegesen törlésre fog kerülni, de a kép az images könyvtárban megmarad. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
				</form>
			</td>
		</tr>
