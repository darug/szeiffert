<?php
/* @var $this OrvosAdminController */
/* @var $data Orvos */
if($_SESSION['ho']['orvos'] > 0)
	{$llink=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/orvosAdmin";} 
else {$llink=Yii::app()->request->baseUrl."/admin";}
?>
		<tr>
						<td><?php echo $data->id; ?></td>
						<td><?php echo $data->name; ?></td>
						<td><?php echo $data->sub_link; ?></td>
						<td><?php echo $data->id_rendelo; ?></td>
						<td><?php echo $data->megjegyzes; ?></td>
						<td><?php echo $data->layout; ?></td>
						<td><?php echo $data->orvos_megnev; ?></td>
						<td><?php echo $data->status; ?></td>
						<td><?php echo $data->dname; ?></td>
						<td><?php echo $data->lastmod; ?></td>
						<td class="button-column">
				<a title="Szerkesztés" href="<?php echo $llink; ?>/update/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
				
				<form action="<?php echo $llink; ?>/delete/id/<?php echo $data->id?>" method="post">
					<button onclick="return confirm('Az id=<?php echo $data->id; ?> rekord véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
				</form>
			</td>
		</tr>