<?php
/**
 * Ez a  view layout/admin-login, amely az adminba jelentkezést végzi.
 * 
 */

/* @var $this Controller */
$bUrl=Yii::app()->request->baseUrl;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?> Adminisztrációs felület</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/favicon.png" />

	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/admin_main.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/admin_login2.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/admin_form.css" media="screen, projection" />
</head>
<body>
	<?php echo $this->renderPartial('../_messages'); ?>
	<div class="container" id="main_content">
		<?php echo $content; ?>
	</div>
	<div class="container" id="footer">
		<span style="float:left;">DD Standard Adminisztrációs Felület v3.0 Copyright &copy; <?php echo date('Y'); ?> by DD Standard Kft.
		 	All Rights Reserved.<br/>
		</span>
		<span style="float: right"><a href="http://www.ddstandard.hu" target="_blank">www.ddstandard.hu</a></span>
		<br><br><br>
		<p style="center"><?php echo Yii::powered(); ?></p>
	</div>
</body>
</html>