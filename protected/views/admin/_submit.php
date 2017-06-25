<?php 
	if($_SESSION['ho']['orvos']>0){
	$R_URI= strtr($this->createAbsoluteUrl($this->uniqueid), array("index.php" => $_SESSION['ho']['orvos']));}
	else{$R_URI=$this->createAbsoluteUrl($this->uniqueid);}
	
	?>

<br />
<button type="submit">Mentés <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/button_save.png" /></button>
 <a class="button" href="<?php echo $R_URI; ?>">Mégse <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/button_cancel.png" /></a>