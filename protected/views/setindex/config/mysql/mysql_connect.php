<?php
	if(!$kapcsolat=mysql_connect($db_host, $db_user, $db_passwd)){
	print "A csatlakozás nem sikerült az adatbázishoz!";
	}
	if(!mysql_select_db($db_database)){
	print "Az adatbázis kijelölése nem sikerült!";
	}
	mysql_query("SET NAMES ".$db_encoding);
?>