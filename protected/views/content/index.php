<?php
/**
 * Ez a "content" tábla view része, amely a keresett tartalmat írja ki
 * 
 */

/** @var $this ContentController */

$this->breadcrumbs=array(
	'Content',
);
?>
<h1><?php 	if(Yii::app()->params['orvos'] != 200){ echo $content->title; }?></h1>

<p>
	<?php echo $content->content; ?>
</p>

<?php  if(isset($model)){ echo "<p>";
				$this->renderPartial("/content/Rido",array(
										"content"=>$content,
										"model"=>$model));
										 echo "</p>";}  ?>