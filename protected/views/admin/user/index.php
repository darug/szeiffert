<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

?>

<<?php echo $this->renderPartial('../_title'); ?>
<div class="container">
		<table id="lista" >
		<tr>
			<th width="4%">ID</th>
			<th width="6%">Username</th>
			<th width="21%">Pssword</th>
			<th width="35%">Title</th></th>
			<th width="5%">Authority</th>
			<th width="15%">Lastmod</th>
			<th width="5%">Remem berMe</th>
			<th width="4%">Orvos id</th>
			<th width="4%">Rendelő id</th>
			<th width="3%">Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>