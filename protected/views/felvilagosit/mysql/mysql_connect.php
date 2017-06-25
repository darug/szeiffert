<?php
	/* mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead hibaüzenet miatt
	if(!$kapcsolat=mysql_connect($db_host, $db_user, $db_passwd)){
	print "A csatlakozás nem sikerült az adatbázishoz!";
	}
	if(!mysql_select_db($db_database)){
	print "Az adatbázis kijelölése nem sikerült!";
	}
	mysql_query("SET NAMES ".$db_encoding); */
	$mysqli = new mysqli($db_host, $db_user, $db_passwd, $db_database);
if ($mysqli->connect_errno) {
    echo "A MySQL-hez a  kapcsolódás nem sikerült: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

	
?>