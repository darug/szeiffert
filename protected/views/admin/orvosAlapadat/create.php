<?php
/** @var $this OrvosAlapadatController 
 *  \brief Uj adatsor bevitel
 * 
 * @var $dataProvider CActiveDataProvider
 * @package OrvosAlapadat_view
 */ 

$this->breadcrumbs=array(
	'Orvos Alapadats'=>array('index'),
	'Create',
);

?>
<?php echo $this->renderPartial('../_title'); ?>
<div class="container center">
	<div id="edit" style="width: 980px;">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>