<?php
/* @var $this UzenetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Uzenets',
);
?>

<?php echo $this->renderPartial('../_title'); ?>
<p class="blue">Ez a tábla a határidős üzenetek tárolására szolgál. A le nem járt határidejű üzenetek közül a kisebb sorszámú jelenik csak meg!<br>
	Az érvénességi dátum napján az üzenet már nem jelenik meg!<br>
	A később esetleg megismétlődhető üzenetet nem érdemes törölni, hanem újabb használatkor célszerű az érvényesség dátumát módosítani!
</p>
<div class="container">
		<table id="lista" >
		<tr>
			<th width="4%">ID</th>
			<th width="36%">Üzenet</th>
			<th width="29%">Megjegyzés</th>
			<th width="15%">Érvényesség dátuma</th>
			<th width="4%">Valid</th>
			<th width="4%">Orvos id</th>
			<th>Módosítva</th>
			<th width="8%">Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>