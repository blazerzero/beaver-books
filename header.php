<?php
session_start();


function checkAuth($doRedirect) {
	if (isset($_SESSION["onidid"]) && $_SESSION["onidid"] != "") return $_SESSION["onidid"];

	 $pageURL = 'http';
	 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["SCRIPT_NAME"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"];
	 }

	$ticket = isset($_REQUEST["ticket"]) ? $_REQUEST["ticket"] : "";

	if ($ticket != "") {
		$url = "https://login.oregonstate.edu/cas/serviceValidate?ticket=".$ticket."&service=".$pageURL;
		$html = file_get_contents($url);
		$pattern = '/\\<cas\\:user\\>([a-zA-Z0-9]+)\\<\\/cas\\:user\\>/';
		preg_match($pattern, $html, $matches);
		if ($matches && count($matches) > 1) {
			$onidid = $matches[1];
			$_SESSION["onidid"] = $onidid;
			return $onidid;
		}
	} else if ($doRedirect) {
		$url = "https://login.oregonstate.edu/cas/login?service=".$pageURL;
		echo "<script>location.replace('" . $url . "');</script>";
	}
	return "";
}

?>

<?php

$dbhost = 'oniddb.cws.oregonstate.edu';
$dbname = 'habibelo-db';
$dbuser = 'habibelo-db';
$dbpass = 'RcAbWdWDkpj7XNTL';

$mysqli = mysql_connect($dbhost, $dbuser, $dbpass)
    or die("Error connecting to database server");

mysql_select_db($dbname, $mysqli)
    or die("Error selecting database: $dbname");

/* watch out for, and remove, extra carriage returns below */
/*if (!$mysqli->query("create table students(onid varchar(32), primary key(onid))")
 || !$mysqli->query("create table books(onid varchar(32), subject varchar(32), coursenum integer, title varchar(256), author varchar(64), price varchar(16), isbn varchar(64), condition varchar(16), description varchar(512), phone varchar(16), email varchar(64), facebook varchar(64),  primary key(onid), foreign key(onid) references students)")
 ) {
    printf("Cannot create table(s).\n");
}*/
//echo "Successfully created database!";
//$mysqli->query("create table if not exists students(onid varchar(32), primary key(onid))");
//$mysqli->query("create table if not exists books(onid varchar(32), subject varchar(32), coursenum integer, title varchar(256), author varchar(64), price varchar(16), isbn varchar(64), condition varchar(16), description varchar(512), phone varchar(16), email varchar(64), facebook varchar(64),  primary key(onid), foreign key(onid) references students)");

?>
