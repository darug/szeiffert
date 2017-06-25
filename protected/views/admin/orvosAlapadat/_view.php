<?php
/* @var $this OrvosAlapadatController */
/* @var $data OrvosAlapadat */
?>
		<tr>
						<td><?php echo $data->id; ?></td>
						<td><?php echo $data->Nev; ?></td>
						<td><?php echo $data->Rendelo; ?></td>
						<td><?php echo $data->telefon; ?></td>
						<td><?php echo $data->hetfo; ?></td>
						<td><?php echo $data->kedd; ?></td>
						<td><?php echo $data->szerda; ?></td>
						<td><?php echo $data->csutortok; ?></td>
						<td><?php echo $data->pentek; ?></td>
						<td><?php echo $data->pentek_paratlan; ?></td>
						<td><?php echo $data->szak_megnevezes; ?></td>
						<td><?php echo $data->s_honlap; ?></td>
						<td><?php echo $data->megjegyzes; ?></td>
						<td><?php echo $data->id_orvos; ?></td>
						<td><?php echo $data->id_rendelo; ?></td>
						<td><?php echo $data->dname; ?></td>
						<td><?php echo $data->lastmod; ?></td>
						<td class="button-column">
				<a title="Szerkesztés" href="<?php echo $this->createAbsoluteUrl($this->uniqueid); ?>/update/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
				<a title="Szerkesztés" href="<?php echo $this->createAbsoluteUrl($this->uniqueid); ?>/epit/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_wt.png" alt="Orvos_adattáblák_építése" /></a>
				
				<form action="<?php echo $this->createAbsoluteUrl($this->uniqueid); ?>/delete/id/<?php echo $data->id?>" method="post">
					<button onclick="return confirm('A(z) <?php echo $this->module_info['new']; ?> véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
				</form>
			</td>
		</tr>