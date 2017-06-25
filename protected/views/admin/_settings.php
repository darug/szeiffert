<?php //új érték a menü linkekhez!  
if(Yii::app()->params['orvos'] > 0)
	{$bUrllink=Yii::app()->request->baseUrl."/".Yii::app()->params['orvos'];} 
else {$bUrllink=Yii::app()->request->baseUrl;}
?>
<li><a href="<?php echo $bUrllink; ?>/admin/user/update/id/<?php echo Yii::app()->user->id?>"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/settings_pswd_chng.png" />Jelszóváltoztatás </a></li>
<li><a href="<?php echo $bUrllink; ?>/admin/lepesrol/lep1"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_setting.png" />Honlap beállítás <br>(lépésről - lépésre) </a></li>
<?php if(Yii::app()->user->name=='admin'){ ?>
<!-- <li><a href="<?php echo $bUrllink; ?>/admin/huzen/Törlendő"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/settings_users.png" />Adminisztrátorok kezelése</a></li>
<li><a href="<?php echo $bUrllink; ?>/site/athelyezendo"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/settings_db_backup.png" />Adatbázis mentés</a></li> -->
<li><a href="<?php echo $bUrllink; ?>/admin/config"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/settings_site.png" />Oldal beállításai</a></li>
<!-- <li><a href="<?php echo $bUrllink; ?>/site/athelyezendo"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/settings_help.png" />Információ, segítségkérés</a></li> -->
<li><a href="<?php echo $bUrllink; ?>/admin/orvosAdmin"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/settings_site.png" />Orvosok</a></li>
<li><a href="<?php echo $bUrllink; ?>/admin/rendeloAdmin"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/settings_site.png" />Rendelők</a></li>
<li><a href="<?php echo $bUrllink; ?>/admin/content0"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/settings_site.png" />Alaptartalmak</a></li>
<?php } ?>