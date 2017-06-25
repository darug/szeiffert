<?php
$this->pageTitle=$record->title;
?>

<h1><i><?php echo CHtml::encode($record->title); ?></i></h1>

<?php echo $record->content; ?>