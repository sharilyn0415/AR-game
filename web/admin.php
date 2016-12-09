<?php
	include('header.php');
	include('footer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">    
    <link href="css/style.css" rel="stylesheet">
	<!-- <link href="color/default.css" rel="stylesheet">  -->
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
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom" onload="loadData()">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="admin.php">
                    <h1>Jewel Hunt -“Try your luck !”</h1>
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#addbymap">Add by map</a></li>
		<li><a href="#database">Database</a></li>
      </ul>
            </div>
        </div>
    </nav>

    <section id="intro" class="intro" style="background">
		<div class="slogan">
			<h2>Jewel Hunt</h2>
			<h4>Cloud based Gaming App with Augmented Reality</h4>
		</div>
		<div class="page-scroll">
			<a href="#addbymap" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>

    <section id="about" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
						<div class="section-heading">
						<h2>About us</h2>
						<i class="fa fa-2x fa-angle-down"></i>

						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-lg-offset-5">
					<hr class="marginbot-50">
				</div>
			</div>
        	<div class="row">
	            <div class="col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.2s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Monika Khanna</h5>
		                        <p class="subtitle">IOS Developer</p>
		                        <div class="avatar"><img src="images/monika.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>
				<div class="col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.5s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Sunyin Yao</h5>
		                        <p class="subtitle">Backend Developer</p>
		                        <div class="avatar"><img src="images/sunyin.JPG" alt="" class="img-responsive img-circle" /></div>

		                    </div>
		                </div>
					</div>
	            </div>
				<div class="col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.8s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Madhukarreddy Komalla</h5>
		                        <p class="subtitle">Android Developer</p>
		                        <div class="avatar"><img src="images/madhu.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>
				<div class="col-md-3">
					<div class="wow bounceInUp" data-wow-delay="1s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Teng Wang</h5>
		                        <p class="subtitle">Project Manager</p>
		                        <div class="avatar"><img src="images/teng.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>
        	</div>		
		</div>
	</section>
			
    <section id="addbymap" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
							<div class="section-heading">
								<h2>Add by marking on map</h2>
								<i class="fa fa-2x fa-angle-down"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="padding:10px;margin:10px">
			<div class="col-md-8">
				<div id="map"></div>
			</div>
    		<div class="col-md-4">
		    	<form class="form-group" method="POST" action="services/create.php">
			    	<h3>Your Select location</h3>
		    		Longitude: <input class="form-control" type="text" name="longitude" id="lng" value="" required/><br>
		    		Latitude: <input class="form-control" type="text" name="latitude" id="lat" value="" required/><br>
					URL: <br><select class="form-control" id="urls" name="url" required></select><br>
		    		<input class="btn btn-primary" type="submit" value="Add coordinate" />
				</form>
    		</div>
		</div>				
		
	</section>

	<section id="database" class="home-section text-center bg-gray">
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
							<div class="section-heading">
								<h2>Our Data</h2>
								<i class="fa fa-2x fa-angle-down"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<table id="data" class="table table-hover" ></table>
			</div>
        </div>
	</section>

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
    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    
</body>

</html>
