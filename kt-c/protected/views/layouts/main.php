<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php $alap=Yii::app()->request->baseUrl;
	$akarmi=Yii::app()->request->url; 
	$enable=False;
	if($use=User::model()->findByPk(Yii::app()->user->id)){
	$auth=$use->authority;
	if($auth==50||$auth==99){$enable=True;}else{$enable=False;}}
	?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $alap; ?>/images/apple-touch-icon-144_144.png" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo $alap; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $alap; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo $alap; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $alap; ?>/css/form.css" />
	<script type="text/javascript" src="<?php echo $alap; ?>/js/jquery.js"></script>
	<script src="<?php echo $alap; ?>/js/highcharts.js"></script>
	<script src="<?php echo $alap; ?>/js/modules/exporting.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container" id="page">

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Kezdő oldal', 'url'=>array('/site/index')),
				array('label'=>'Mi a Kontrol-C?', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Mérés indítása', 'url'=>array('/ingerek/meres'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Edzők', 'url'=>array('/ingerek/meres5'), 'visible'=>$enable),
				array('label'=>'Kapcsolat', 'url'=>array('/site/contact')),
				array('label'=>'Jelszó módosítás', 'url'=>array('user/update/id/'.Yii::app()->user->id, ), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Bejelentkezés', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Kijelntkezés ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<!--<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	
	<?php endif?>
<?php echo $this->renderPartial('../_messages'); ?>	
	<?php echo $content; ?>

<!--	<div class="clear"></div>  -->

	<div id="footer">
	  <table>
		<td align="center"><font size="1">Copyright &copy; 2016 by Darvas Gábor<br>All Rights Reserved.</font></td>
		<td align="center"><font color="red" size="3"><b>Figyelem a mérés tesztelés alatt, pontossága nem garantált!</b></font></td>
		<td align="center"><font size="1"><a href="mailto:dg@ddstandard.hu?subject=oldalhiba bejelentés[<?php echo $_SERVER['HTTP_HOST'].'/'.$akarmi ?>]&body=Tisztelt%20Rendszergazda!%0AA%20t&aacute;rgyi%20oldalon%20az%20al&aacute;bbi%20hiba%20tal&aacute;lható:%0A"><font color="#00F">Ha az oldalon hibát talál, azt itt jelentheti be!</a></font></td>
	  </table>
	  
		<span align="center"><font size="1"><?php echo Yii::powered(); ?></font></span>
	</div><!-- footer -->

</div><!-- page -->
</div>

</body>
</html>
