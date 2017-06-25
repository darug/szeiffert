<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

?>

<?php echo "<?php"; ?> echo $this->renderPartial('../_title'); ?>
<div class="container">
		<table id="lista" >
		<tr>
		<?php	
			$class = $this->getModelClass();
			$model = new $class;
			$count=0;
			foreach($this->tableSchema->columns as $column)
			{
			?>
			<th><?php echo $model->getAttributeLabel($column->name); ?></th>
			<?php
			}
		?>
			<th>Műveletek</th>
		</tr>
<?php echo "<?php"; ?> $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>