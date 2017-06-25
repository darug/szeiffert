<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $data <?php echo $this->getModelClass(); ?> */
if($_SESSION['ho']['orvos'] > 0)
	{$llink=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/content";} 
else {$llink=Yii::app()->request->baseUrl."/admin";}
?>
		<tr>
			<?php
			$i = 0; 
			foreach($this->tableSchema->columns as $column){ 
			?>
			<td><?php echo '<?php echo $data->'.$column->name; ?>; ?></td>
			<?php } ?>
			<td class="button-column">
				<a title="Szerkesztés" href="<?php echo '<?php echo $llink; ?>/update/id/<?php echo $data->id?>'; ?>"><img src="<?php echo '<?php echo Yii::app()->getBaseUrl(true); ?>'; ?>/images/admin/icon_edit.png" alt="Szerkesztés" /></a>
				
				<form action="<?php echo '<?php echo $llink; ?>/delete/id/<?php echo $data->id?>'; ?>" method="post">
					<button onclick="return confirm('Az id=<?php echo '<?php'; ?> echo $data->id; ?> rekord véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo '<?php echo Yii::app()->getBaseUrl(true); ?>'; ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
				</form>
			</td>
		</tr>