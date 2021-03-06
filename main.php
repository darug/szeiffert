<?php
/**
 * Ez a view layout/main része, amely a Gabó féle modern kinézetet állítja elő
 * 
 */
 /* @var $this Controller 
if(strpos($_SERVER["REQUEST_URI"],"index.php")){
	$R_URI= strtr($_SERVER["REQUEST_URI"], array("index.php" => $_SESSION['ho']['orvos']));
	$this->redirect($R_URI); 
} */ 
//új érték a menü linkekhez! 
Yii::app()->params['eudolg']=0; // Ez hazi-orvosok.hu domainen futo oldal 
$alap=Yii::app()->request->baseUrl;
$akarmi=Yii::app()->request->url;
$f=explode("/",$akarmi);
//sajat gep es internet kulonbseg eltuntetese
if($f[1]=="ho"){$i=2;}else{$i=1;}
$modul=$f[$i];
if(Yii::app()->params['orvos'] > 0)
	{$bUrllink=Yii::app()->request->baseUrl."/".Yii::app()->params['orvos'];
	$id_orvos=Yii::app()->params['orvos'];} 
else {$bUrllink=Yii::app()->request->baseUrl;}

$rec=Orvos::model()->findByPk($id_orvos);
$orvos_nev=$rec->name;
$orvos_megnev=$rec->orvos_megnev;
$status=$rec->status;
if($status=="OK"){$color="green";}else{$color="red";}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="language" content="hu" />
	
	<link rel="shortcut icon" href="<?php echo $alap; ?>/images/favicon.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $alap; ?>/images/apple-touch-icon-144_144.png" />
	<meta name="application-name" content="<?php echo $orvos_nev." ".$orvos_megnev;?> honlapja"/>
	<meta name="msapplication-TileColor" content="#72a407"/>
	<meta name="msapplication-square70x70logo" content="<?php echo $alap; ?>/images/tiny.png"/>
	<meta name="msapplication-square150x150logo" content="<?php echo $alap; ?>/images/square.png"/>
	<meta name="msapplication-wide310x150logo" content="<?php echo $alap; ?>/images/wide.png"/>
	<meta name="msapplication-square310x310logo" content="<?php echo $alap; ?>/images/large.png"/>
	<meta name="msapplication-notification" content="frequency=30;polling-uri=http://notifications.buildmypinnedsite.com/?feed=http://index.hu/24ora/rss/&amp;id=1;polling-uri2=http://notifications.buildmypinnedsite.com/?feed=http://index.hu/24ora/rss/&amp;id=2;polling-uri3=http://notifications.buildmypinnedsite.com/?feed=http://index.hu/24ora/rss/&amp;id=3;polling-uri4=http://notifications.buildmypinnedsite.com/?feed=http://index.hu/24ora/rss/&amp;id=4;polling-uri5=http://notifications.buildmypinnedsite.com/?feed=http://index.hu/24ora/rss/&amp;id=5; cycle=1"/>

	<meta name="msapplication-tooltip" content="<?php echo $orvos_nev." ".$orvos_megnev;?> honlapja" />
	<meta name="msapplication-window" content="width=1024;height=768" />
	<meta name="msapplication-task" content="name=Rendelési idő;action-uri=./?topic=msdnFlash;icon-uri=Images/channel9_logo.ico" />
	<meta name="msapplication-task" content="name=Közlemények;action-uri=./?topic=connectedShow;icon-uri=Images/channel9_logo.ico" />
	<meta name="msapplication-task" content="name=Kapcsolat;action-uri=./?topic=other;icon-uri=Images/channel9_logo.ico" />
	<meta name="msapplication-navbutton-color" content="#000000" />
	<meta name="msapplication-starturl" content="./" />
	
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
<?php $bUrl = Yii::app()->request->baseUrl; 
if(Yii::app()->params['orvos']>0){$_SESSION['ho']['orvos']=Yii::app()->params['orvos'];
		$id_orvos=$_SESSION['ho']['orvos'];	}
	if($_SESSION['ho']['orvos']>0){$bOrv="/".$_SESSION['ho']['orvos'];
		$id_orvos=$_SESSION['ho']['orvos'];} else {$bOrv="";}
?>

	<!-- blueprint CSS framework -->
	<!--link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/print.css" media="print" /-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/main.css" />
	<!--link rel="stylesheet" type="text/css" href="<?php echo $bUrl; ?>/css/form.css" /-->
	
	<script type="text/javascript" src="<?php echo $bUrl; ?>/js/jquery-1.10.1.min.js" ></script>
<?php if(Yii::app()->params['cont_name']=='stat') { ?>
	<script src="<?php echo $bUrl; ?>/js/highcharts.js"></script>
	<script src="<?php echo $bUrl; ?>/js/modules/exporting.js"></script>
	<script type="text/javascript" src="<?php echo $bUrl; ?>/js/pie.js"></script>
<?php } ?>
	<script type="text/javascript" src="<?php echo $bUrl; ?>/js/main.js"></script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<?php 
?>
<body>
<?php if($_SESSION['ho']['dname']=="hazi-orvosok.hu" || $_SESSION['ho']['dname']=="szeiffert.ddstandard.hu" || $_SESSION['ho']['dname']=="localhost" ) {  
?>	
<div id="page_container" class="container"> 	
	<div id="header_container" class="container">
		<header>
			<?php 
				$cont_name=Yii::app()->params['cont_name'];
				if($cont_name!="home0" && $id_orvos!=200){
					echo  "<div id=page_title><a href=$bUrllink/home>$orvos_nev $orvos_megnev";
				switch ($status){
					case "OK":
						echo " honlapja</a></div>";
						break;						
					case "ajánlati fázis":
					case "előkészités":
					case "véglegesítés":
						echo " $status alatt lévő honlapja</a></div>";
						break;
					case "Demó":
						echo " bemutató honlap</a></div>";
						break;
					default:
						echo " honlapjának teszt oldala</a></div>";
						break;
				}
	/** 2015.11.07. kivéve DeGe                   				if($status=="OK"){?>
						<div id="page_title"><a href="<?php echo $bUrllink; ?>/home"><?php echo $orvos_nev." ".$orvos_megnev;?> honlapja</a> </div>
					<?php } else { ?>
			<div id="page_title"><a href="<?php echo $bUrllink; ?>/home"><?php echo $orvos_nev." ".$orvos_megnev;?> honlapjának teszt oldala!!!</a> </div>
			<?php }} */ 
				} else { ?>
			<div id="page_title">Házi és gyermekorvosok</div>	
			<?php } 
		//	echo Yii::app()->params['cont_name'];
			?>	
			<nav id="header_nav">
<?php if($cont_name!="home0"){ ?>
				<a href="#" class="toggle_menu">Menü</a>
		<?php //viszintesen a Content-bolautomatikusan bővülő menü
		$record = Content::model()->findAll('id_orvos=:id_orvos AND contact_finish>0',array(':id_orvos'=>$id_orvos));
		$n=count($record);
		$menu1="";
		for($i=1;$i<$n;$i++){if($record[$i]['contact_finish']>'0')
		{
			
			
			$menu1.="<li><a href=\"$bUrllink/".$record[$i]['name']."\">".$record[$i]['title']."</a></li>\n";
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
	
			<ul>
				<li><a href="<?php echo $bUrllink.'/'.$record[0]['name']; ?>">Kezdőlap</a></li>
				<?php echo $menu1; ?>
				<?php if($id_orvos!=200){ ?>
			    <li class="dd"><a href="<?php echo $bUrllink; ?>/felvilagosit/index">Tájékoztatás</a>
			  		
					<ul>
						<?php echo $menu2; ?>
					</ul> 
				</li>
				<?php } ?> 
				<?php if($id_orvos!=200){ ?>
	     			<li><a href="<?php echo $bUrllink; ?>/korzet/index">Körzet ellenőrzés </a></li>
				<?php } else { ?>
		    	    <li><a href="<?php echo $bUrllink; ?>/site/keres">Keresések</a>
			    <?php } ?>
				<!-- ide kell beszurni az uzenet menu-t!! -->
				<li><a href="<?php echo $bUrllink; ?>/kapcsolat/kapcsolat">Elérhetőség és kapcsolat felvétel </a></li>
			 </ul>
<?php } ?>			 
			</nav>
		</header>
	</div>

<?php //echo __FILE__."<br>"; 
/*	echo "<pre> Tesztelési informácios sor (bUrl: $bUrl id_orvos: $id_orvos): <br>";
	 echo	print_r(Yii::app()->params['orvos'])." print_r yii::app-orvos<br>";
	 echo $bUrl;
	// phpinfo();
	echo " ".$id_orvos."</pre>";
	//echo $bUrl."<br>";
	//
	$orvos= new Orvos;
	  $rec=$orvos->findByPk(Yii::app()->params['orvos']);
	  $lay="//layouts/".$rec->layout;
	 echo "layout. ".$lay."<br>";  */
?>
<!--	<p class="red"> A honlap karbantartás alatt van, működési hibák lehetnek, amelyekért szíves elnézésüket kérjük!!! 
		<?php echo "Yii-orvos: " .Yii::app()->params['orvos']." session-orvos: ".$_SESSION['ho']['orvos']; ?></p> <!-- --> 
		
	<div id="note_container" class="container">
		<div class="note open"><a href="#" id="toggle_note"></a><span class="note_content">
	<?php // aktualis idofuggo informaciok kiirasa
	    if(Yii::app()->params['orvos'] != 200){ 
		$rendido = new Rendelesiido();
		echo $rendido->info();
		} else {
			$orv= new Orvos();
			echo $orv->info();
		}
	?>
			</span>
		</div>
	</div>
	
	<div id="uzenet" class="red">
	<?php $uzenet = new Uzenet(); if($uzenet->info()) echo "<br />" . $uzenet->info(); ?>
	</div>
	
	<div id="content_container" class="container">
		<section id="content">
			<article>
				<?php echo $content; ?>
			</article>
		</section>
	</div>
	<div id="footer_container" class="container"> 
		<footer>
		<br>	
		<table>
			<tr>	
				<td align="center">Copyright 2013 &copy; <?php echo $orvos_nev;?></td>
				<td align="center"><span clas="<?php echo $color;?>">Oldal státusza: <?php echo $status;?></span></td> 
				<td align="center"><a href="mailto:dg@ddstandard.hu?subject=oldalhiba bejelentés[<?php echo $_SERVER['HTTP_HOST'].'/'.$id_orvos.$akarmi ?>]&body=Tisztelt%20Rendszergazda!%0AA%20t&aacute;rgyi%20oldalon%20az%20al&aacute;bbi%20hiba%20tal&aacute;lható:%0A"><font color="#FFFFFF">Ha az oldalon hibát talál, azt itt jelentheti be!</font></a></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr><td align="center">Látogasson el a közös oldalra:<br><a href="<?php echo $bUrl ?>/200/klap"><img src="<?php echo $bUrl; ?>/images/hazi-orvosok-hu-logo.png" id="footer_logo" alt="Hazi-orvosok.hu logo" /></a></td>
				<td></td>
				<td align="center">A weboldal készítője és üzemeltetője:<br><a href="http://ddstandard.hu" id="footer_logo" class="dds" >DD Standard Kft.</a></td>
			</tr>	
		</table>			
		</footer>
	</div>
</div>
<?php } else { // ez az ág a téves domannév esetén fut le?>
	<div id="uzenet" class="red">
	A megadott id ezen a domainen nem létezik! <?php echo $_SESSION['ho']['dname'];?><a href="<?php echo "http://e-d.hu/".$id_orvos.$akarmi;?>kattintson ide, hogy megnézze a másik domaint!</a>
	</div><?php } ?>
</body>
</html>