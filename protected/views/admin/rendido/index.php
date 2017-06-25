<?php
/* @var $this RendidoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rendidos',
);

?>

<?php echo $this->renderPartial('../_title'); ?>
<h3> Értelmezés:</h3>
<p class="blue">Name= nap sorszama+napszak, Title= a nap neve, Start= kezdés óra:perc, Stop= befejezés óra:perc, Comment= egyéb kiírandó szöveg</p>
<div class="container">
	<div class="edit">
		<table id="lista" >
		<tr>
						<th width="3%">ID</th>
						<th width="10%">Name</th>
						<th width="10%">Title</th>
						<th width="10%">Start</th>
						<th width="10%">Stop</th>
						<th width="48%">Comment</th>
						<th width="4%">Orvos id</th>
						<th width="4%">Módosítva</th>
						<th width="4%">Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>
</div>
</div>