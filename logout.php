<?php //include ("index.php");
$_SESSION["onidid"] = "";
session_unset();
session_destroy();
header("Location: index.html");
?>
