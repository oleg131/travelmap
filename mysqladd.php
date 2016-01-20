<?php
require("phpsqlajax_dbinfo.php");

// Opens a connection to a MySQL server
$connection = mysql_connect (localhost, $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

mysql_select_db($database, $connection);

$name = $_GET['name'];
$latlng = $_GET['latlng'];
$country = $_GET['country'];
$country_short = $_GET['country_short'];

mysql_query("INSERT INTO markers (id, name, latlng, country,country_short) VALUES (NULL, '$name', '$latlng','$country','$country_short')");

mysql_close($connection);
?> 