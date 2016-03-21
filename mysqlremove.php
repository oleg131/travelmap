<?php
require("dbconnection.php");

mysql_select_db($database, $connection);

// Delete last entry
mysql_query("DELETE FROM markers ORDER BY id DESC limit 1");

mysql_close($connection);
?> 