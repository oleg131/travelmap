<?php

init();

function init() {

    require("dbconnection.php");

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

?>


