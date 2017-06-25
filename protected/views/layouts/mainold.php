<?php /* @var $this Controller 
if(strpos($_SERVER["REQUEST_URI"],"index.php")){
	$R_URI= strtr($_SERVER["REQUEST_URI"], array("index.php" => $_SESSION['ho']['orvos']));
	$this->redirect($R_URI); 
} */ 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
<?php $bUrl = Yii::app()->request->baseUrl; 
if(Yii::app()->params['orvos']>0){$_SESSION['ho']['orvos']=Yii::app()->params['orvos'];
		$id_orvos=$_SESSION['ho']['orvos'];	}
	if($_SESSION['ho']['orvos']>0){$bOrv="/".$_SESSION['ho']['orvos'];
		$id_orvos=$_SESSION['ho']['orvos'];} else {$bOrv="";}
?>

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/mainold.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/form.css" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<script>
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  		ga('create', 'UA-49332908-1', 'hazi-orvosok.hu');
  		ga('send', 'pageview');
	</script>

</head>

<body>

<div class="container" id="page">

<!--	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div> -- header -->

	<div id="mainmenu">
<?php //új érték a menü linkekhez!  
if(Yii::app()->params['orvos'] > 0)
	{$bUrllink=Yii::app()->request->baseUrl."/".Yii::app()->params['orvos'];
	$id_orvos=Yii::app()->params['orvos'];} 
else {$bUrllink=Yii::app()->request->baseUrl;}
$rec=Orvos::model()->findByPk($id_orvos);
$orvos_nev=$rec->name;
?>
		<?php //viszintesen a Content-bolautomatikusan bővülő menü
		$record = Content::model()->findAll('id_orvos=:id_orvos',array(':id_orvos'=>$id_orvos));
		$n=count($record);
		$menu1="";
		for($i=1;$i<$n;$i++){if($record[$i]['contact_finish']>'')
		{
			$menu1.="<li><a href=\"$bUrllink/".$record[$i]['name']."\"><img src=\"$bUrl/images/admin/_menu_content.png\" /> ".$record[$i]['title']."</a></li>\n";
		}
		}
		$rec = Felvilagosit::model()->findAll('id_orvos=:id_orvos',array(':id_orvos'=>$id_orvos)); //automatikusan bővülő dropdown menü
		$n=count($rec);
		$menu2="";
		for($i=0;$i<$n;$i++){
			if(strpos($rec[$i]['link'],'://')){$href=$rec[$i]['link'];}
			else{$href=$bUrllink.'/'.$rec[$i]['link'];}
			$menu2.="<li><a href=\"$href\" target=\"_blank\"> ".$rec[$i]['title']." </a></li>\n";
		}	
?>
		<div id="menu">
			<ul>
				<li><a><?php echo $orvos_nev;?> háziorvos honlapja<br></a></li>
				<li><a href="<?php echo $bUrllink.'/'.$record[0]['name']; ?>"><img src="<?php echo $bUrl; ?>/images/admin/_menu_home.png" />Kezdőlap</a></li>
				<?php echo $menu1; ?>
			    <li><a href="<?php echo $bUrllink; ?>/felvilagosit/index"><img src="<?php echo $bUrl; ?>/images/admin/_menu_content.png" /> Tájékoztatas <img src="<?php echo $bUrl; ?>/images/admin/_menu_dropdown_arrow.png" /> </a>
					<ul class="dropdown">
						<?php echo $menu2; ?>
				</ul> 
				</li>
				<li><a href="<?php echo $bUrllink; ?>/korzet/index"><img src="<?php echo $bUrl; ?>/images/admin/_menu_content.png" /> Körzet ellenőrzés </a></li>
				<!-- ide kell beszurni az uzenet menu-t!! -->
				<li><a href="<?php echo $bUrllink; ?>/kapcsolat/kapcsolat"><img src="<?php echo $bUrl; ?>/images/admin/_menu_content.png" /> Elérhetőség és kapcsolat felvétel </a></li>
			 </ul>
		</div>

	</div><!-- mainmenu -->

<?php //echo __FILE__."<br>"; 
/*	echo "<pre> Tesztelési informácios sor (bUrl: $bUrl id_orvos: $id_orvos): <br>";
	 echo	print_r(Yii::app()->params['orvos'])." print_r yii::app-orvos<br>";
	 echo $bUrl;
	// phpinfo();
	echo " ".$id_orvos."</pre>";
	//echo $bUrl."<br>";
	// */
?>
<!--	<p class="red"> A honlap karbantartás alatt van, működési hibák lehetnek, amelyekért szíves elnézésüket kérjük!!! 
		<?php echo "Yii-orvos: " .Yii::app()->params['orvos']." session-orvos: ".$_SESSION['ho']['orvos']; ?></p> <!-- --> 
	<p class="info">
	<?php // aktualis idofuggo informaciok kiirasa
	if(!strpos($_SERVER['REQUEST_URI'],'Rendelo/')){
		$rendido = new Rendelesiido();
		echo $rendido->info();
	}
	?>
	</p>
	<?php // aktualis idofuggo informaciok kiirasa
		$uzenet = new Uzenet();
		if($uzenet->info()){
		?><p class="uzenet"><?php
		
			echo $uzenet->info();
		
		?></p><?php
		}
	?>
	<div id="content">
	<?php echo $content; ?>
	</div>
	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> <a href="http://ddstandard.hu" rel="external"> DD Standard Kft.</a><br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>