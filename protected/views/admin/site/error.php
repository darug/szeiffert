<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Hiba az oldalon <?php echo $error; ?></h2>
<p class="error">A keresett tartalom nem található, vagy nincs jogosultsága az oldal eléréséhez!</p>
<div class="error">
<?php echo CHtml::encode($message); ?>
<br>
<!--<pre>
<?php echo print_r(Content::model()->temp)."<br>"; ?>
</pre>-->
</div>