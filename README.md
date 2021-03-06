# Travel Map
Push pin travel map in your browser.

This is basically a Google Map that fills the entire browser window. It's populated with custom markers that are stored in your MySQL database.

## Installation
Change your MySQL database credentials in `dbconnection.php`, then navigate to `install.php` to create tables.

## Administration
Navigate to `add.html` to add pins. This will add the match that is closest to your query. Most queries will yield the correct place, like typing "London" will match "London, UK"; for others you'll have to be more specific, like "Moscow, IA".
There's "Undo" button in case you've stumbled upon a wrong match.

## The map
Your complete map is accessible on `index.html`. Specifying query string `?countries=1` will highlight countries of the pins.

## Demo
http://travelmap-oleg131.rhcloud.com/  
http://travelmap-oleg131.rhcloud.com/?countries=1  
http://travelmap-oleg131.rhcloud.com/add.html