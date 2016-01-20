var geocoder

var customIcons = {
  restaurant: {
    icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
    shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
  },
  bar: {
    icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
    shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
  }
};

function load() {
  geocoder = new google.maps.Geocoder();

  // Change this if you want different initial map position
  var map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(48.775983,67.763672),
    zoom: 3,
    mapTypeId: 'roadmap'
  });
  var infoWindow = new google.maps.InfoWindow;

  downloadUrl("phpsqlajax_genxml.php", function(data) {
    var xml = data.responseXML;
    var markers = xml.documentElement.getElementsByTagName("marker");
    for (var i = 0; i < markers.length; i++) {
      var name = markers[i].getAttribute("name");
      var latlng = markers[i].getAttribute("latlng").replace('(','').split(",");
      var point = new google.maps.LatLng(
          parseFloat(latlng[0]),
          parseFloat(latlng[1]));
      var html = "<b>" + name + "</b>";
            
          var icon = customIcons["bar"] || {};
          var marker = new google.maps.Marker({
            map: map,
            title: name,
            position: point,
            icon: icon.icon
          });

              var country = String(markers[i].getAttribute("country"));
              if (countries) {
              countries = countries + ",\'" + country + "\'";
              } else {
              var countries = "\'" + country + "\'";
              }

          bindInfoWindow(marker, map, infoWindow, html);    
              
    }

    if (GetUrlValue('countries')) {
        var layer = new google.maps.FusionTablesLayer({
        query: {
        select: 'geometry',
        from: '154MeaTnPTdjfHLxN-zwgIUl9ctGkrhtlsnK5jSEh',
        where : "\"Name IN (" + countries + ")\""
        },
        options : {suppressInfoWindows:true},
        styles: [{
              polygonOptions: {
              fillColor: '#00FF00',
              strokeWeight: '0',
              fillOpacity: 0.3
              }
            }],
        map: map
        });
     }


  });
}

function bindInfoWindow(marker, map, infoWindow, html) {
  google.maps.event.addListener(marker, 'click', function() {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
  });
}

function downloadUrl(url, callback) {
  var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      request.onreadystatechange = doNothing;
      callback(request, request.status);
    }
  };

  request.open('GET', url, true);
  request.send(null);
}

function doNothing() {}

function GetUrlValue(VarSearch){
    var SearchString = window.location.search.substring(1);
    var VariableArray = SearchString.split('&');
    for(var i = 0; i < VariableArray.length; i++){
        var KeyValuePair = VariableArray[i].split('=');
        if(KeyValuePair[0] == VarSearch){
            return KeyValuePair[1];
        }
    }
}