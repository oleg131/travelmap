<?php

init();

function init() {

    require("phpsqlajax_dbinfo.php");

    // Opens a connection to a MySQL server
    $connection = mysql_connect (localhost, $username, $password);
    if (!$connection) {
        die('Not connected : ' . mysql_error());
    } else {

        mysql_select_db($database, $connection);

        mysql_query("
            CREATE TABLE IF NOT EXISTS `markers` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(255) NOT NULL,
              `latlng` varchar(60) NOT NULL,
              `country` varchar(60) NOT NULL,
              `country_short` varchar(60) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
            ");

        mysql_close($connection);

        echo 'Table \'markers\' created (if didn\'t exist)<br>';

        echo '<a href="add.html">Add some markers</a>';

    }
}

?>


