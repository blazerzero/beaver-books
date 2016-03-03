<!DOCTYPE html>
<script type="text/javascript" src="./js-samples"></script>
<script type="text/javascript" src="./bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="./js-samples/geolocate/geometa.js"></script>
<?php include "./header.php" ?>
<?php include "./quicknav.php" ?>

<?php if (checkAuth(true) != "") { ?>

<html>
  <head>
    <title>Books Near You</title>
    <link type="text/css" rel="stylesheet" href="./css/stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="./bower_components/semantic/dist/semantic.css"/>
    <link href="./js-samples/geolocate/geolocate.html"/>
    <script type="text/javascript" src="./map.js"></script>
    <script>

    $(document).ready(function() {
      $("#current").click(function() {
        var map = initMap();
        prepareGeolocation();
        doGeolocation();
      });

      $("#submit").click(function() {
        var map = initMap();
        var zip = document.getElementById("zip").value;
        var lat = '';
        var lng = '';

        geocoder.geocode( {'address': zip}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            lat = results[0].geometry.location.lat();
            lng = results[0].geometry.location.lng();
          }
          else alert("Geocode was not successful for the following reason: " + status);
        });
        var latLng = new google.maps.LatLng(lat, lng);
        map.center = latLng;
      });
    });

    </script>
  </head>
  <body>

    <br><br>
    <left class="sitename">BEAVERBOOKS</left>

    <ul class="navbar">
      <li><a href="./home.php">Home</a></li>
      <li><a href="./viewbooks.php">View Books</a></li>
      <li><a href="./booksell.php">Sell Your Book</a></li>
      <li class="active"><a href="./locationpage.php">Books Near You</a></li>
      <li><a href="./about.html">About</a></li>
      <li style="float:right"><a href="./logout.php">Logout</a></li>

    </ul>

    <center><h1> Books Near You </h1></center>

    <div class="ui divider"></div>

    <div class="textbody">
      <center><p>Here we will use the google maps api with updates to the locations of
        where people are selling their books</p>

        <div class="ui form">
          <button class="ui positive button" id="current">Current Location</button>
          <br><br>
          <div class="ui basic label">OR</div>
          <br><br>
          <div class="four wide field">
            <label>Zip Code</label>
            <input type="text" placeholder="Zip Code" id="zip">
          </div>
          <button class="ui positive button" id="submit">Submit</button>
        </div></center>
    </div>

    <div id="map"></div>
    <!-- <script>
    function initMap() {
      alert("in initMap");
      var mapDiv = document.getElementById("map");
      var map = new google.maps.Map(mapDiv, {
        center: {lat: 44.563875, lng: -123.279895},
        zoom: 17,
      });
      var marker = new google.maps.Marker({
        position: map.center,
        map: map,
        title: 'You Are Here'
      });
      return map;
    }

    /*function showmap(version) {
      alert("function called");
      var map = initMap();
      if (version === 1) {
        map.center = getLocation();
      }
      if (version === 2) {
        var zip = document.getElementById("zip").value;
        var lat = '';
        var lng = '';

        geocoder.geocode( {'address': zip}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            lat = results[0].geometry.location.lat();
            lng = results[0].geometry.location.lng();
          }
          else alert("Geocode was not successful for the following reason: " + status);
        });
        var latLng = new google.maps.LatLng(lat, lng);
        map.center = latLng;
      }
      map.zoom: 17;
    }*/

    $("#current").click(function() {
      var map = initMap();
      map.center = getLocation();
      var map = initMap();

    });

    $("#submit").click(function() {
      var zip = document.getElementById("zip").value;
      var lat = '';
      var lng = '';

      geocoder.geocode( {'address': zip}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          lat = results[0].geometry.location.lat();
          lng = results[0].geometry.location.lng();
        }
        else alert("Geocode was not successful for the following reason: " + status);
      });
      var latLng = new google.maps.LatLng(lat, lng);
      map.center = latLng;
    });

    function getLocation() {
        if (navigator.geolocation) {
            var latlng = navigator.geolocation.getCurrentPosition(getPosition, showError);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
        return latlng;
    }

    function getPosition(position) {
        var latlon = position.coords.latitude + "," + position.coords.longitude;
        return latlon;
    }


    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred."
                break;
              }
        }
      }
    }

    /*function map(version) {
      var lat = 0;
      var lng = 0;
      if (version == 1) {
        latlng = getLocation();
      }
      if (version == 2) {
        var zip;
        zip = document.getElementById("zip").value;

        lat = '';
        lng = '';

        geocoder.geocode( { 'address': zip}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            lat = results[0].geometry.location.lat();
            lng = results[0].geometry.location.lng();
            } else {
            alert("Geocode was not successful for the following reason: " + status);
          });
        alert('Latitude: ' + lat + ' Logitude: ' + lng);
      }
      initMap(lat, lng, latlng);

    }*/
  </script> -->
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
      async defer></script>

    <br>

    <div class="quicknav">
      <a href="./booksell.html">
        <button class="circular ui icon button one">
          <i class="plus icon"></i>
          <p>Sell A Book</p>
        </button>
      </a>
      <a href="./yourbooks.php">
        <button class="circular ui icon button two">
          <i class="book icon"></i>
          <p>Your Books</p>
        </button>
      </a>
      <a href="./searchpage.html">
        <button class="circular ui icon button three">
          <i class="search icon"></i>
          <p>Search</p>
        </button>
      </a>
      <a href="./locationpage.html">
        <button class="circular ui icon button four">
          <i class="location arrow icon"></i>
          <p>Near You</p>
        </button>
      </a>

    </div>

		<br><br>

  </body>
</html>

<?php } ?>
<?php include "./footer.php" ?>
