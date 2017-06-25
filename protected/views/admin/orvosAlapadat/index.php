<?php
/** @var $this OrvosAlapadatController 
 *  \brief Adat listázás,műveletek (új, szerkesztés, töléls, epit) kiválasztása
 * 
 * @var $dataProvider CActiveDataProvider
 * @package OrvosAlapadat_view
 */ 

$this->breadcrumbs=array(
	'Orvos Alapadats',
);

?>

<?php echo $this->renderPartial('../_title'); ?>
<div class="container">
		<table id="lista" >
		<tr>
					<th>ID</th>
						<th>Nev</th>
						<th>Rendelo</th>
						<th>Telefon</th>
						<th>Hetfo</th>
						<th>Kedd</th>
						<th>Szerda</th>
						<th>Csutortok</th>
						<th>Pentek</th>
						<th>Pentek Paratlan</th>
						<th>Szakterület</th>
						<th>S Honlap</th>
						<th>Megjegyzes</th>
						<th>Orvos ID</th>
						<th>Rendelő ID</th>
						<th>Domain név</th>
						<th>Kitöltve</th>
						<th>Műveletek</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	 'sortableAttributes'=>array('szak_megnevezes','Rendelo'),
	 'enableSorting'=>'true',
)); ?>
</table>