<?php
/* @var $this Content0Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Content0s',
);

?>

<?php echo $this->renderPartial('../_title'); ?>
<div class="container">
		<table id="lista" >
		<tr>
					<th>ID</th>
						<th>Name</th>
						<th>Title</th>
						<th>Descrption</th>
						<th>Content</th>
						<th>Noindex</th>
						<th>Is Active</th>
						<th>Contact Finish</th>
						<th>Url</th>
						<th>Id Orvos</th>
						<th>Szakterület</th>
						<th>Módosítva</th>
						<th>Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>