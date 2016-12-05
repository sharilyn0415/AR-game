<?php
	include('header.php');
	include('footer.php');
?>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 80%;
        margin: 0;
        padding: 0;
      }
    </style>
	<script>
		var loadData = function() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(xhttp.readyState == 4 && xhttp.status == 200) {
					if(xhttp.responseText == "") {
						return;
					}
					console.log(xhttp.responseText);
					var coordinates = JSON.parse(xhttp.responseText);
					if(coordinates.length == 0) {
						var res = "<th>There is No pre-set coordinates in DB!<th>";
					} else {
						var res = "<tr><th>ID</th><th>Longitude</th><th>Latitude</th><th>URL</th><th></th><th></th></tr>";
						for(var i = 0; i < coordinates.length; i++) {
							res += "<tr><td>"+coordinates[i].id+"</td><td>"+coordinates[i].longitude+"</td><td>"+coordinates[i].latitude+"</td><td>"+coordinates[i].url+"</td><td><a class='btn btn-primary btn-xs' href='edit.php?id="+coordinates[i].id+"'>Edit</a></td><td><form method='POST' action='services/delete.php'><input type='hidden' name='id' value="+coordinates[i].id+" /><input class='btn btn-primary btn-xs' type='submit' value='Delete' /></form></td></tr>";
						}
					}
					document.getElementById("data").innerHTML = res;
			    }
			};
			xhttp.open("GET", "services/admin.php", true);
			xhttp.send();
		}
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body onload="loadData()">
	<div class="row">
	    <div class="col-md-8"><div id="map"></div></div>
	    <div class="col-md-4">
	    	<form class="form-group" method="POST" action="services/create.php">
		    	<h3>Your Select location</h3>
	    		Longitude: <input class="form-control" type="text" name="longitude" id="lng" value="" /><br>
	    		Latitude: <input class="form-control" type="text" name="latitude" id="lat" value="" /><br>
				URL:<input class="form-control" type="text" name="url"><br>
	    		<input class="btn btn-primary" type="submit" value="Add coordinate" />
			</form>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
	    	<h1>Admin System <a class='btn btn-primary btn-xs' href='add.html'>Add coordinates</a></h1>
	    	<table id="data" class="table table-hover"></table >
	    </div>
	</div>

	<script>
		// Note: This example requires that you consent to location sharing when
		// prompted by your browser. If you see the error "The Geolocation service
		// failed.", it means you probably did not give permission for the browser to
		// locate you.
		function initMap() {
			var marker;
			var map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: 37.38, lng: -121.93},
				zoom: 6
			});
			map.addListener('click', function(e) {
				placeMarkerAndPanTo(e.latLng, map);
				getpos(e.latLng);
			});
			function placeMarkerAndPanTo(latLng, map) {
				if ( marker ) {
					marker.setPosition(latLng);
				} else {
					marker = new google.maps.Marker({
						position: latLng,
						map: map
					});
					map.panTo(latLng);
				}
			}
		}
		function getpos(latLng){
			document.getElementById("lng").value = latLng.lat();
			document.getElementById("lat").value = latLng.lng();
		}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXsU_l9Q1xQcn9iiihwYabCuj2UYBxwnc&callback=initMap">
    </script>
</body>
</html>

