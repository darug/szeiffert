<?php
/* @var $this Orvosform1Controller */
/* @var $data Orvosform1 */
if($_SESSION['ho']['orvos'] > 0)
	{$llink=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/orvosform1";} 
else {$llink=Yii::app()->request->baseUrl."/admin";}
?>
		<tr>
						<td><?php echo $data->id; ?></td>
						<td><?php echo $data->l_hasznos; ?></td>
						<td><?php echo $data->l_ertheto; ?></td>
						<td><?php echo $data->h_hasznos; ?></td>
						<td><?php echo $data->h_attekint; ?></td>
						<td><?php echo $data->h_celszeru; ?></td>
						<td><?php echo $data->h_hiany; ?></td>
						<td><?php echo $data->h_legjobb; ?></td>
						<td><?php echo $data->h_kimaradt; ?></td>
						<td><?php echo $data->h_felesleg; ?></td>
						<td><?php echo $data->megjegyzes; ?></td>
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