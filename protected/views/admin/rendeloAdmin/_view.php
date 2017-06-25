<?php
/* @var $this RendeloAdminController */
/* @var $data Rendelo */
if($_SESSION['ho']['orvos'] > 0)
	{$llink=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/rendeloAdmin";} 
else {$llink=Yii::app()->request->baseUrl."/admin";}
?>
		<tr>
						<td><?php echo $data->id; ?></td>
						<td><?php echo $data->irszam; ?></td>
						<td><?php echo $data->varos; ?></td>
						<td><?php echo $data->cim; ?></td>
						<td><?php echo $data->telefon; ?></td>
						<td><?php echo $data->email; ?></td>
						<td><?php echo $data->rend_nev; ?></td>
						<td><?php echo $data->orvos_szam; ?></td>
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