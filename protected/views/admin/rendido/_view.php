<?php
/* @var $this RendidoController */
/* @var $data Rendido */
if($_SESSION['ho']['orvos'] > 0)
	{$llink=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/rendido";} 
else {$llink=Yii::app()->request->baseUrl."/admin";}
?>
		<tr>
						<td><?php echo $data->id; ?></td>
						<td><?php echo $data->name; ?></td>
						<td><?php echo $data->title; ?></td>
						<td><?php echo $data->start; ?></td>
						<td><?php echo $data->stop; ?></td>
						<td><?php echo $data->comment; ?></td>
						<td><?php echo CHtml::encode($data->id_orvos); ?></td>
						<td><?php echo $data->lastmod; ?></td>
						<td class="button-column">
				<a title="Szerkesztés" href="<?php echo $llink; ?>/update/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
			<?php if(yii::app()->user->name=='admin'){ 	// csak az adminszámára elérhető
			?>
				<form action="<?php echo $llink; ?>/delete/id/<?php echo $data->id?>" method="post">
					<button onclick="return confirm('Az id=<?php echo $data->id; ?> rekord véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
			</form>
			<?php } ?>
			</td>
		</tr>