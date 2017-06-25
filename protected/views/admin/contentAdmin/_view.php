<?php
/* @var $this ContentAdminController */
/* @var $data Content */
if($_SESSION['ho']['orvos'] > 0)
	{$llink=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/contentAdmin";} 
else {$llink=Yii::app()->request->baseUrl."/admin";}

?>
		<tr>
			<td><?php echo $data->id; ?></td>
			<td><?php echo CHtml::link(CHtml::encode($data->title), array('update', 'id'=>$data->id)); ?></td>
			<td><?php echo CHtml::encode($data->descrption); ?></td>
			<td class="ex"><input name="contact_finish" id="contact_finish_<?php echo CHtml::encode($data->name); ?>" <?php if($data->contact_finish == 1){ ?>checked="checked"<?php } ?> type="radio" value="<?php echo CHtml::encode($data->id); ?>" /></td>
			<td><?php echo CHtml::encode($data->id_orvos); ?></td>
			<td><?php echo CHtml::encode($data->lastmod); ?></td>
			<td class="button-column">
				<a title="Szerkesztés" href="<?php echo $llink; ?>/update/id/<?php echo $data->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
				
				<form action="<?php echo $llink; ?>/delete/id/<?php echo $data->id?>" method="post">
					<button onclick="return confirm('Az id=<?php echo $data->id; ?> rekord véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
				</form>
			</td>
		</tr>