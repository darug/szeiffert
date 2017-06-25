<?php
/* @var $this Korzet0Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Korzet0s',
);

?>

<?php echo $this->renderPartial('../_title'); ?>
<div class="container">
		<table id="lista" >
		<tr>
					<th>ID</th>
						<th>Name</th>
						<th>Title</th>
						<th>Irszam</th>
						<th>Megjegyzes</th>
						<th>Kezdo Szam Paros</th>
						<th>Veg Szam Paros</th>
						<th>Kezdo Szam Paratlan</th>
						<th>Veg Szam Paratlan</th>
						<th>Utca</th>
						<th>Id Orvos</th>
						<th>Id Rendelo</th>
						<th>Módosítva</th>
						<th>Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>