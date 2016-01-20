<?php
require("phpsqlajax_dbinfo.php");

// Opens a connection to a MySQL server
$connection = mysql_connect (localhost, $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

mysql_select_db($database, $connection);

// Delete last entry
mysql_query("DELETE FROM markers ORDER BY id DESC limit 1");

mysql_close($connection);
?> 