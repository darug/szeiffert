<?php
/* @var $this Content0Controller */
/* @var $data Content0 */
if($_SESSION['ho']['orvos'] > 0)
	{$llink=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/content0";} 
else {$llink=Yii::app()->request->baseUrl."/admin";}
?>
		<tr>
						<td><?php echo $data->id; ?></td>
						<td><?php echo $data->name; ?></td>
						<td><?php echo $data->title; ?></td>
						<td><?php echo $data->descrption; ?></td>
						<td><?php echo $data->content; ?></td>
						<td><?php echo $data->noindex; ?></td>
						<td><?php echo $data->is_active; ?></td>
						<td><?php echo $data->contact_finish; ?></td>
						<td><?php echo $data->url; ?></td>
						<td><?php echo $data->id_orvos; ?></td>
						<td><?php echo $data->szak_megnevezes; ?></td>
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