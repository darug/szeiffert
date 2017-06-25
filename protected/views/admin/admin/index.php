<?php
$this->breadcrumbs=array(
	'Admin',);
if(Yii::app()->params['orvos'] > 0)
	{$bUrllink=Yii::app()->request->baseUrl."/".Yii::app()->params['orvos'];} 
else {$bUrllink=Yii::app()->request->baseUrl;}

?>

<div class="container" >
<div id="page_title"><h1 class="main_title">Üdvözöljük!</h1></div><div id="title_right"></div>
</div>
<div class="container" id="content">
<div class="center">
<div class="box">
	<h2><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_modules.png" />Modulok kezelése</h2>
	<ul id="main_modul_list">
		<?php echo $this->renderPartial('../_modules'); ?>
	</ul>
</div>
<div class="box">
	<h2><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_setting.png" />Beállítások</h2>
	<ul>
		<?php echo $this->renderPartial('../_settings'); ?>
	</ul>
</div>
<div class="box">
	<h2><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_links.png" />Hasznos linkek</h2>
	<ul>
		<?php if(Yii::app()->user->name=='admin'){ ?>
		<li class="first"><a href="http://admin.ddstandard.hu/pma" target="_blank"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_pma.png" />phpMyAdmin</a></li>
		<li><a href="http://admin.ddstandard.hu/" target="_blank"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_hosting.png" />Tárhely admin felület</a></li>

		<?php }?>
		<li><a href="http://admin.ddstandard.hu/tools/webmail" target="_blank"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_webmail.png" />Webmail felület</a></li>
		<li><a href="http://analytics.google.com" target="_blank"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_ga.png" />Google Analytics</a></li>
		<li><a href="http://adwords.google.com" target="_blank"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_aw.png" />Google AdWords</a></li>
		<li><a href="http://www.google.com/webmasters/" target="_blank"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_wt.png" />Google Webmaster Tools</a></li>
	</ul>
</div>
</div>
</div>