<?php
/**
 * Ez  view layout/admin része, amely az admin felület nézetét építi fel
 * 
 */ 
 /* @var $this Controller */
$bUrl=Yii::app()->request->baseUrl;
if(Yii::app()->params['orovs']>0){$orvos=Yii::app()->params['orovs'];}
elseif($_SESSION['ho']['orvos']>0){$orvos=$_SESSION['ho']['orvos'];}
else{$orvos='';}
$rec=Orvos::model()->findByPk($orvos);
$orvos_nev=$rec->name;
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
	<!--link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/js/ckeditor/contents.css" media="screen, projection" /-->
	<script src="<?php echo $bUrl; ?>/js/jquery-1.10.1.min.js"></script>
	<script src="<?php echo $bUrl; ?>/js/ckeditor/ckeditor.js"  > </script>
	
</head>
<body>
	<?php 
	//echo dirname(__FILE__);
	echo $this->renderPartial('../_messages'); ?>
	<div class="container" id="header">
		<div id="logo"><img src="" alt="<?php echo CHtml::encode(Yii::app()->name).": ".$orvos_nev; ?>" /></div>
		<div id="menu">
			<ul>
				<li><a href="<?php echo $bUrl."/".$_SESSION['ho']['orvos']; ?>/admin/admin/index"><img src="<?php echo $bUrl; ?>/images/admin/_menu_home.png" /> Kezdőlap</a></li>
				<li><a href="<?php echo $bUrl; ?>/admin/content"><img src="<?php echo $bUrl; ?>/images/admin/_menu_content.png" /> Modulok <img src="<?php echo $bUrl; ?>/images/admin/_menu_dropdown_arrow.png" /></a>
					<ul class="dropdown">
						<?php echo $this->renderPartial('../_modules'); ?>
					</ul>
				</li><?php if(isset($_POST['lepesrol']['count'])){echo '<span class="blue"><b>&nbsp;&nbsp;&nbsp;Lépés szám: '.$_POST['lepesrol']['count'].' (11 lépésből)</b></span>';} ?>
					<?php if(Yii::app()->user->name=='Demo'){echo '<span class="red"><b> &nbsp;&nbsp;&nbsp;A beírt változások legkésőbb 1 napon belül törlődnek!</b></span>';} ?>
			</ul>
		</div>
		<?php // echo " ".dirname(__FILE__); ?> 
		<span id="right_menu">
			<span id="logged_name">Bejelentkezve: <?php echo Yii::app()->user->name; ?></span><br class="float_right" />
			<span id="settings">
				<a class="settings" href="">Beállítások </a>
				<a class="logout" href="<?php echo $bUrl."/".$_SESSION['ho']['orvos']; ?>/admin/authentication/logout" title="Kilépés"></a>
					<ul class="settings_dropdown">
						<?php echo $this->renderPartial('../_settings'); ?>
					</ul>
			</span>
		</span>
		<span class="red"> 
			<?php // echo "orvos_id: ".Yii::app()->params['orvos']." Session: ".$_SESSION['ho']['orvos'] ?>
			</span>
	</div>
	<div class="container" id="header_helper">
	</div>
	<div class="container" id="main_content">
		<?php 
		$rec=User::model()->find('username=:username',array(':username'=>Yii::app()->user->name));
		if($_SESSION['ho']['orvos']==$rec->id_orvos OR Yii::app()->user->name=='admin'){
		 echo $content; }
		else { ?>
		<span class="red"> Címzési hiba vagy nincs jogosultsága a művelethez! </span>
		<?php } ?>	
	</div>
	<div class="container" id="footer">
		<span style="float:left;">DD Standard Adminisztrációs Felület v3.0 Copyright &copy; <?php echo date('Y'); ?> by DD Standard Kft.
		 	All Rights Reserved.<br/>
		</span>
		<span style="float: right"><a href="http://www.ddstandard.hu" target="_blank">www.ddstandard.hu</a></span>
		<br><br><br>
		<span style="center"><?php echo Yii::powered(); ?></span>
	</div>
</body>
</html>