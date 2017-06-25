<?php
/* @var $this ContentAdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contents',
);

?>

<?php  echo  $this->renderPartial('../_title'); ?>
<span class="blue">Ez a tábla a statikus oldalak tartalmának tárolására szolgál. Részletezést a Szerkesztés vagy Új műveletnél talál!
</span><br>
<?php 
/*	if(Yii::app()->user->name=='admin'){
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'Content-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			'id',
			'title',
			'name',
			'contact_finish',
			'id_orvos',
			'lastmod',
			array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
			'header'=>'Műveletek',
			'buttons'=>array
    		(
        		'update' => array
        			(
            			'label'=>'Szerkesztés',
            			'imageUrl'=>Yii::app()->request->baseUrl."/images/admin/icon_edit.png",
            			'url'=>'Yii::app()->createUrl("admin/content/update", array("id"=>$data->id))',
        			),
        		'delete' => array
       			 (
            		'label'=>'Törlés',
            		'imageUrl'=>Yii::app()->request->baseUrl."/images/admin/icon_del.png",
            		'url'=>'"#"',
           			'visible'=>'$data->id > 0',
           			'id'=>$data->id,
            		'click'=>'function(){alert("Valóban törölni akarja ezt a $id rekordot?");}',
       			 ),
    		),		
			),		
	),
)); } else { */ ?>

<div class="container">
		<table id="lista" >
		<tr>
			<th width="4%">ID</th>
			<th width="29%">Oldalcím</th>
			<th width="40%">Leírás</th>
			<th width="10%">Kapcsolat köszönő oldal</th>
			<th width="4%">Orvos id</th>
			<th width="4%">Módosítva</th>
			<th width="13%">Műveletek</th>
		</tr>
<?php  $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model,
	'itemView'=>'_view',
)); //} ?>
</table>