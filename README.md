# Travel Map
Full screen map with markers

This is basically a Google Map that fills the entire browser window. It's populated with custom markers that are stored in your SQL database.

## Installation
Navigate to `install.php` and fill out your credentials.

## Administration
Navigate to `add.html` to add markers. This will add the match that is closest to your query. Most queries will yield the correct place, like typing "London" will match "London, UK"; for otherwise you'll have to be more specific, like "Moscow, IA".
There's an "Undo" button in case you've stumbled upon a wrong match.

## The map
Your complete map is accessible on `indes.html`. Specifyi query string `?countries=1` will highlight countries of the markers.
