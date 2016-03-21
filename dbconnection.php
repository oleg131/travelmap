<?php
$username = "user";
$password = "pass";
$database = "db";

$host = 'localhost';
$port = 3306;

// Opens a connection to a MySQL server
$connection = mysql_connect ($host.':'.$port, $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}
?>