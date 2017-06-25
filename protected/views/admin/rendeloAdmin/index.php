<?php
/* @var $this RendeloAdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rendelos',
);

?>

<?php echo $this->renderPartial('../_title'); ?>
<div class="container">
		<table id="lista" >
		<tr>
					<th>ID</th>
						<th>Irszam</th>
						<th>Varos</th>
						<th>Cim</th>
						<th>Telefon</th>
						<th>Email</th>
						<th>Rend Nev</th>
						<th>Orvos Szam</th>
						<th>Megjegyzes</th>
						<th>Utolsó módosítás</th>
						<th>Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>