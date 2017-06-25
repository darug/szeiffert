<?php
/* @var $this Korzet0Controller */
/* @var $data Korzet0 */
?>
		<tr>
						<td><?php echo $data->id; ?></td>
						<td><?php echo $data->name; ?></td>
						<td><?php echo $data->title; ?></td>
						<td><?php echo $data->irszam; ?></td>
						<td><?php echo $data->megjegyzes; ?></td>
						<td><?php echo $data->kezdo_szam_paros; ?></td>
						<td><?php echo $data->veg_szam_paros; ?></td>
						<td><?php echo $data->kezdo_szam_paratlan; ?></td>
						<td><?php echo $data->veg_szam_paratlan; ?></td>
						<td><?php echo $data->utca; ?></td>
						<td><?php echo $data->id_orvos; ?></td>
						<td><?php echo $data->id_rendelo; ?></td>
						<td><?php echo 'Módosítva: '.$data->lastmod; ?></td>
						<td class="button-column">
				<a title="Szerkesztés" href="<?php echo $this->createAbsoluteUrl($this->uniqueid); ?>/update/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
				
				<form action="<?php echo $this->createAbsoluteUrl($this->uniqueid); ?>/delete/id/<?php echo $data->id?>" method="post">
					<button onclick="return confirm('A(z) <?php echo $this->module_info['new']; ?> véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
				</form>
			</td>
		</tr>