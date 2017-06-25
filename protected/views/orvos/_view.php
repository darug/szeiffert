<?php
/** @var $this OrvosController */
/** @var $data Orvos */
	{$llink=Yii::app()->request->baseUrl."/";} 

?>
		<tr>
					
						<td><?php echo $data->name; ?></td>
						<td><?php echo $data->orvos_megnev; ?></td>
						<?php  $rendelo=Rendelo::model()->findByPk($data->id_rendelo);?>
						<td><?php echo $rendelo->rend_nev;?></td>
						<td><a href="<?php echo $llink.$data->id; ?>/home" target=\"_blank\">Ugrás a honlapra</a></td>
					<!--	<td><?php echo $data->megjegyzes; ?></td>
						<td><?php echo $data->lastmod; ?></td>  
						<td class="button-column">
				<a title="Orvoson kiíratása" href="<?php echo $llink; ?>/orvosok/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
				 -->
			<!--	<form action="<?php echo $llink; ?>/delete/id/<?php echo $data->id?>" method="post">
					<button onclick="return confirm('Az id=<?php echo $data->id; ?> rekord véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
			</form> -->
			</td>
		</tr>