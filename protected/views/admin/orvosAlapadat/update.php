<?php
/** var $this OrvosAlapadatController 
 *  \brief Adattartalom modositasa
 * 
 * var $dataProvider CActiveDataProvider
 * @package OrvosAlapadat_view
 */ 

$this->breadcrumbs=array(
	'Orvos Alapadats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>
<?php echo $this->renderPartial('../_title'); ?>
<div class="container center">
	<div id="edit" style="width: 980px;">
		<?php echo  $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>