<?php
/* @var $this ContentController */

$this->breadcrumbs=array(
	'Content',
);
?>
<h1><?php echo $content->title; ?></h1>

<p>
	<?php echo str_replace(array('&lt;','&gt;'),array('<','>'),$content->content); ?>
</p>
