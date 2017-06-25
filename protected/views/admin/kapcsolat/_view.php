<?php
/* @var $this KapcsolatController */
/* @var $data Kapcsolat */
?>
		<tr>
						<td><?php echo $data->id; ?></td>
						<td><?php echo $data->name; ?></td>
						<td><?php echo $data->subject; ?></td>
						<td><?php echo $data->email; ?></td>
						<td><?php echo $data->email_to; ?></td>
						<td><?php echo $data->body; ?></td>
						<td><?php echo $data->id_orvos; ?></td>
						<td><?php echo $data->lastmod; ?></td>
						<td class="button-column">
				<?php if(Yii::app()->user->name=="admin"){ ?>
				<a title="Szerkesztés" href="<?php echo $this->createAbsoluteUrl($this->uniqueid); ?>/update/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
				<form action="<?php echo $this->createAbsoluteUrl($this->uniqueid); ?>/delete/id/<?php echo $data->id?>" method="post">
					<button onclick="return confirm('A(z) <?php echo $this->module_info['new']; ?> véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
				</form>
				<?php } ?>
			</td>
		</tr>