<?php
	include('header.php');
	include('footer.php');
?>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=1">
    <meta charset="utf-8">
	<script>
		var loadData = function() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(xhttp.readyState == 4 && xhttp.status == 200) {
					if(xhttp.responseText == "") {
						return;
					}
					var coordinates = JSON.parse(xhttp.responseText);
					if(coordinates.length == 0) {
						var res = "<th>There is No pre-set coordinates in DB!<th>";
					} else {
						var res = "<tr><th>ID</th><th>Longitude</th><th>Latitude</th><th>URL</th><th></th><th></th></tr>";
						var urls ="<option type='radio' name='url' value='' selected>--- Please Select URL From List ---</option>"
						for(var i = 0; i < coordinates.length; i++) {
							res += "<tr><td>"+coordinates[i].id+"</td><td>"+coordinates[i].longitude+"</td><td>"+coordinates[i].latitude+"</td><td>"+coordinates[i].url+"</td><td><a class='btn btn-primary btn-xs' href='edit.php?id="+coordinates[i].id+"'>Edit</a></td><td><form method='POST' action='services/delete.php'><input type='hidden' name='id' value="+coordinates[i].id+" /><input class='btn btn-primary btn-xs' type='submit' value='Delete' /></form></td></tr>";
							if(coordinates[i].url != ""){
								urls +="<option type='radio' name='url' value='"+coordinates[i].url+"' >"+coordinates[i].url+"</option><br>"
							}
						}
					}
					document.getElementById("data").innerHTML = res;
					document.getElementById("urls").innerHTML = urls;
			    }
			};
			xhttp.open("GET", "services/admin.php", true);
			xhttp.send();
		}
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body onload="loadData()">
	<header style="margin:5px; padding:5px;" id="top">
		<h1>Admin System  <a class='btn btn-primary btn-xs' href="#data" >Manage Data</a></h1>
	</header>
	<div style="background-color:#ebf0fa;">
	<h1 style="margin-left:150px;padding:10px">Add coordinate by clicking on map</h1>
		<div class="row" style="margin:10px;padding:20px">
		    <div class="col-md-8"><div id="map" style="height: 60%"></div></div>
		    <div class="col-md-4">
		    	<form class="form-group" method="POST" action="services/create.php">
			    	<h3>Your Select location</h3>
		    		Longitude: <input class="form-control" type="text" name="longitude" id="lng" value="" /><br>
		    		Latitude: <input class="form-control" type="text" name="latitude" id="lat" value="" /><br>
					URL: <br><select class="form-control" id="urls" name="url"></select><br>
		    		<input class="btn btn-primary" type="submit" value="Add coordinate" />
				</form>
		    </div>
		</div>
	</div>
	<div>
		<h1 style="margin-left:50px;padding:10px">Manage all data</h1>
		<table id="data" class="table table-hover" ></table >
	</div>
	<a class='btn btn-primary' href="#top" ><span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span></a>
	<script>
		
		function initMap() {
			var marker;
			var map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: 37.38, lng: -121.93},
				zoom: 8
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

