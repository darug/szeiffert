<?php
/* @var $this ConfigController */
$this->breadcrumbs=array(
	'Config',
); 
if($_SESSION['ho']['orvos'] > 0)
	{$llink=Yii::app()->request->baseUrl."/".$_SESSION['ho']['orvos']."/admin/config/index";} 
else {$llink=Yii::app()->request->baseUrl."/admin";}
?>
<?php echo $this->renderPartial('../_title'); ?>

<div class="container">
	<div id="edit" style="width: 600px;">
		<?php  echo CHtml::form($llink, 'post', array('enctype'=>'multipart/form-data')); ?>
			<?php  $category_name = ''; ?>
			<?php foreach($config as $i => $item): ?>
			<?php if($category_name != $item->category){ ?>
				<?php if(!empty($category_name)){ ?>
				</div>
				</fieldset>
				<?php } ?>
			<fieldset>
			<legend><?php echo $item->category; ?></legend>
			<div class="fieldset_content">
			<?php } ?>
				<?php echo $this->renderPartial('_config_item', array('i' => $i, 'item' => $item)); ?>
				<?php $category_name = $item->category; ?>
		
			<?php endforeach; ?>
			</div>
			</fieldset>
			<?php echo $this->renderPartial('../_submit'); ?>
		<?php echo CHtml::endForm(); ?> 
	</div>
</div> 