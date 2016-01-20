<?php

if (file_exists('phpsqlajax_dbinfo.php')) {
    if (file_exists('install.lock')) {
        echo "Installation locked";
    } else {
        init();
    }
    
} else {    
    init();
}

function init() {

if (empty($_POST['user']) and empty($_POST['pass']) and empty($_POST['db'])) {

        echo "<!DOCTYPE html>";
        echo "<body>";
        echo "<form action=\"install.php\" method=\"post\">";
        echo "MySQL credentials<br>";
        echo "Username: <input type=\"text\" name=\"user\"><br>";
        echo "Password: <input type=\"password\" name=\"pass\"><br>";
        echo "Database: <input type=\"text\" name=\"db\"><br>";
        echo "<input type=\"submit\" name=\"submit\" value=\"Submit\">";
        echo "</form>";
        echo "</body>";
        echo "</html> ";

    } else {

        $username = $_POST['user'];
        $password = $_POST['pass'];
        $database = $_POST['db'];

        $filename = 'phpsqlajax_dbinfo.php';

        file_put_contents($filename, '<?php
        $username="'.$username.'";
        $password="'.$password.'";
        $database="'.$database.'";
        ?>
        ');

        echo 'MySQl credentials written to ' . $filename . '<br>';

        // Opens a connection to a MySQL server
        $connection = mysql_connect (localhost, $username, $password);
        if (!$connection) {
            die('Not connected : ' . mysql_error());
        } else {

            mysql_select_db($database, $connection);

            mysql_query("
                CREATE TABLE IF NOT EXISTS `markers0` (
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

            $handle = fopen('install.lock', 'w') or die('Cannot open file:  '.$my_file);
            echo 'Successfully installed, locked<br>';

            echo '<a href="add.html">Add some markers</a>';

        }


    }

}

?>


