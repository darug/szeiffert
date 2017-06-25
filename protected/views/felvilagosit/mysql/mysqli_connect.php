<?php
	/* mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead hibaüzenet miatt
	if(!$kapcsolat=mysql_connect($db_host, $db_user, $db_passwd)){
	print "A csatlakozás nem sikerült az adatbázishoz!";
	}
	if(!mysql_select_db($db_database)){
	print "Az adatbázis kijelölése nem sikerült!";
	}
	mysql_query("SET NAMES ".$db_encoding); */
/*	echo $text="<font color=red size=5>adatbázis kapcsolat létrehozása </font>";
	echo "$db_host, $db_user, $db_passwd, $db_database<br>"; */
	$mysqli = new mysqli($db_host, $db_user, $db_passwd, $db_database);
//	echo " 13. sor<br>";
	if ($mysqli->connect_errno) {
 		   echo "A MySQL-hez a  kapcsolódás nem sikerült: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}// else {echo "<font color=red size=5>adatbázis kapcsolat létrejött: </font>";}

	
?>